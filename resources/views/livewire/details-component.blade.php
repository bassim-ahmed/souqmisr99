<main>
       <!--single product details-->
       <div class="small-container single-product">
    <div class="row">
         <div class="col-6">
            <img src="{{ asset('images')}}/{{$product->image}}"  width="100%" >
         </div>
         <div class="col-6">
            <p>Home/ Detail</p>
            <h1>{{$product->name}}</h1>
            <p>{!! $product->short_description !!}</p>
            @if ($product->sale_price>0)
            <p><pre><span class="h4">${{$product->sale_price}} </span>  <del class="h6">${{$product->regular_price}}</del></pre></p>
           
            @else
            <p>${{$product->regular_price}}</p>
            
            @endif
            <p>Availability: {{$product->stock_status}}</p>
            <p>size: {{$product->size}}</p>
            <!--<select>
                <option>Select Size</option>
                <option>XXL</option>
                <option>XL</option>
                <option>L</option>
                <option>M</option>
                <option>S</option>
            </select>--><br>
            <div class="mb-3">
            <input type="text" wire:model="qty" >
            <button type="button" class="btn btn-primary btn-sm bg-primary"  wire:click.prevent="increaseQuantity">+</button>
          <button type="button" class="btn btn-primary btn-sm bg-primary"  wire:click.prevent="decreaseQuantity">-</button>
          </div><br>
            <a href="" class="btn cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>
            <h3>Product Details</h3>
            <p>{!! $product->description !!}</p>
        </div>
    </div>


       </div>

    </main>