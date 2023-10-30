<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Location;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'location' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'sortBy' => 'nullable|string|in:old-to-new,low-to-high',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_service = $request->has('service') ? $request->service : null;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;

        $workers = Worker::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
            return $query->where(function ($query) use ($f_q, $f_q2) {
                $query->orwhere('full_name', 'like', '%' . $f_q . '%');
                $query->orwhere('slug', 'like', '%' . $f_q . '%');
                $query->orwhere('full_name', 'like', '%' . $f_q2 . '%');
                $query->orwhere('slug', 'like', '%' . $f_q2 . '%');
            });
        })
            ->when(isset($f_location), function ($query) use ($f_location) {
                return $query->whereHas('location', function ($query) use ($f_location) {
                    $query->where('slug', $f_location);
                });
            })
            ->when(isset($f_service), function ($query) use ($f_service) {
                return $query->whereHas('service', function ($query) use ($f_service) {
                    $query->where('slug', $f_service);
                });
            })
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'old-to-new') {
                    return $query->orderBy('experience');
                }
                else {
                    return $query->orderBy('experience', 'desc');
                }
            }, function ($query) {
                return $query->orderBy('experience', 'desc');
            })
            ->with('service', 'location', 'cars')
            ->paginate(20)
            ->withQueryString();

        $locations = Location::orderBy('name')
            ->get();

        $services = Service::orderBy('name')
            ->get();

        $cars = Car::orderBy('name')
            ->get();

        return view('workers.index')
            ->with([
                'cars' => $cars,
                'locations' => $locations,
                'services' => $services,
                'workers' => $workers,
                'f_q' => $f_q,
                'f_location' => $f_location,
                'f_service' => $f_service,
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
    public function show($worker)
    {
        $obj = Worker::with('location', 'service')
            ->findOrFail($worker);

        $sameLocation = Worker::where('location_id', $obj->location_id)
            ->with('location', 'service')
            ->take(6)
            ->inRandomOrder()
            ->get();

        $sameService = Worker::where('service_id', $obj->service_id)
            ->with('location', 'service')
            ->take(6)
            ->inRandomOrder()
            ->get();

        return view('workers.show')
            ->with([
                'obj' => $obj,
                'sameLocation' => $sameLocation,
                'sameService' => $sameService,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
