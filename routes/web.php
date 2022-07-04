<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', \App\Http\Livewire\HomeComponent::class);
Route::get('/shop', \App\Http\Livewire\ShopComponent::class);
Route::get('/cart', \App\Http\Livewire\CartComponent::class)->name('product.cart');
Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}',\App\Http\Livewire\DetailsComponent::class)->name('product.details');
Route::get('/thank-you',\App\Http\Livewire\ThankyouComponent::class)->name('thankyou');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//for editor
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/editor/dashboard', \App\Http\Livewire\Editor\EditorDashboardComponent::class)->name('editor.dashboard');
    Route::get('/editor/categories',\App\Http\Livewire\Editor\EditorCategoryComponent::class)->name('editor.categories');
    Route::get('/editor/category/add',\App\Http\Livewire\Editor\EditorAddCategoryComponent::class)->name('editor.addcategory');
    Route::get('/editor/category/edit/{category_slug}',\App\Http\Livewire\Editor\EditorEditCategoryComponent::class)->name('editor.editcategory');
    Route::get('/editor/products',\App\Http\Livewire\Editor\EditorProductComponent::class)->name('editor.products');
    Route::get('/editor/product/add',\App\Http\Livewire\Editor\EditorAddProductComponent::class)->name('editor.addproduct');
    Route::get('/editor/product/edit/{product_slug}',\App\Http\Livewire\Editor\EditorEditProductComponent::class)->name('editor.editproduct');
    Route::get('/editor/orders',\App\Http\Livewire\Editor\EditorOrderComponent::class)->name('editor.orders');
    Route::get('/editor/orders/{order_id}',\App\Http\Livewire\Editor\EditorOrderDetailsComponent::class)->name('editor.orderdetails');
});

//for user or customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
});

//for admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/userlist',\App\Http\Livewire\Admin\UserlistComponent::class)->name('admin.userlist');
    Route::get('/admin/userlist/edit/{user_email}',\App\Http\Livewire\Admin\EditUserlistComponent::class)->name('admin.edituserlist');

});

