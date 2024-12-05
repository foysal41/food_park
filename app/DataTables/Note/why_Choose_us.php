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
