<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarSerie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $car_brands = [
            ['name' => 'BMW', 'image' => 'Bmw-img.png', 'series' => ['M', 'X', 'I']],
            ['name' => 'Mercedes-Benz', 'series' => ['ML', 'E-Class', 'S-Class', 'Gelandewagen', 'image' => 'Mercedes.png']],
            ['name' => 'Toyota', 'series' => ['Camry', 'Corolla', 'Avalon', 'Land Cruiser', 'Aurion', 'Rav-4',
                'Hilux', 'Highlander', 'Crown', 'Sienna', 'Supra'], 'image' => 'Toyota.png'],
            ['name' => 'Lexus', 'series' => ['ES', 'IS', 'LX', 'GX'], 'image' => 'Lexus.png'],
            ['name' => 'Hyundai', 'series' => ['Sonata', 'Elantra', 'Tucson', 'Santa-Fe', 'Genesis'], 'image' => 'Hyundai.png'],
            ['name' => 'Kia', 'series' => ['Optima', 'Cadenza', 'Sorento', 'K', 'Stinger', 'Sportage', 'Carnival'], 'image' => 'Kia.png'],
        ];

        foreach ($car_brands as $brand) {
            $obj = CarBrand::create([
                'name' => $brand['name'],
                'slug' => str($brand['name'])->slug(),
                'image' => $brand['image'],
            ]);

            foreach ($brand['series'] as $serie) {
                CarSerie::create([
                    'car_brand_id' => $obj->id,
                    'name' => $serie,
                    'slug' => str($serie)->slug(),
                ]);
            }
        }
    }
}
