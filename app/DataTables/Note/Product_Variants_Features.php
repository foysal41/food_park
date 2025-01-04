<?php

/* --------------------| 131. 1_Product Size Variant - Creating Necessary Files and Designs |---------------

1. যেখানে আমরা প্রোডাক্ট এর গ্যালারি ইমেজ আপলোড করেছি সেখানে প্রোডাক্ট এর সাইজ এবং খাবারের অপশনাল বিষয়গুলো এড করবো
    - এজন্য আমার প্রোডাক্টে data table গেলাম, গ্যালারি লিংকের নিচে আরেকটা লিঙ্ক অ্যাড করব size  নামে. সেই সাথে সাইজের জন্য একটি রাউট তৈরি করতে হবে, এবং একটি সাইজ কন্ট্রোলার বানাবো php artisan make:controller Admin/ProductSizeController, এবার একটি মডেল বানাবো  php artisan make:model ProductSize -m

    -এরপর গ্যালারি ইনডেক্স থেকে সকল কোড নিয়ে এসে প্রোডাক্ট সাইজের ভিতরে পেস্ট করব

    - admin রাউট ফাইল তৈরি করলাম

    -প্রোডাক্ট সাইজ নামে একটি ডাউট তৈরি করতে হবে যেন সেই প্রোডাক্টটি এগেইনস্টে যে সাইজ গুলি রয়েছে সেগুলো ট্র্যাক করার জন্য


*/



/* --------------------| 132. 2_Product Size Variant - Working with Create Feature |---------------

product-size view এর মদ্ধে index ফাইল এর মদ্ধে একটি ফরম এর মধ্যে সাইজ এবং প্রডাক্ট চার্জ এবং নেম ইনপুট ফিল্ড তৈরি করলাম
২। ্controller এর মদ্ধে store method এর মদ্ধে validate করলাম
৩। তারপর create_product_size_table এর মদ্ধে ডাটা ইনপুট করার জন্য টেবিল বানালাম
4. size controller এর মদ্ধে store method এর মদ্ধে ডাটা ইনপুট করলাম

প্রোডাক্ট সাইজ create করার কাজ শেষ।


*/


/* --------------------| 133. 3_Product Size Variant - Showing Created Data and Working with Delete Feature|---------------

1. productSizeController এর মদ্ধে index method এর মদ্ধে প্রোডাক্ট সাইজ ডাটা টেবিল থেকে প্রোডাক্ট আইডি তুলে নিয়ে আসলাম. image এবং action এর মদ্ধে loop চালতে সাহায্য করবে

2. প্রোডাক্ট গ্যালারি থেকে destory ফাংশন কপি করে নিয়ে আসো, সেখানে prodcut size মডেল  অ্যাড করে দিলাম

product size controller অপ্রয়োজনীয় ফাংশন গুলো ডিলিট করে দিলাম . এভাবে মোটামুটি প্রোডাক্ট সাইজের CRUD অপারেশন কমপ্লিট

পরবর্তী part এর অপশনাল সাইজ এড করার কাজগুলো করব

*/


/* --------------------| 134. 4_Product Option Variant - Working with Create Feature|---------------

1. প্রোডাক্ট অপশনাল ক্রিয়েট এর কন্ট্রোলার বানাবো php artisan make:controller Admin/ProductOptionController -r
- php artisan make:model ProductOption -m
- তারপর একটি রাউটফাইল তৈরি করব

2. এই প্রোডাক্ট অপশন কন্ট্রোলারের জন্য কোন ভিউ ফাইল তৈরি করব না. প্রোডাক্ট সাইজ ভিউয়ের ভেতরে বিষয়গুলো ডিসপ্লে করব
- আমরা আলাদাভাবে দুইটা ফর্ম এর toastr এই মেসেজ দেখাতে পারলাম

3. database এর সেভ করার জন্য backend ready করলাম

4. database product size controller এর মদ্ধে create method এর মদ্ধে column বানালাম

পরে এই ডাটা গুলা পেজ এ দেখাবো


*/



/* --------------------| 135. 5_Product Option Variant - Showing Created Datas|---------------

product size controller এর মদ্ধে create method এর মদ্ধে $options variable এর মদ্ধে ডাটা গুলা তুলে নিয়ে আসব
delete function কাজ করলাম


*/
