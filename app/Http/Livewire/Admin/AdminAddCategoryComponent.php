<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateslug(){
        $this->slug = Str:: slug($this->name);
    }
    
public function  updated($fields) //creating hook method
{
$this->validateOnly($fields,[
    'name' => 'required',
    'slug' => 'required|unique:categories'

]);

}
    public function storeCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'

        ]);

        if($this->category_id){
            $scategory = new subcategory();
            $scategory->name = $this->name;
            $scategory->slug= $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();
            
        }else{
            $category= new category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category-> save();
           
        }
        session()->flash('message','Category has been created successfully');
    }

  

    public function render()
    {
        $categories = category::all();
        return view('livewire.admin.admin-add-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
