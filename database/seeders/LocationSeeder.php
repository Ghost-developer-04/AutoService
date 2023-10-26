<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'Ashgabat city, Oguzhan street', 'phone_number' => 717170],
            ['name' => 'Ashgabat city, Magtymguly street', 'phone_number' => 727270],
            ['name' => 'Ashgabat city, "Berkarar" Shopping center', 'phone_number' => 737370],
            ['name' => 'Ahal region, Anew', 'phone_number' => 707070],
            ['name' => 'Ahal region, Gok-depe', 'phone_number' => 707071],
            ['name' => 'Ahal region, Tejen', 'phone_number' => 707072],
            ['name' => 'Lebap region, Charjou', 'phone_number' => 717273],
            ['name' => 'Dashoguz region, Dashoguz', 'phone_number' => 747576],
            ['name' => 'Mary region, Mary', 'phone_number' => 777879],
            ['name' => 'Balkan region, Nebitdag', 'phone_number' => 776655],
        ];

        foreach ($locations as $location) {
            Location::create([
                'name' => $location['name'],
                'slug' => str($location['name'])->slug(),
                'phone_number' => $location['phone_number']
            ]);
        }
    }
}
