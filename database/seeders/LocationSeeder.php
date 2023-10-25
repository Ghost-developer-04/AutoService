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
            'Ashgabat city, Oguzhan street',
            'Ashgabat city, Magtymguly street',
            'Ashgabat city, "Berkarar" Shopping center',
            'Ahal region, Anew',
            'Ahal region, Gok-depe',
            'Ahal region, Tejen',
            'Lebap region, Charjou',
            'Dashoguz region, Dashoguz',
            'Mary region, Mary',
            'Balkan region, Nebitdag',
        ];

        foreach ($locations as $location) {
            Location::create([
                'name' => $location,
                'slug' => str($location)->slug(),
            ]);
        }
    }
}
