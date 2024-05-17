<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'phone' => fake()->phoneNumber,
            'budget' => fake()->randomElement(['< 5k', '5 ÷ 10k', '10 ÷ 20k', '20 ÷ 50k', '> 50k']),
            'services' => json_encode(fake()->randomElements(['webDesign', 'translation', 'contentWriting', 'website', 'adsStrategy', 'onlineMarketing', 'flutterApp', 'teaching'], fake()->numberBetween(1, 5))),
            'note' => fake()->paragraph,
        ];
    }
}
