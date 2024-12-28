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
