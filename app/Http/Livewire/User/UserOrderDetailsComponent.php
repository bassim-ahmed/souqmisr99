<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class UserOrderDetailsComponent extends Component
{
    public  $order_id;
    public function mount($order_id){
     $this->order_id = $order_id;
    }
    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order ->status = "cancelled";
        $order->cancelled_date= DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message','order status has been canceled');
    }
    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-details-component',['order'=>$order])->layout('layouts.base');
    }
}
