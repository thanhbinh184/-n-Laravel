<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


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

// Front-end
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/danh_muc_san_pham/{category_id}', [CategoryProduct::class,'show_category_home']);
Route::get('/thuong_hieu_san_pham/{brand_id}', [BrandController::class,'show_brand_home'])->name('show_brand');
Route::get('/chi_tiet_san_pham/{product_id}', [ProductController::class,'details_product']);



//Admin: backend
// Phương thức Get
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category Product
Route::get('/edit_category_product', [CategoryProduct::class,'add_category_product']);
Route::get('/add_category_product', [CategoryProduct::class,'add_category_product']);
Route::get('/all_category_product', [CategoryProduct::class,'all_category_product']);
Route::post('/save_category_product', [CategoryProduct::class,'save_category_product']);


Route::get('/edit-category/{id}', [CategoryProduct::class, 'editCategory'])->name('edit.category');
Route::get('/delete-category/{id}', [CategoryProduct::class, 'deleteCategory'])->name('delete.category');
Route::post('/update-category/{id}', [CategoryProduct::class, 'updateCategory'])->name('update.category');

//Brand Product
Route::get('add_brand_product', [BrandController::class, 'add_brand_product']);
Route::get('/all_brand_product', [BrandController::class,'all_brand_product']);
Route::post('/save_brand_product', [BrandController::class,'save_brand_product']);

Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('edit.brand');
Route::get('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');
Route::post('/update-brand/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');

//Product
Route::get('add_product', [ProductController::class, 'add_product']);
Route::get('/all_product', [ProductController::class,'all_product']);
Route::post('/save_product', [ProductController::class,'save_product']);

Route::get('/edit_product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
Route::get('/delete_product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::post('/update_product/{id}', [ProductController::class, 'updateProduct'])->name('update.product');


//Cart
Route::post('/save_cart', [CartController::class, 'save_cart'])->name('save_cart');
Route::get('/show_cart', [CartController::class, 'show_cart'])->name('show_cart');


Route::get('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/increase/{rowId}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/cart/decrease/{rowId}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

//Checkout
Route::get('/login_checkout', [CheckoutController::class, 'login_checkout'])->name('login_checkout');
Route::get('/logout_checkout', [CheckoutController::class, 'logout_checkout'])->name('logout_checkout');
Route::post('/add_customer', [CheckoutController::class, 'add_customer'])->name('add_customer');
Route::post('/login_customer', [CheckoutController::class, 'login_customer'])->name('login_customer');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/save_checkout_customer', [CheckoutController::class, 'save_checkout_customer'])->name('save_checkout_customer');
Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/checkout/bank', [CheckoutController::class, 'checkout_bank'])->name('checkout.bank');
Route::get('/admin/orders', [CheckoutController::class, 'show_order'])->name('admin.order');
Route::get('/admin/order/{id}', [CheckoutController::class, 'view_order'])->name('admin.order_details');

//Orders
Route::resource('order', OrderController::class);
Route::get('/admin/orders', [AdminController::class, 'show_order'])->name('admin.order');
Route::get('/delete_order/{id}', [OrderController::class, 'delete'])->name('delete.order');;

//Order_Details
Route::get('/order_details/{id}', [AdminController::class, 'show'])->name('admin.order_details');