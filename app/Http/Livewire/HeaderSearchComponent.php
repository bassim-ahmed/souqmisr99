<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;
    public function mount()
    {
        $this->product_cat='ALL Category';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }
    public function render()
    {
        $categories = category::all();

        return view('livewire.header-search-component',['categories'=>$categories]);
    }
}
