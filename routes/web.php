<?php

use App\Http\Controllers\TestController;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Admin\AdminCouponComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductCategory;
use App\Http\Livewire\Admin\HomeCountryProduct;
use App\Http\Livewire\AdminOrderViewComponent;
use App\Http\Livewire\AdminSalesProduct;
use App\Http\Livewire\CardComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankYouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserDetailDashboardController;
use App\Http\Livewire\Wishlistshowcomponent;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Route;

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

Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class)->name("shop");

Route::get('/checkout',CheckoutComponent::class)->name("checkout");

Route::get('/card',CardComponent::class)->name('product.cart');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category}',CategoryComponent::class)->name('category.product');
Route::get('/wishlist',Wishlistshowcomponent::class)->name('wishlist');

Route::get('/coupon',AdminCouponComponent::class)->name('coupon.index');
Route::get('/coupon/create',AdminAddCouponComponent::class)->name('coupon.create');
Route::get('/coupon/edit/{id}',AdminEditCouponComponent::class)->name('coupon.edit');

Route::get('/thankyou',ThankYouComponent::class)->name('thankyou');








// front
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
   Route::get('user/dashboard',UserDashboardComponent::class)->name('dashboard');
   Route::get('user/dashboard/order/{id}/details',UserDetailDashboardController::class)->name('user.order.detail');
});

//admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
   Route::get('admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
   Route::get('admin/category',AdminCategory::class)->name('admin.category');
   Route::get('admin/product',AdminProductCategory::class)->name('admin.product');
   Route::get('admin/slider',AdminHomeSliderComponent::class)->name('admin.slider');
   Route::get('admin/add/slider',AdminAddHomeSliderComponent::class)->name('admin.add.slider');
   Route::get('admin/edit/slider/{slider}',AdminEditHomeSliderComponent::class)->name('admin.edit.slider');
   Route::get('admin/country/product',HomeCountryProduct::class)->name('admin.country.product');
   Route::get('admin/sale',AdminSalesProduct::class)->name('admin.sales');
   Route::post('ckeditor/upload', [AdminAddHomeSliderComponent::class,'upload_image_cke'])->name('ckeditor.upload');
   Route::get('admin/order',AdminOrderViewComponent::class)->name('admin.order');
   Route::get('admin/order/details/{order_id}',AdminOrderDetailsComponent::class)->name('admin.order.details');
});

Route::get("efgan",[TestController::class,"index"]);