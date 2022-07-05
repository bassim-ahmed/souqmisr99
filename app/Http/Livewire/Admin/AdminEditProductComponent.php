<?php

namespace App\Http\Livewire\Admin;
use App\Models\category;
use Livewire\Component;
use App\Models\product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\subcategory;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $size;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;
    public $scategory_id;
    public function mount($product_slug)
    {
      
       $product = product::where('slug',$product_slug)->first();//to fetch product
        $this->name =$product->name;
        $this->slug=$product->slug;
        $this->short_description= $product->short_description;
        $this->description= $product->description;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->SKU=$product->SKU;
        $this->stock_status=$product->stock_status;
        $this->size=$product->size;
        $this->quantity=$product->quantity;
        $this->image=$product->image;
        $this->category_id=$product->category_id;
        $this->scategory_id=$product->subcategory_id;
        $this-> product_id=$product->id;
  
    }
    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }
    public function  updated($fields) //creating hook method
{
    $this->validateOnly($fields,[
        'name'=>'required',
        'slug'=>'required|unique:products',
    'short_description'=>'required',
    'description'=>'required',
    'regular_price'=>'required|numeric',
    'sale_price'=>'numeric',
    'SKU'=>'required',
    'stock_status'=>'required',
    'size'=>'required|in:S,L,XL,M',
    'quantity'=>'required|numeric',
    'image'=>'required:mimes:jpeg,png',   
    'category_id'=>'required'
    ]);


}
    public function updateProduct(){
        $this->validate([
            'name'=>'required',
           'slug'=>'required|unique:products',
       'short_description'=>'required',
       'description'=>'required',
       'regular_price'=>'required|numeric',
       'sale_price'=>'numeric',
       'SKU'=>'required',
       'stock_status'=>'required',
       'size'=>'required|in:S,L,XL,M',
       'quantity'=>'required|numeric',
       'image'=>'required:mimes:jpeg,png',
       'category_id'=>'required'
       
   
      ]); 
        $product = product::find($this->product_id);
        $product->name= $this->name;
        $product->slug= $this->slug;
        $product->short_description = $this->short_description;
        $product->description= $this->description;
        $product->regular_price= $this->regular_price;
        $product->sale_price= $this->sale_price;
        $product->SKU= $this->SKU;
        $product->stock_status= $this->stock_status;
        $product->size= $this->size;
        $product->quantity= $this->quantity;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('',$imageName);
            $product->image = $imageName;
        }
       
         $product->category_id = $this->category_id; 
         if($this->category_id)
         {
             $product->subcategory_id = $this->scategory_id;
         }
         $product->save(); 
         session()->flash('message','Product has been updated successfully'); 
    }

    public function changeSubcategory(){

        $this->scategory_id = 0;
    }

    public function render()
    {
        $categories = category::all();
        $scategories = subcategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories,'scategories'=> $scategories])->layout('layouts.base');
    }
}
