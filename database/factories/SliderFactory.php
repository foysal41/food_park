<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '/uploads/test',
            'offer' => '50%',

            //sentence ব্যবহার করলে এটি আমাদের জন্য একটি বাক্য তৈরি করবে। এখন আমরা এখানে একটি লিমিট সেট করতে পারি ৬টি শব্দের
            'title' => fake()->sentence(),
            'sub_title' =>fake()->sentence(10),
            'short_description' => fake()->paragraph(2),
            'button_link' => fake()->url(),
            'status' => fake()->boolean(),
        ];
    }
}
