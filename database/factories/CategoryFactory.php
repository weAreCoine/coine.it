<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(2, true);
        $seoTitle = fake()->unique()->words(2, true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'seo_title' => $seoTitle,
            'description' => fake()->paragraph(2),
            'seo_description' => fake()->paragraph(2),
            'language_id' => 1,
        ];
    }
}
