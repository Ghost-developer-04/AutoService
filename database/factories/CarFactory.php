<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\Client;
use App\Models\Detail;
use App\Models\Location;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $car_brand = CarBrand::inRandomOrder()->with('car_series')->first();
        $car_serie = $car_brand->car_series->count() > 0 ? $car_brand->car_series->random() : null;
        $client = Client::inRandomOrder()->first();
        $detail_need = fake()->boolean(50);
        $detail = $detail_need == True ? Detail::inRandomOrder()->first() : null;
        $location = Location::inRandomOrder()->first();
        $service = Service::inRandomOrder()->with('workers')->first();
        $worker = $service->workers->count() > 0 ? $service->workers->random()->id : null;
        $name = $car_brand->name . ' ' . $car_serie->name;
        $arrival_date = fake()->dateTimeBetween('-1 months', 'now');
        $isReady = Carbon::now()->diffInDays($arrival_date) < 7 ? False : True;
        $departure_date = $isReady == True ? Carbon::parse($arrival_date)->addDays(2)->toDateString() : null;
        $car_number = fake()->numberBetween(0000, 9999);
        $price = fake()->numberBetween(50, 500);

        return [
            'car_brand_id' => $car_brand->id,
            'car_serie_id' => $car_serie->id,
            'client_id' => $client->id,
            'location_id' => $location->id,
            'service_id' => $service->id,
            'worker_id' => $worker,
            'detail_id' => $detail_need == True ? $detail->id : null,
            'name' => $name,
            'slug' => str($name) . str(fake()->city())->slug(),
            'price' => $price,
            'arrival_date' => $arrival_date,
            'isReady' => $isReady,
            'departure_date' => $departure_date,
            'car_number' => $car_number,
        ];
    }
}
