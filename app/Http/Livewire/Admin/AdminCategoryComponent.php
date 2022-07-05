<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;
use App\Models\subcategory;

class AdminCategoryComponent extends Component
{

    public function deleteCategory($id)
    {
         $category= category::find($id);
         $category->delete();
        session()->flash('message','Category has been deleted sucssfully');
    }
    
    public function deleteSubcategory($id)
    {
         $scategory= subcategory::find($id);
         $scategory->delete();
        session()->flash('message','Subcategory has been deleted sucssfully');
    }

    public function render()
    {
     
        $categories= category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
