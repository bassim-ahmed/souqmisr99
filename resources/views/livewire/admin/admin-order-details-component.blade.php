<nav class="navbar bg-dark navbar-dark ">  

  <ul class="nav justify-content-end">
				<li class="nav-item">
				  <a class="nav-link active text-white" href="{{route('admin.orders')}}">All orders</a>
				</li>
			  </ul>
</nav>
<div id="section5" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
  <h1>Order Details</h1>
  <table class="table">
<tr>
      <th class="bg-white text-secondary">Order id</th>
      <td class="bg-light" >{{$order->id}}</td>
    
    
      <th class="bg-white text-secondary">Order Date</th>
      <td class="bg-light" >{{$order->created_at}}</td>
    
    
      <th class="bg-white text-secondary" > status</th>
      <td class="bg-light" >{{$order->status}}</td>
      @if($order->status ==  "delivered")
      <th class="bg-white text-secondary" > Delivery date</th>
      <td class="bg-light" >{{$order->delivered_date}}</td>
      @elseif($order->status ==  "canceled ")
      <th class="bg-white text-secondary" > canceletion date</th>
      <td class="bg-light" >{{$order->cancelled_date}}</td>
      @endif
    </tr>


</table>

<div id="section1" class="container-fluid bg-success" style="padding-top:70px;padding-bottom:70px">
  <h1>Order item</h1>
  <table>
             <tr>
          <th>product</th>
          <th>quantity</th>
          <th>subtotal</th>
        </tr>
        @foreach ($order->orderItems as $item)
        <tr>
           
          <td>
                <div class="cart-info">
                    <img src="{{ asset ('images') }}/{{$item->product->image}}" >
                    <div>
                        <p><a href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a></p>
                        <small>Price:{{$item->price}}</small>
                        <br>
                    
                    </div>
                </div>

          </td>
          <td>   {{$item->quantity}}</td>
          <td>{{$item->price * $item->quantity}}</td>
          
        </tr>
        @endforeach

         </table>
         <div>
            <h4> Order Summary <h4>
                <table>
                <tr>
                        <td>Subtotal</td>
                        <td>${{$order->subtotal}}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>${{$order->tax}}</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free Shipping</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>${{$order->total}}</td>
                    </tr>

                </table>

         </div>
       </div>
<div id="section2" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1>Billing Details</h1>
<table class="table">
<tr>
      <th class="bg-white text-secondary">firstname</th>
      <td >{{$order->firstname}}</td>
      <th class="bg-white text-secondary">Lastname</th>
      <td >{{$order->lastname}}</td>
    </tr>
    <tr>
      <th class="bg-white text-secondary">Phone</th>
      <td >{{$order->mobile}}</td>
      <th class="bg-white text-secondary" >Email</th>
      <td>{{$order->email}}</td>
    </tr>
    <tr>
      <th class="bg-white text-secondary" >line1</th>
      <td >{{$order->line1}}</td>
      <th  class="bg-white text-secondary">line2</th>
      <td>{{$order->line2}}</td>
    </tr>
    <tr>
      <th class="bg-white text-secondary" >city</th>
      <td >{{$order->city}}</td>
      <th class="bg-white text-secondary"  >province</th>
      <td>{{$order->province}}</td>
    </tr>
    <tr>
      <th class="bg-white text-secondary">Country</th>
      <td >{{$order->country}}</td>
      <th class="bg-white text-secondary">zip code</th>
      <td>{{$order->zipcode}}</td>
    </tr>

</table>
</div>

<div id="section4" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
  <h1>Transaction</h1>
  <table class="table">
<tr>
      <th class="bg-white text-secondary">transaction Mode</th>
      <td class="bg-light" >{{$order->transaction->mode}}</td>
    
    </tr>
    <tr>
      <th class="bg-white text-secondary">status</th>
      <td class="bg-light" >{{$order->transaction->status}}</td>
    
    </tr>
    <tr>
      <th class="bg-white text-secondary" >Transaction date</th>
      <td class="bg-light" >{{$order->transaction->created_at}}</td>
  
    </tr>


</table>
</div>
