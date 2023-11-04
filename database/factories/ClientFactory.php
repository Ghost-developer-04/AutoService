<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $full_name = $first_name . ' ' . $last_name;
        $password = bcrypt('AutoService');
        $phone_number = fake()->numberBetween(61000000, 66000000);
        $slug = str($full_name)->slug();


        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'full_name' => $full_name,
            'password' => $password,
            'phone_number' => $phone_number,
            'slug' => $slug,
        ];
    }
}
