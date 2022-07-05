<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\category;
class SearchComponent extends Component
{
        public $sorting;
        public $pagesize;

        public $search;
        public $product_cat;
        public $product_cat_id;

        public function mount(){
          $this->sorting ="default";
          $this->fill(request()->only('search','product_cat','product_cat_id'));
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
            $products = product::where('name','like','%'.$this->search .'%')->orderBy('created_at','DESC')->paginate(12);
           }else if($this->sorting=='price'){
            $products = product::where('name','like','%'.$this->search .'%')->orderBy('regular_price','ASC')->paginate(12);
           }else if($this->sorting=='price-desc'){
            $products = product::where('name','like','%'.$this->search .'%')->orderBy('regular_price','DESC')->paginate(12);
           }else{
            $products = product::where('name','like','%'.$this->search .'%')->paginate(12);
           }
           $categories = category::all();
        return view('livewire.search-component',['products' => $products,'categories'=>$categories])->layout("layouts.base");

    }
}