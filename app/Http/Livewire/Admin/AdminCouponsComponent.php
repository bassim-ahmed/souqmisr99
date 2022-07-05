<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\coupon;
class AdminCouponsComponent extends Component
{
    public function deleteCoupon($coupon_id)
    {
        $coupon = coupon ::find($coupon_id);
        $coupon->delete();
        session()->flash('message','Coupon has been deleted successfully');

    }
    public function render()
    {
        $coupons = coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons' => $coupons])->layout('layouts.base');
    }
}
