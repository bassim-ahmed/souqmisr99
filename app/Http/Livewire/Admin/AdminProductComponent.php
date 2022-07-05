<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\product;
use Livewire\WithPagination;
class AdminProductComponent extends Component
{

use WithPagination;

public function deleteProduct($id)
{
     $product= product::find($id);
     $product->delete();
    session()->flash('message','product has been deleted sucssfully');

    
}

    public function render()
    {
         $products  = product::paginate(10);                                  //to fetch all records from database
        return view('livewire.admin.admin-product-component',['products'=> $products])->layout('layouts.base');
    }
}
