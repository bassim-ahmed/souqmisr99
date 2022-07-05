<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\coupon;


class CartComponent extends Component
{
public $haveCouponCode;
public $couponCode;
public $discount;
public $subtotalAfterDiscount;
public $taxAfterDiscount;
public $totalAfterDiscount;
public function destroy($rowId){
    Cart::remove($rowId);
    session()->flash('success_message','Item has been removed');   
}
 public function increaseQuantity($rowId){
    $product = Cart::get($rowId);
    $qty = $product->qty + 1;
    Cart::update($rowId,$qty);
 }
 public function decreaseQuantity($rowId){
    $product = Cart::get($rowId);
    $qty = $product->qty - 1;
    Cart::update($rowId,$qty);
 }
public function checkout(){
    if(Auth::check()) //to check if user logedin or not
    {
      return redirect()->route('checkout');
    }
    else{
        return redirect()->route('login');
    }
}
public function setAmountForCheckout(){
 if(!Cart::count() > 0){
    session()->forget('checkout');
    return;
 }


 if(session()->has('coupon')){
    session()->put('checkout',[
        'discount' => $this->discount,
        'subtotal'=> $this->subtotalAfterDiscount,
        'tax' => $this->taxAfterDiscount,
         'total' => $this->totalAfterDiscount

    ]);
 }else{
    session()->put('checkout',[
        'discount' => 0,
        'subtotal'=> Cart::subtotal(),
        'tax' => Cart::tax(),
         'total' => Cart::total(),

    ]);
 }


}
public function applyCouponCode(){
    $coupon = coupon::where('code',$this->couponCode)->where('cart_value','<=',Cart::subtotal())->first();
    if(!$coupon){
        session()->flash('coupon_message','Coupon code is invalid');
        return;
    } 
    session()->put('coupon',[
         'code'=>$coupon->code,
         'type'=>$coupon->type,
         'value'=>$coupon->value,
         'cart_value'=>$coupon->cart_value,


    ]);
}
public function calculateDiscounts(){
    if (session()->has('coupon')){
        if(session()->get('coupon')['type'] == 'fixed'){
            $this->discount = session()->get('coupon')['value'];
        }else{
            $this->discount = (Cart::subtotal() * session()->get('coupon')['value'])/100;
        }
        $this->subtotalAfterDiscount = Cart::subtotal() - $this->discount;
        $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
        $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
    }
}

 
    public function render()
    {
    if(session()->has('coupon')){
        if(Cart::subtotal() < session()->get('coupon')['cart_value']){
            session()->forget('coupon');    
        }else{
            $this->calculateDiscounts();
        }
    }
    $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
