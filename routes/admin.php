<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


//1. আমি চাইলে এই পেজ ভিউ করতে পারব না কারণ এই admin.php রাউটার রেজিস্টার করা নেই

/*
2. আমি এই middleware দুটি সমস্ত অ্যাডমিন রুটের জন্য গ্লোবালি প্রয়োগ করবো, কারণ শুধু লগইন করা অ্যাডমিন ব্যবহারকারীরাই অ্যাডমিন রুটগুলো দেখতে পারবে।

এতে করে প্রতিটি রুটে আলাদা করে auth ও role middleware সেট করার দরকার নেই, বরং একবারে সব অ্যাডমিন রুটে প্রয়োগ হবে।

Route::get('admin/dashboard' , [AdminDashboardController::class, 'index'])->middleware('auth' , 'role:admin')->name('admin.dashboard');


3. প্রথম আর্গুমেন্টে আমরা একটি অ্যারে দেবো, যেখানে আমাদের প্রয়োজনীয় আর্গুমেন্টগুলো থাকবে। দ্বিতীয় আর্গুমেন্টে কলব্যাক পাস করবো, যার ভিতরে আমাদের রুটগুলো থাকবে। এরপর আমরা admin কে প্রিফিক্স হিসেবে ব্যবহার করবো।


*/

Route::group(['prefix' => 'admin', 'as' =>'admin.'], function(){
    Route::get('dashboard' , [AdminDashboardController::class, 'index'])->name('dashboard');
});


