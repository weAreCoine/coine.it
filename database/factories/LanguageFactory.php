<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'language_code' => fake()->languageCode(),
            'active'=>fake()->boolean(90)
        ];
    }
}
