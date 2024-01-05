<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Frontend
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/trang-chu', [HomeController::class, 'index'])->name('trang-chu');
Route::post('/tim-kiem', [HomeController::class, 'search'])->name('tim-kiem');
Route::post('/autocomplete-ajax', [HomeController::class, 'autocomplete_ajax'])->name('autocomplete-ajax');

//liên hệ
Route::get('/lien-he', [ContactController::class, 'lien_he'])->name('lien-he');
Route::post('/add-contact', [ContactController::class, 'add_contact'])->name('add-contact');
Route::get('/all-contact', [ContactController::class, 'all_contact'])->name('all-contact');

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home'])->name('danh-muc-san-pham');
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product'])->name('chi-tiet-san-pham');

//Backend
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product'])->name('add-category-product');
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product'])->name('edit-category-product');
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product'])->name('delete-category-product');
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product'])->name('all-category-product');

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product'])->name('unactive-category-product');
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product'])->name('active-category-product');

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product'])->name('save-category-product');
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product'])->name('update-category-product');

//Product
Route::get('/add-product', [ProductController::class, 'add_product'])->name('add-product');
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product'])->name('edit-product');
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product'])->name('delete-product');
Route::get('/all-product', [ProductController::class, 'all_product'])->name('all-product');


Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('unactive-product');
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])->name('active-product');

Route::post('/save-product', [ProductController::class, 'save_product'])->name('save-product');
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('update-product');

//Cart
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity'])->name('update-cart-quantity');
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('show-cart');
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart'])->name('delete-to-cart');

//Check out
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('login-checkout');
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
Route::post('/add-customer', [CheckoutController::class, 'add_customer'])->name('add-customer');
Route::post('/order-place', [CheckoutController::class, 'order_place'])->name('order-place');
Route::post('/login-customer', [CheckoutController::class, 'login_customer'])->name('login-customer');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');

//Order
Route::get('/manager-order', [CheckoutController::class, 'manager_order'])->name('manager-order');
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order'])->name('view-order');
Route::get('/delete-order/{orderId}', [CheckoutController::class, 'delete_order'])->name('delete-order');

//Bình luận
Route::post('/up-comment/{product_id}', [ProductController::class, 'up_comment'])->name('up-comment');


