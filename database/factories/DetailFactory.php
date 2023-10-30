<?php

namespace Database\Factories;

use App\Models\DetailCategory;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail>
 */
class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $location = Location::inRandomOrder()->first();
        $detail_category = DetailCategory::inRandomOrder()->first();
        $name = fake()->country() . ' ' . fake()->city();
        $slug = str($name)->slug();
        $price = number_format(rand(50, 5000), 2, '.', '');
        $inStock = fake()->boolean(50);
        $stock = $inStock == True ? rand(1, 30) : 0;

        return [
            'location_id' => $location->id,
            'detail_category_id' => $detail_category->id,
            'name' => $name,
            'slug' => $slug,
            'price' => $price,
            'stock' => $stock,
        ];
    }
}
