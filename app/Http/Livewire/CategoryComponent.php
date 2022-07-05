<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\category;
use App\Models\subcategory;
class CategoryComponent extends Component
{
        public $sorting;
        public $pagesize;
        public $category_slug;
        public $scategory_slug;
        public $min_price;
        public $max_price;
        public function mount($category_slug , $scategory_slug=null ){
          $this->sorting ="default";
          $this->category_slug =$category_slug;
          $this->scategory_slug = $scategory_slug;
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
      $category_id=null;
      $category_name = "";
      $filter ="";
      if($this->scategory_slug){
        $scategory = subcategory::where('slug',$this->scategory_slug)->first();
        $category_id = $scategory->id;
        $category_name = $scategory->name;
        $filter = "sub";
      }else{
        $category = category::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $filter = "";
      }
       
           if($this->sorting=='date'){
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->orderBy('created_at','DESC')->paginate(12);
           }else if($this->sorting=='price'){
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->orderBy('regular_price','ASC')->paginate(12);
           }else if($this->sorting=='price-desc'){
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->orderBy('regular_price','DESC')->paginate(12);
           }else{
            $products = product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->paginate(12);
           }
           $categories = category::all();
        return view('livewire.category-component',['products' => $products,'categories'=>$categories,'category_name'=>$category_name])->layout("layouts.base");

    }
}
