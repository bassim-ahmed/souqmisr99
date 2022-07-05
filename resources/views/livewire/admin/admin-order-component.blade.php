<main style=" min-height: 700px;">
<h2 class="float-left">All Orders</h2>

<div>

          @if (Session::has('order_message'))
          <p>{{Session::get('order_message')}}</p>
          @endif
<table>
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
    <th colspan="2" class="text-center">Action</th>


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
<a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn  btn-sm">Details</a>

    </td>
    <td>
    <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"   >
   status
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">delivered</a>
    <a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'cancelled')" >cancelled</a>
  </div>
</div>
    </td>
  </tr>

@endforeach
</table>
</div>
<div >
{{$orders->links("pagination::bootstrap-4")}}

    </div>
</main>