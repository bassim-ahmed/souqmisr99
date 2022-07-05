<?php

namespace App\Http\Livewire;
use App\Models\product;
use Livewire\Component;
use Cart;
class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public function mount($slug)
    {
        $this->slug =$slug;
        $this->qty = 1;
    }

    public function store($product_id,$product_name,$product_price){

        Cart::add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\product');
           session()->flash('success_message','Item added in cart');
           return redirect()->route('product.cart');
         }

         public function increaseQuantity(){
        $this->qty++;
         }
         public function decreaseQuantity(){
            if($this->qty >1){
            $this->qty--;}
         }


    public function render()
    {
        $product = product::where('slug',$this->slug)->first();
        return view('livewire.details-component',['product'=>$product])->layout('layouts.base');
    }
}
