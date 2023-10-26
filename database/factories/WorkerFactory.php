<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $location = Location::inRandomOrder()->first();
        $service = Service::inRandomOrder()->first();
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $full_name = $first_name . ' ' . $last_name;
        $phone_number = fake()->numberBetween(61000000, 66000000);
        $slug = str($full_name)->slug();
        $applied_job = fake()->date();
        $experience = Carbon::now()->diffInYears($applied_job);

        return [
            'location_id' => $location->id,
            'service_id' => $service->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'full_name' => $full_name,
            'phone_number' => $phone_number,
            'slug' => $slug,
            'applied_for_job' => $applied_job,
            'experience' => $experience,
        ];
    }
}
