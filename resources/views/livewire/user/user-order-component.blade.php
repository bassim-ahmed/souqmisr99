<main style=" min-height: 700px;">
<h2 class="float-left">All Orders</h2>


<div>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<table >
  <tr>
    <th>OrderId</th>
    <th>subtotal</th>
    <th>Discount</th>
    <th>Tax</th>
    <th>Total</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>mobile</th>
    <th>Email</th>
    <th>Zip code</th>
    <th>status</th>
    <th>order date</th>
    <th>Action</th>


  </tr>
  @foreach ($orders as $order)
  <tr>
    <td>{{$order->id}}</td>
    <td>${{$order->subtotal}}</td>
    <td>${{$order->discount}}</td>
    <td>${{$order->tax}}</td>
    <td>${{$order->total}}</td>
    <td>{{$order->firstname}}</td>
    <td>{{$order->lastname}}</td>
    <td>{{$order->mobile}}</td>
    <td>{{$order->email}}</td>
    <td>{{$order->zipcode}}</td>
    <td>{{$order->status}}</td>
    <td>{{$order->created_at}}</td>
    <td>
<a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn  btn-sm">Details</a>

    </td>
  </tr>
@endforeach
</table>
</div>
<div >
{{$orders->links("pagination::bootstrap-4")}}

    </div>
</main>
