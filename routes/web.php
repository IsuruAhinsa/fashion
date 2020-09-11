<?php

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

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('index');

Route::get('shop', 'ShopController@index')->name('shop.index');
Route::get('shop/{slug}', 'ShopController@show')->name('shop.show');

Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart', 'CartController@store')->name('cart.store');
Route::patch('cart/{id}', 'CartController@update')->name('cart.update');
Route::delete('cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::post('cart/wishlist/{id}', 'CartController@moveToWishlist')->name('cart.moveToWishlist');

Route::get('wishlist', 'WishlistController@index')->name('wishlist.index');
Route::delete('wishlist/{id}', 'WishlistController@destroy')->name('wishlist.destroy');
Route::post('wishlist/cart/{id}', 'WishlistController@moveToCart')->name('wishlist.moveToCart');

Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('confirmation', 'ConfirmationController@index')->name('confirmation.index');

Route::post('/coupon', 'CouponController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('blog', 'blog.index');
Route::view('blog/details', 'blog.details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
