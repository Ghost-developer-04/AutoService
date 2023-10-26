<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\Detail;
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
        $details = Detail::with('detail_category')
            ->orderBy('name')
            ->get();
        $car_brands = CarBrand::orderBy('name')->get();
        $workers = Worker::orderBy('experience')->take(5)->get();

        return view('home.index')
            ->with([
                'locations' => $locations,
                'services' => $services,
                'details' => $details,
                'car_brands' => $car_brands,
                'workers' => $workers,
            ]);
    }
}
