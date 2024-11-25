<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('offer');
            $table->string('title');
            $table->string('subtitle');
            $table->string('short_description');
            $table->string('button_link');
            $table->boolean('status');
            $table->timestamps();
        });
    }

/*
 All steps are down below
1. php artisan make:migration create_sliders_table --create=sliders

2. আমরা স্লাইডারের জন্য একটি ফ্যাক্টরি তৈরি করছি, আমাদের মডেলের নাম Slider hobe |  php artisan make:factory SliderFactory|  Why factory? ম্যানুয়ালি ইনসার্ট করার দরকার নেই—Factory স্বয়ংক্রিয়ভাবে তোমার জন্য ডেটা তৈরি করে দেবে।

3. seeders>databaseSeeders এর মদ্ধে  sliderFactory.php define করে দিতে হবে।

4.যখন আমরা php artisan db:seed চালাব, তখন এটি স্লাইডারের জন্য ৩টি ডেটা তৈরি করবে, যা আমরা factory-তে নির্ধারণ করেছি। তবে এখানে আমি DB seed চালাব না। বরং Tinker Command ব্যবহার করে এই ফ্যাক্টরি এক্সিকিউট করব। আমরা একটি একক কমান্ড ব্যবহার করতে পারি।

5. php artisan tinker
then clear
use App\Models\Slider;
Slider::factory(4)->create();
 4 টি dummy ডেটা তৈরি করে দেবে



*/


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
