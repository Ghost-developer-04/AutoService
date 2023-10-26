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
        $phone_number = fake()->numberBetween(61000000, 66000000);
        $hasBonus = fake()->boolean(50);
        $cash_in_bonus = $hasBonus == True ? fake()->randomFloat(1, 0, 1000) : null;
        $slug = str($full_name)->slug();


        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'full_name' => $full_name,
            'phone_number' => $phone_number,
            'bonus_status' => $hasBonus,
            'cash_in_bonus' => $cash_in_bonus,
            'slug' => $slug,
        ];
    }
}
