<?php
/*
--------------------|117. 1_Product - Creating Necessary Files and Designs |----------------
1. প্রথমে একটি রিসোর্স কন্ট্রোলার বানিয়ে নিব php artisan make:controller Admin/ProductController -r
2. এবার একটি মডেল এবং একটি ফ্যাক্টরি and migration তৈরি করব  php artisan make:model Product -mf
3. এবার একটি রাউট তৈরি করব - এর জন্য route > admin.php
4. সাইডবারে প্রোডাক্ট নামে একটি লিঙ্ক তৈরি করলাম
5. view মধ্যে প্রোডাক্ট, ফোল্ডারের মধ্যে একটি index.blade.php ফাইল তৈরি করলাম
6.যেহেতু আমাদের ইনডেক্সে data টেবিল কল করা আছে এর জন্য প্রোডাক্টের data টেবিল বানিয়ে নিতে হবে php artisan datatable:make Product
6. তারপর এই index product কন্ট্রোলারের view সঙ্গে কানেক্ট করব


*/

/*
--------------------|118. 2_Product - Creating Migration |----------------
1. এ পর্বে শুধুমাত্র মাইগ্রেশন এর টেবিলগুলো তৈরি করলাম. এবং এই টেবিলের মধ্যে ক্যাটাগরি id  একটি রিলেশন করিয়েছি.



*/



/*
--------------------|119. 3_Product - Adding Seeder Data with Factory |----------------
1. product factory file ভেতরে কিছু fake dummy ডেটা  ইন্সার্ট করলাম
2. DatabaseSeeder.php ভেতরে এই ডেটা ইন্সার্ট করলাম \App\Models\Product::factory(10)->create();
3. Terminal ভেতরে
    - php artisan tinker
    - \App\Models\Product::factory(5)->create()  করে এই ডেটা ইন্সার্ট করলাম

*/













/*
--------------------|120. 4_Product - Working with Create Feature (Part - 1) |----------------

1. ক্যাটাগরি থেকে create সকল কোড নিয়ে প্রোডাক্টের create e রাখলাম
2. admin > product কন্ট্রোলার থেকে ক্রিয়েট page রিটার্ন করলাম
3. প্রোডাক্ট ক্রিয়েট করার সময়,  ক্যাটাগরি টেবিল থেকে ডাটা fatch করে নিয়ে আসার জন্য,  product কন্ট্রোলার এর মধ্যে create ফাংশনে ক্যাটাগরি মডেল কে fatch করব
4. finally create.blade.php input আল্পু কিছু অ্যাড করে দিলাম।





*/
