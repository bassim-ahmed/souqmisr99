<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');
/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
//for User or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
Route::get('/user/orders',UserOrderComponent::class)->name('user.orders');
Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');

});
//for Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){

Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editcategory');
Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
Route::get('/admin/coupons/add',AdminAddCouponsComponent::class)->name('admin.addcoupon');
Route::get('/admin/coupons/edit/{coupon_id}',AdminEditCouponsComponent::class)->name('admin.editcoupon');
Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');

});
Route::get('/admin/Logout',function(){
 return view('login');
});