<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\Client;
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

        $car_brand = CarBrand::inRandomOrder()->with('series')->first();
        $car_serie = $car_brand->serie->count() > 0 ? $car_brand->series->random()->id : null;
        $client = Client::inRandomOrder()->first();
        $detail_need = fake()->boolean(50);
        $detail = $detail_need == True ? Detail::inRandomOrder()->first() : null;
        $location = Location::inRandomOrder()->first();
        $service = Service::inRandomOrder()->with('workers')->first();
        $worker = $service->worker->count() > 0 ? $service->worker->random()->id : null;
        $name = $car_brand . ' ' . $car_serie;
        $arrival_date = fake()->dateTimeBetween('-1 years', 'now');
        $isReady = $arrival_date < Carbon::next(-7) ? False : True;
        $departure_date = $isReady == True ? Carbon::parse($arrival_date)->addDays(2)->toDateString() : null;
        $car_number =

        return [
            'car_brand_id' => $car_brand->id,
            'car_serie_id' => $car_serie,
            'client_id' => $client->id,
            'location_id' => $location->id,
            'service_id' => $service->id,
            'worker_id' => $worker,
            'detail_id' => $detail->id,
            'name' => $name,
            'slug' => str($name)->slug(),
            'arrival_date' => $arrival_date,
            'isReady' => $isReady,
            'departure_date' => $departure_date,
        ];
    }
}
