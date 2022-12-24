<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Language;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(5, true);
        return [
            'status' => fake()->randomElement(['draft', 'private', 'publish']),
            'trashed' => fake()->boolean(10),
            'title' => $title,
            'slug' => Str::slug($title),
            'seo_title' => $title,
            'featured_image' => Upload::factory(),
            'language_id'=>1,
            'description' => fake()->paragraph(1),
            'seo_description' => fake()->paragraph(1),
            'content' => fake()->paragraph(10),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}
