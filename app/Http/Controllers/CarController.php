<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\Location;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'location' => 'nullable|string|max:255',
            'car_brand' => 'nullable|string|max:255',
            'car_serie' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'worker' => 'nullable|string|max:255',
            'minPrice' => 'nullable|integer',
            'maxPrice' => 'nullable|integer',
            'sortBy' => 'nullable|string|in:old-to-new',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_car_brand = $request->has('car_brand') ? $request->car_brand : null;
        $f_car_serie = $request->has('car_serie') ? $request->car_serie : null;
        $f_service = $request->has('service') ? $request->service : null;
        $f_worker = $request->has('worker') ? $request->worker : null;
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : null;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : null;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;

        $cars = Car::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
            return $query->where(function ($query) use ($f_q, $f_q2) {
                $query->orwhere('name', 'like', '%' . $f_q . '%');
                $query->orwhere('slug', 'like', '%' . $f_q . '%');
                $query->orwhere('name', 'like', '%' . $f_q2 . '%');
                $query->orwhere('slug', 'like', '%' . $f_q2 . '%');
            });
        })
            ->when(isset($f_location), function ($query) use ($f_location) {
                return $query->whereHas('location', function ($query) use ($f_location) {
                    $query->where('slug', $f_location);
                });
            })
            ->when(isset($f_car_brand), function ($query) use ($f_car_brand) {
                return $query->whereHas('car_brand', function ($query) use ($f_car_brand) {
                    $query->where('slug', $f_car_brand);
                });
            })
            ->when(isset($f_car_serie), function ($query) use ($f_car_serie) {
                return $query->whereHas('car_serie', function ($query) use ($f_car_serie) {
                    $query->where('slug', $f_car_serie);
                });
            })
            ->when(isset($f_service), function ($query) use ($f_service) {
                return $query->whereHas('service', function ($query) use ($f_service) {
                    $query->where('slug', $f_service);
                });
            })
            ->when(isset($f_worker), function ($query) use ($f_worker) {
                return $query->whereHas('worker', function ($query) use ($f_worker) {
                    $query->where('slug', $f_worker);
                });
            })
            ->when(isset($f_minPrice), function ($query) use ($f_minPrice) {
                return $query->with('service', function ($query) use($f_minPrice) {
                   $query->where('price', '<=', $f_minPrice);
                });
            })
            ->when(isset($f_maxPrice), function ($query) use ($f_maxPrice) {
                return $query->with('service', function ($query) use($f_maxPrice) {
                    $query->where('price', '>=', $f_maxPrice);
                });
            })
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'old-to-new') {
                    return $query->orderBy('id');
                }
                else {
                    return $query->orderBy('id', 'desc');
                }
                }, function ($query) {
                return $query->orderBy('id', 'desc');
            })
            ->with('car_brand', 'car_serie', 'service', 'worker', 'location')
            ->paginate(20)
            ->withQueryString();

        $locations = Location::orderBy('name')->get();

        return view('cars.index')
            ->with([
                'cars' => $cars,
                'locations' => $locations,
                'f_q' => $f_q,
                'f_location' => $f_location,
                'f_car_brand' => $f_car_brand,
                'f_car_serie' => $f_car_serie,
                'f_service' => $f_service,
                'f_worker' => $f_worker,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_sortBy' => $f_sortBy,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
