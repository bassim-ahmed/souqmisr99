<main style=" min-height: 700px;">
<h2 class="float-left">All Coupon</h2>
<a class="float-right nolink" href="{{route('admin.addcoupon')}}" >Add new Coupon</a>
<div>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<table >
  <tr>
    <th>Id</th>
    <th>Coupon Code</th>
    <th>Coupon Type</th>
    <th>Coupon Value</th>
    <th>Cart Value</th>
    <th>Action</th>
  </tr>
  @foreach ($coupons as $coupon)
  <tr>
    <td>{{$coupon->id}}</td>
    <td>{{$coupon->code}}</td>
    <td>{{$coupon->type}}</td>
    @if ($coupon->type == 'fixed')
    <td>{{$coupon->value}}</td>
    @else
    <td>{{$coupon->value}} %</td>
    @endif
   
    <td>{{$coupon->cart_value}}</td>
    <td>
 <a href="{{route('admin.editcoupon',['coupon_id' => $coupon->id])}}" class="nolink">Edit</a>
 <a href="#" onclick="confirm('Are you sure,You want to Delete this coupon? ') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})"class="nolink">delete</a>

    </td>
  </tr>
@endforeach
</table>
</div>
<div >


    </div>
</main>
