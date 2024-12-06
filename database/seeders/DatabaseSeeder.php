<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\WhyChooseUs;
use Database\Factories\SliderFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);


        //এখন আমরা user-এর জায়গায় আমাদের factory-কে রিপ্লেস করব। factory-র ভেতরে তুমি ঠিক করতে পার কতগুলো ডেটা তৈরি করতে চাও? Slider-এর জন্য ৩টি স্লাইডার তৈরি করব।
        \App\Models\slider::factory(3)->create();


        $this->call(WhyChooseUsTitleSeeder::class);
        \App\Models\slider::factory(3)->create();
        \App\Models\WhyChooseUs::factory(3)->create();

    }
}
