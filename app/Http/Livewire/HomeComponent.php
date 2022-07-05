<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;

class HomeComponent extends Component
{
    public function render()
    {
        $products= product::orderBy('created_at','DESC')->get()->take(8);
        $productsSale= product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);

        return view('livewire.home-component',['products'=>$products,'productsSale'=>$productsSale])->layout('layouts.base');
    }
}
