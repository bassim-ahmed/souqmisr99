<main style=" min-height:800px;" >
    <div class="small-container cart-page">
    @if(Cart::count() > 0)
         <table>
             <tr>
          <th>product</th>
          <th>quantity</th>
          <th>subtotal</th>
        </tr>
        @if(Session::has('success_message'))
         <div>
            {{Session::get('success_message')}}
         </div>
          @endif
        @if(Cart::count() > 0)
        @foreach (Cart::content() as $item)
        <tr>
           
          <td>
                <div class="cart-info">
                    <img src="{{ ('images') }}/{{$item->model->image}}" >
                    <div>
                        <p><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></p>
                        <small>Price:{{$item->model->regular_price}}</small>
                        <br>
                         <a href=""  wire:click.prevent="destroy('{{$item->rowId}}')" class="filter-link" style="font-size: small;">remove</a>
                    </div>
                </div>

          </td>
          <td><input type="text" value="{{$item->qty}}" min="1">
          <button type="button" class="btn btn-primary btn-sm bg-primary"  wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</button>
          <button type="button" class="btn btn-primary btn-sm bg-primary"  wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</button>
        </td>
          <td>{{$item->subtotal}}</td>
          
        </tr>
        @endforeach
          @else
             <p>no item in cart</p>
         @endif
         </table>
         
         <div class="total-price">
            
                <table>
                    <tr>
                        <td>subtotal</td>
                        <td>${{Cart::subtotal()}}</td>
                    </tr>
                    @if(Session::has('coupon'))
                    <tr>
                        <td>Discount({{Session::get('coupon')['code']}})</td>
                        <td>${{$discount}}</td>
                    </tr>
                    <tr>
                        <td>Subtotal With Discount</td>
                        <td>${{$subtotalAfterDiscount}}</td>
                    </tr>
                    <tr>
                        <td>tax({{config('cart.tax')}}%)</td>
                        <td>${{$taxAfterDiscount}}</td>
                    </tr>
                  
                    <tr>
                        <td>Total</td>
                        <td>${{$totalAfterDiscount}}</td>
                    </tr>
                    </table>
                    @else
                    <tr>
                        <td>Tax</td>
                        <td>${{Cart::tax()}}</td>

                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>${{Cart::total()}}</td>
                        
                    </tr>
                    </table>
                    @endif
               
                @if(!Session::has('coupon'))
         </div>
         <input type="checkbox" wire:model="haveCouponCode" value="1"> <label>I have coupon code</label><br>
         @if ($haveCouponCode == 1)
         <div>
          <form wire:submit.prevent="applyCouponCode">
         <h4> coupon code</h4>
         @if(Session::has('coupon_message'))
         <p>{{Session::get('coupon_message')}}</p>
         @endif
         <p>
         <label for="coupon-code">Enter your coupon code </label>
         <input type="text" name="coupon-code" wire:model="couponCode">
        </p>
        <button class="btn  btn-sm mb-4"> Apply  </button>
        <form>
         </div>
         @endif
        @endif
        
       
        <button class="btn" wire:click.prevent="checkout">Check Out</button>
    </div>
    @else
    <div class="text-center">
   <h1>Your cart is empty</h1>
   <p>add item now</p>
   <a href="/shop" class="btn">shop now</a>

</div>
   @endif
    
   </main>
