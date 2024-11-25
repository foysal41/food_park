<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminAuthController;
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
   Route::get('admin/login' , [AdminAuthController::class, 'adminlogin'])->name('admin.login');

Route::get('/' , [FrontendController::class , 'index'])->name('home');

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


/*
moved to admin.php route

//এই লিঙ্ক যে কাউ admin ছাড়া কাউ access করতে পারবে। আমারা middleware দিয়ে দিব।
Route::get('admin/dashboard' , [AdminDashboardController::class, 'index'])->middleware('auth' , 'role:admin')->name('admin.dashboard');
*/
