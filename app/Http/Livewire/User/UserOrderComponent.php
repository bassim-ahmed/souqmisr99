<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserOrderComponent extends Component
{
    public function render()
    {
        $order = Order::where ('user_id',Auth::user()->id)->paginate(12); //to show only user order who sign in
        return view('livewire.user.user-order-component',['orders'=>$order])->layout('layouts.base');
    }
}
