<main style=" min-height: 700px;">
<div>
<h2 class="float-left">Edit Coupon</h2>
<a class="float-right nolink" href="{{route('admin.coupons')}}" >All Coupon</a>
<div>
    <br>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<form style="clear:both; padding:20px;" wire:submit.prevent="updateCoupon"> 
  <div class="form-group" >
    <label >Coupon Code</label>
    <input type="text" class="form-control"  placeholder="Enter Coupon Code" wire:model="code">
    @error ('code') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group" >
    <label >Coupon Type</label>
    <select class="form-control" wire:model="type" >
        <option value=""></option>
        <option  value="fixed">Fixed</option>
        <option value="percent">Percent</option>
    </select>
    @error ('type') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Coupon Value</label>
    <input type="text" class="form-control"  placeholder="Coupon Value" wire:model="value" >
    @error ('value') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>cart Value</label>
    <input type="text" class="form-control"  placeholder="cart Value" wire:model="cart_value" >
    @error ('cart_value') <p>{{$message}}<p> @enderror
  </div>
  <button type="submit" >Update</button>
</form>




</main>