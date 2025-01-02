<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Models\Category;
use App\Models\WhyChooseUs;
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

    /* Profile Route */
    Route::get('profile' , [ProfileController::class, 'index'])->name('profile');


    //আগে profileController এ কাজ করেছি।
    Route::put('profile' , [ProfileController::class, 'updateProfile'])->name('profile.update');

    //এখানে আমরা একটি নতুন রুট তৈরি করবো। যেহেতু এটি একটি ফর্ম হ্যান্ডেল করবে এবং ডাটাবেজে তথ্য আপডেট করবে, তাই আমরা PUT মেথড ব্যবহার করবো।

    Route::put('profile/password' , [ProfileController::class, 'updatePassword'])->name('profile.password.update');



    /*  Slider Route  */
    Route::resource('slider' , SliderController::class);

     /*  Why Choose Us Route  */
     Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title-update');

    Route::resource('why-choose-us' , WhyChooseUsController::class);

     /*  Prouct Category Route */
     Route::resource('category' , CategoryController::class);


     /*  Product  Route */
     Route::resource('product' , ProductController::class);

     /*  Product Gallery  Route */
     Route::get('product-gallery/{product}' , [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
     Route::resource('product-gallery' , ProductGalleryController::class);

});




