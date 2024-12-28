<?php
/*
--------------------|112. 1_Product Category - Creating Necessary Files and Designs |----------------

1. যেহেতু এখানে কোন প্রোডাক্ট নেই তাই প্রথমে প্রোডাক্ট তৈরি করে নিতে হবে. এর জন্য সাইডবারে মধ্যে নতুন একটি মেনু তৈরি করলাম Products Categoires

2. এবার আমরা মাইগ্রেশন মডেল কন্ট্রোলার তৈরি করব.
    -php artisan make:controller Admin/CategoryController -r
    -php artisan make:model Category -m
    -php artisan make:factory CategoryFactory তৈরি করলাম

3. এবার আমরা রাউট তৈরি করব - এর জন্য route > admin.php

4. admin ফোল্ডারের ভিতরে একটি prodcut ভিউ ফাইল তৈরি করব. প্রোডাক্ট এর মধ্যে একটি category ফাইল তৈরি করব.
    - slide.blade.php > index মধ্যে থেকে সকল code নিয়ে এসে এখানে দিয়ে দিলাম
    - এখানে একটি ডাটা টেবিল তৈরি করব php artisan datatable:make Category
    - টেবিলে ডাটা গুলো দেখানোর জন্য categoryController এরমধ্যে datatable ইনডেক্সে রিটার্ন করব



*/


/*
--------------------|113. 2_Product Category - Creating Migration Columns and Seeders |----------------

1. category migration এর মধ্যে column তৈরি হবে then migrate করলাম
2. আমরা ফ্যাক্টরি ফাইল তৈরি করেছিলাম কিন্তু এটা ডিলিট করে দেবো আমরা seeders তৈরি করব php artisan make:seeder CategorySeeder
    - এখানে আমরা ডাটা ইনসার্ট করব
    - এই seeder ডাটা ইনসার্ট হবে না যতক্ষণ না পর্যন্ত মডেলের ভিতর টেবিলের নাম গুলো দিচ্ছি
    -DatabaseSeeder.php এর মধ্যে seeder টা কানেক্ট করে দিব
    - php artisan db:seed --class=CategorySeeder

পরের part create features part


*/


/*
--------------------|114. 3_Product Category - Working with Create Feature |----------------

1. first a category > button a rotue link সেট করলাম।
2. category folder এর মদ্ধে একটি create.blade.php তৈরি করলাম. Slider এর মদ্ধে থেকে code গুলা নিয়ে আসলাম।
3. category contorller মধ্য create function রিটার্ন করব
4. ডাটা ভ্যালিলেট করার জন্য একটা ক্লাস তৈরি করলাম  php artisan make:request Admin/CategoryCreateRequest
5. এবার এটা inject করব কন্ট্রোলারের store ভেতর ডাটা insert করব


*/


/*
--------------------|115. 4_Product Category - Showing Data at Index Page|----------------

1. getColumns মেথড edit করলাম
2. dataTable function এর মদ্ধে 'action' , 'show_at_home' , 'status কাজ করলাম
3. ডাটা ভ্যালিলেট করার জন্য একটা ক্লাস তৈরি করলাম  php artisan make:request Admin/CategoryUpdateRequest

*/



/*
--------------------|116. 5_Product Category - Working with Update and Delete Feature|----------------

1. update করার জন্য edit.blade.php তৈরি করলাম
    - edit মদ্ধে findOrFail function use করে ডাটা admin.product.category.edit মদ্ধে পাঠিয়ে দিলাম।
    - edit মদ্ধে input value  অ্যাড করলাম। এটা করার জন্য update মদ্ধে ডাটা ভ্যালিলেট করলাম
    এবার এটা inject করব কন্ট্রোলারের update ভেতর ডাটা insert করব and store এর সব ডাটা paste করলাম।
    - fially destory method নিয়ে কাজ করলাম।


*/
