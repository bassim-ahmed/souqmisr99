<?php

namespace App\Http\Livewire\Admin;
use App\Models\category;
use App\Models\subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $scategory_id;
    public $scategory_slug;
    public function mount($category_slug ,  $scategory_slug=null)
    {
        if($scategory_slug){
            $this->scategory_slug = $scategory_slug;
            $scategory = subcategory::where('slug',$scategory_slug)->first();
            $this->scategory_id = $scategory->id;
            $this->category_id = $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
        }else{
            $this->category_slug = $category_slug;
            $category = category::where('slug',$category_slug)->first();//to fetch category
         $this->category_id = $category->id;
         $this->name = $category->name;
         $this->slug = $category->slug;
        }
      
    
    }
    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }
    public function  updated($fields) //creating hook method
{
$this->validateOnly($fields,[
    'name' => 'required',
    'slug' => 'required|unique:categories'

]);}

    public function updateCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'

        ]);
        if($this->category_id){
            $scategory = subcategory::find($this->scategory_id);
            $scategory->name = $this->name;
            $scategory->slug= $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();
        }else{
            $category = category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            
                $category->save();
        }

       
            session()->flash('message','Category has been update successfully');
    }

    public function render()
    {
        $categories = category::all();
        return view('livewire.admin.admin-edit-category-component',['categories'=>$categories])->layout('layouts.base');
    }

}