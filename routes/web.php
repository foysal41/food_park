<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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

   /** Admin Auth Routes **/
//যেহেতু ইউজার তার ক্রিডেনশিয়াল দিয়ে লগইন করেছে, তাই ইউজার এই admin/login URL হিট করতে পারবে না। that's why middleware
   Route::group(['middleware' => 'guest'], function(){
    Route::get('admin/login' , [AdminAuthController::class, 'adminlogin'])->name('admin.login');
   });




/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::group(['middleware' => 'auth'] , function(){
    Route::get('/dashboard' , [DashboardController::class , 'index'])->name('dashboard');
    Route::put('/profile' , [FrontendProfileController::class , 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [FrontendProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('profile/avatar', [FrontendProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});




require __DIR__.'/auth.php';

/* Show Home  Page */
Route::get('/' , [FrontendController::class , 'index'])->name('home');

/* Show Product Details Page */
Route::get('/product/{slug}' , [FrontendController::class , 'showProduct'])->name('product.show');

/*
moved to admin.php route

//এই লিঙ্ক যে কাউ admin ছাড়া কাউ access করতে পারবে। আমারা middleware দিয়ে দিব।
Route::get('admin/dashboard' , [AdminDashboardController::class, 'index'])->middleware('auth' , 'role:admin')->name('admin.dashboard');
*/



/* Product Modal Route */
Route::get('load-product-modal/{productId}' , [FrontendController::class , 'loadProductModal'])->name('load-product-modal');;

/* Add to card route */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
