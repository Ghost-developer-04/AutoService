<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\Client;
use App\Models\DetailCategory;
use App\Models\Location;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $locations = Location::orderBy('name')->get();
        $services = Service::orderBy('name')->get();
        $detail_categories = DetailCategory::orderBy('name')
            ->get();
        $car_brands = CarBrand::withCount('cars')->orderBy('name')->get();
        $workers = Worker::orderBy('experience', 'desc')->take(5)->get();
        $cars = Car::with('car_brand')->orderBy('name')->get();
        $clients = Client::orderBy('full_name')->get();

        return view('home.index')
            ->with([
                'locations' => $locations,
                'services' => $services,
                'detail_categories' => $detail_categories,
                'car_brands' => $car_brands,
                'workers' => $workers,
                'cars' => $cars,
                'clients' => $clients,
            ]);
    }
}
