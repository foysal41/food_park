<?php
/*
--------------------| Creating Necessary Files and Designs (Part - 1) |----------------
1. views>admin>layout>sidebar.blade.php এর মদ্ধে একটা li tag নিব why choose us নামে।

2. php artisan make:controller Admin/WhyChooseUsController -r (আমারা এই জায়গা CRUD চালাবো কারন why choose us এর মদ্ধে তিন তা কার্ড আছে লাগলে আর add করার অপশন রাখলাম)

3. php artisan make:model WhyChooseUs -m মডেল এবং migration তৈরি করলাম

4. php artisan make:factory WhyChooseUsFactory তৈরি করলাম

5. php artisan make:model SectionTitle -m (প্রতিটি সেকশনের জন্য (যেমন "Why Choose Us?") একটি আলাদা টেবিল তৈরি করা হবে যাতে সমস্ত সেকশনের টাইটেল রাখা হবে।)


6. view>admin এর মদ্ধে একটা ফোল্ডার বানাবো why-choose-us>index.blade.php (slider design copy করবো)

7. php artisan datatable:make WhyChooseUs একটা datatable বানিয়ে নিলাম।

8. Route > admin এর মদ্ধে একটা why-choose-us নামে Route তৈরি করবো। এবং link connect করে দিলাম


*/



/*
--------------------| Why choose us - Creating Necessary Files and Designs (Part - 2) |----------------
1. Only created why choose us view file


*/



/*
--------------------| Why choose us - Creating Migration Columns and Seed Data |----------------


1. create_section_titles_table এর মধ্যে  key and value table ache.
- প্রতিটি টাইটেল জন্য একটি ইউনিক কী তৈরি হবে
- এরপর, সেই কী-এর সাথে সম্পর্কিত ভ্যালু হবে "Why Choose Us?" (এটা ফ্রন্টএন্ডে যেভাবে দেখানো হবে)।
- php artisan migrate

2. "Why Choose Us" সেকশনের জন্য ফ্যাক্টরি ব্যবহার না করে সিডার ব্যবহার করার সিদ্ধান্ত নেওয়া হয়েছে, কারণ এখানে কীগুলো স্ট্যাটিক এবং ইউনিক থাকবে, তবে ভ্যালুগুলি পরিবর্তনযোগ্য হবে।
-php artisan make:seeder WhyChooseUsSeeder
- section title  model এর মধ্যে $fillable key and value বাসাবো
- seeder এরমধ্যে SectionTitle Model add করে নিব and  সেকশন টাইটেল এর ইনফরমেশন গুলো দিয়ে দিলাম
-DatabaseSeeder.php এর মধ্যেই seeder টা কানেক্ট করে দিব  $this->call(WhyChooseUsSeeder::class);

final: এখানে section_titles টেবিলটি দুটি কলাম নিয়ে কাজ করছে: একটি হলো key এবং অন্যটি হলো value। এখানে key কলামে প্রতিটি টাইটেলের জন্য ইউনিক কী রাখা হবে, এবং value কলামে সেই কী-এর সাথে সংশ্লিষ্ট টাইটেল রাখা হবে। যখন টাইটেলগুলো ডায়নামিকভাবে ব্যবহার করতে হবে, তখন সেই কী-এর মাধ্যমে আমরা সংশ্লিষ্ট ভ্যালু ফেচ করব।
এই পদ্ধতি নিশ্চিত করবে যে, আপনি যদি কোনও টাইটেল পরিবর্তন করতে চান, তখন শুধু ভ্যালু পরিবর্তন করতে হবে, কী-এর নাম একই থাকবে।


*/

/*
--------------------| Why choose us - Showing Dynamic Titles in Title Form |----------------

1. view>admin>why-choose-us>index.blade.php  এরমধ্যে ইনপুট গুলো ফর্মের মধ্যে নিয়ে নিলাম. এবং name arrribute এর মধ্যে ডাটাবেজের সেই Key গুলো বসাবো. কন্ট্রোলার এর ভেতরে ডাটা গুলো fetch করব

2. controller>admin>whyChooseUsController এর মধ্যে index ফাংশনের মধ্যে ডাটাগুলো key এর উপর নির্ভর করে data fetch করব
- $key এর মধ্যে ডাটাবেজের  key  গোলা একটি array ভেতরে স্টোর করলাম
- এবার title fetch করার জন্য sectionTitle model ta লোড করে নিব. $title = SectionTitle::WhereIn('key' , $key)->pluck('value', 'key');; এভাবে ডাটা গুলো title variable তুলে নিয়ে আসলাম. {pluck বিষয়টা  11:00 মিনিট}


*/


/*
--------------------| Why choose us - Working with Title Update Feature |----------------

1.  এই why choose us er CRUD চলবে শুধুমাত্র নিচের card এর জন্য

2 . আমরা এবার admin>route এই ফোল্ডারে যাব| আপনি যদি নতুন কোনো route যোগ করতে চাই, যেটি resource controller দ্বারা হ্যান্ডল হবে, তাহলে সেই রুটটি resource route-এর উপরে লিখতে হবে। একটি উদাহরণ, যেখানে PUT route ব্যবহার করে Why choose title upate আপডেট করা হবে। সেজন্য সেই route resource route-এর উপরে লিখেছি. এটা একটা ম্যানুয়াল route
ex:  Route::put('why-choose-title-update' , WhyChooseUsController::class , 'updateTitle')->name('why-choose-title-update');

3. WhyChooseUsController এরমধ্যে নতুন একটি ফাংশন তৈরি করব 'updateTitle' নামে. এবং এই ফাংশনের প্যারামিটার request $request দিয়ে কাজটি করছি. চাইলে validation পার্ট আলাদা একটা ক্লাসে করে নিয়ে আসা যাবে.
- এই ফাংশন এর ভেতরে validation করব
- sectionTitle model এর জন্য updateOrCreate মেথড ব্যবহার করব

4. why choose us এর index.blade er মধ্যে যে ফর্মটা আছে  $title ব্যবহার করেছি তার আগে একটি @সাইন ব্যবহার করছি তার মানে @হল isset



*/




/*
--------------------| Why choose us - Creating Migration Columns and Seed Data For Why Chose Us Sect |----------------

1. why choose us card টেবিলের জন্য 3ta column তৈরি করতে হবে. icon, title, description
যদি Error Noting migration: php artisan migrate:rollback --path=/database/migrations/2024_12_05_121407_create_why_choose_us_table.php

2. এবার আমরা seeder php artisan make:seeder WhyChooseUsSeeder নিয়ে কাজ করব AND dummy ডাটা তৈরি করার জন্য ফ্যাক্টরি বানাবো php artisan make:factory WhyChooseUsFactory

4. database>seeders>\App\Models\WhyChooseUs::factory(3)->create(); এটা কানেক্ট করব
এরপর command যে  App\Models\WhyChooseUs::factory(4)->create(); চারটা ড্যামি ডেটা বানিয়ে দিবে



*/





/*
--------------------| Why Choose Us - Working with Why Choose Us Create Form ICON Design |----------------


1. resources>views>admin>why-choose-us>create.blade.php. slider create সমস্ত কোড কপি করে নিয়ে আসলাম. button লিংক ধরিয়ে দিলাম

2. why-choose-us কন্ট্রোলারের ভিতরে যাব এবং create function  এর মধ্যে view রিটার্ন করব.

3. Use https://github.com/victor-valencia/bootstrap-iconpicker and download the zip and see dist folder

4.  Document: https://victor-valencia.github.io/bootstrap-iconpicker/


*/




/*
--------------------| Why Choose Us - Handle the Create Form for store function |----------------

1. যখন আমার ক্রিয়েট হবে তখন কন্ট্রোলারের স্টোরে গিয়ে হিট করবে
2. ক্রিয়েট  রিকোয়েস্ট ভ্যালিডেশনের জন্য একটি ক্লাস বানাবো php artisan make:request Admin/WhyChooseUsCreateRequest
3. why choose us model এরমধ্যে protected $guarded = [];
4. WhyChooseUsController.php এর  store মেথডের কাজটা একটু অন্যভাবে করলাম

*/

/*
--------------------| Why Choose Us - Showing Data at Index |----------------

1. WhyChooseUsDataTable ফাইলের মধ্যে getColumns re এরেঞ্জ করে নিলাম and created and upate_at delete করে দিলাম. Also Icon and title add column করলাম

2. এবার data টেবিলের আইকন গুলো শো করাবো. এর জন্য datatable function কাস্টম কলাম রেজিস্টার করতে হবে. addColumn('icon' , function($query) and rawcolumn দিয়ে রেন্ডার করে দিলাম

3.  এবার আমরা edit and delete এই ফাংশনের জন্য একটি columnরেজিস্টার করব. এটা আমরা স্লাইডার টেবিল থেকে কপি করে নিয়ে আসতে পারি.

*/



/*
--------------------| Why Choose Us - Working with Update Feature |----------------

1. why choose us এর  edit.blade.php  ফাইল তৈরি করব. why choose us এর create.blade.php code কপি করে নিয়ে এসে edit ভিতরে পেস্ট করি. কারণ ক্রিয়েট এবং এডিট এর ফর্ম দুইটাই একই

2. এডিট ফর্ম এর সকল field ডাইনামিক করার পর. form সাবমিট হওয়ার পর admin.why-choose-us.update controller  গিয়ে হিট করবে. এই আপডেট ফাংশনের কাজ করলাম ঠিক যেমনটা করেছিলাম store ফাংশন এর জন্য

3. ডাটা টেবিলের ভেতর  status এই কলাম রেজিস্ট্রেশন করলাম এবং render করলাম


*/


/*
--------------------| Why Choose Us - Working with Delete Feature |----------------

1. শুধুমাত্র whyChoose us কন্ট্রোলার এর ভেতরে ডিলেট মেথডটি লিখলাম

2. ডিলিট করার সময় নোটিফিকেশনে error কোথায় হয়েছে তার ফাইলের নাম বলে দিচ্ছে.
যদি এমন ঘটনা ঘটে তাহলে হ্যাকার খুব সহজে আমার ফাইল রিড করতে পারবে.
এর জন্য আমরা রিটারনে হার্ড code লিখলাম return response (['status' => 'error' , 'message' => 'Something went wrong']);

*/


/*
--------------------| Why Choose Us - Showing Dynamic Contents at Frontend |----------------

1. ব্যান্ডের কনটেন্টে ডিসপ্লে করাবো. টাইটেল ফেচ করার লজিক: আপনি আগে থেকেই ব্যাকএন্ডে why choose us controller একটি লজিক তৈরি করেছেন যেখানে আপনি কীগুলি ব্যবহার করে টাইটেলগুলি ফেচ করেছেন। সেই কীগুলির অ্যারে ব্যবহার করে আপনি ডাটাবেস থেকে টাইটেলগুলো নিয়ে আসছেন। এই লজিকটির মাধ্যমে আপনি প্রয়োজনীয় টাইটেল পেয়ে যাচ্ছেন

2. এখন আপনি এই টাইটেলগুলো ফ্রন্টএন্ডে ব্যবহার করার জন্য FrontendController  এ কাজ করবেন।

3.  FrontendController থেকে ডাটাবেজ থেকে ডাটা ফেচ করে ফ্রন্ট এন্ডে পাঠিয়ে দিলাম

*/






