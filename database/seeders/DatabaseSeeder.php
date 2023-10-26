<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Client;
use App\Models\Detail;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CarBrandSeeder::class,
            DetailCategorySeeder::class,
            LocationSeeder::class,
            ServiceSeeder::class,
        ]);

        Client::factory(100)->create();
        Worker::factory(50)->create();
        Detail::factory(100)->create();
        Car::factory(100)->create();

    }
}
