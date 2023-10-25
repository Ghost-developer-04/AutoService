<?php

namespace Database\Seeders;

use App\Models\DetailCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail_categories = [
            'Tyres',
            'Discs',
            'Batteries',
            'Oils',
            'Filters',
            'Accessories',
            'Car Care Products',
            'Spare Pants',
            'Auto Tools',
        ];

        foreach ($detail_categories as $category) {
            DetailCategory::create([
                'name' => $category,
                'slug' => str($category)->slug(),
            ]);
        }
    }
}
