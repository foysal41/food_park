<?php

/*
    --------------------|128. 1_Product Gallery - Creating Necessary Files and Designs|----------------

    একটি প্রোডাক্ট এর মাল্টিপল ইমেজ থাকতে পারে. এটার জন্য আমরা সেপারেট CRUD  তৈরি করব. এখানে প্রোডাক্ট এবং গ্যালারির সাথে রিলেশন করাব. তাই যখন আমরা প্রোডাক্ট fatch করব সে সঙ্গে সঙ্গে প্রোডাক্ট গ্যালারিও চলে আসবে. প্রোডাক্ট আপলোডের সেকশনে যে ইমেজ আপলোড করার অপশনটি আছে এটা শুধুমাত্র প্রোডাক্ট এর ফিচার ইমেজ.

1. প্রথম একটি প্রোডাক্ট গ্যালারির কন্ট্রোলার বানাবো php artisan make:controller Admin/ProductGalleryController -r

2. এবার একটি মডেল তৈরি করতে হবে কারণ আমাদের image স্টোর করতে হবে php artisan make:model ProductGallery -m . আমরা এখানে seeder এবং ফ্যাক্টরি তৈরি করছি না

3. রাউটার ভিতরে product gallery রাউট সেট করলাম

4. এবারের view  ভিতরে কাজ করব. ভিউয়ের ভেতরে প্রোডাক্ট নামে ফোল্ডারের ভেতরে gallery নামে একটা ফোল্ডার তৈরি করব then index.blade.php আমরা এখানে কোন ডাটা টেবিল ইউজ করবো না নরমাল টেবিল রাখব. ক্যাটাগরি থেকে html snippet গুলো নিয়ে আসলাম

5. এই ইনটেক্স পেজের জন্য আলাদা একটা রাউট তৈরি করব

6. নতুন রাউটার লিংক productDataTable add করে দিলাম

7. কন্ট্রোলারে সেই রাউটের ভিউ রিটার্ন করে দিলাম

*/




/*
    --------------------|129. 2_Product Gallery - Working with Create Feature----------------

1. একটি html form বানিয়ে নিলাম gallery index page এরমধ্যে
2. store method  কে validate করলাম

3. মাইগ্রেশনের ভিতর দুটো column তৈরি করতে হবে
     -এখানে আমরা দুইটা কলাম তৈরি করব
     - gallery.index ভিউয়ের ভিতরে  <input type="hidden" name="product_id" value="{{ $productId }}">
    - controller index method ভিতরে  String $productId parameter pass করলাম and compact করলাম;
    -store function ভিতরে image oi category wise save korlam


 */
