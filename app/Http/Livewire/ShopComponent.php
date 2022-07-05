<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\category;
class ShopComponent extends Component
{
        public $sorting;
        public $pagesize;

        public $min_price;
        public $max_price;
        public function mount(){
          $this->sorting ="default";

          $this->min_price =1;
          $this->max_price =1000;
        }
     public function store($product_id,$product_name,$product_price){
     Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
      }
    use WithPagination;
    public function render()
    {
           if($this->sorting=='date'){
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate(12);
           }else if($this->sorting=='price'){
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate(12);
           }else if($this->sorting=='price-desc'){
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate(12);
           }else{
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate(12);
           }
           $categories = category::all();
        return view('livewire.shop-component',['products' => $products,'categories'=>$categories])->layout("layouts.base");

    }
}
