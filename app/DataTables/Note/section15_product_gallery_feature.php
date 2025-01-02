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

/*
    --------------------|130. 3_Product Gallery - Showing Created Images and Working with Delete Feature----------------


    1. এখানে ভিউ file ভিতরে টেবিল তৈরি করব

    2. gallery controller এর মদ্ধে index method এর মদ্ধে  model থেকে ডাটা গুলো তুলে নিয়ে আসব $image variable এ
    gallery controller থেকে সকল ডাটা ভিউয়ের ভিতর  view ভিতরে কম্প্যাক্ট করে দিলাম এবং এখানে একটা loop তৈরি করলাম সেই লোকের ভিতরে ডিলেট আইকন ডাইনামিক গুলি বসালাম

    4. এবার delete কন্ট্রোলারে backend কাজ করব


    5. এবার যে প্রোডাক্টের জিনিসটা ইমেজ গুলো আপলোড করছি সেই প্রোডাক্টের নাম গ্যালারি ইমেজের পেজে দেখাবো

    6. গ্যালারি পেজে একটা ব্যাক বাটন করাবো যেন এখানে ক্লিক করলে ইনডেক্স page চলে যেতে পারে

 */
