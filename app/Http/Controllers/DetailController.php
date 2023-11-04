<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\DetailCategory;
use App\Models\Location;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'detail_category' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'minPrice' => 'nullable|integer',
            'maxPrice' => 'nullable|integer',
            'inStock' => 'nullable|boolean',
            'sortBy' => 'nullable|string|in:low-to-high,high-to-low,old-to-new'
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;
        $f_detail_category = $request->has('detail_category') ? $request->detail_category : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : null;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : null;
        $f_inStock = $request->has('inStock') ? $request->inStock : null;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;

        $details = Detail::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
                return $query->where(function ($query) use ($f_q, $f_q2) {
                    $query->orWhere('name', 'like', '%' . $f_q . '%');
                    $query->orWhere('slug', 'like', '%' . $f_q . '%');
                    $query->orWhere('name', 'like', '%' . $f_q2 . '%');
                    $query->orWhere('slug', 'like', '%' . $f_q2 . '%');
                });
            })
            ->when(isset($f_detail_category), function ($query) use ($f_detail_category) {
                return $query->whereHas('detail_category', function ($query) use ($f_detail_category) {
                    $query->where('slug', $f_detail_category);
                });
            })
            ->when(isset($f_location), function ($query) use ($f_location) {
                return $query->whereHas('location', function ($query) use ($f_location) {
                    $query->where('slug', $f_location);
                });
            })
            ->when(isset($f_minPrice), function ($query) use ($f_minPrice) {
                return $query->where('price', '>=', $f_minPrice);
            })
            ->when(isset($f_maxPrice), function ($query) use ($f_maxPrice) {
                return $query->where('price', '<=', $f_maxPrice);
            })
            ->when(isset($f_inStock), function ($query) {
                return $query->where('stock', '>', 0);
            })
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'low-to-high') {
                    return $query->orderBy('price');
                } elseif ($f_sortBy == 'high-to-low') {
                    return $query->orderBy('price', 'desc');
                } elseif ($f_sortBy == 'old-to-new') {
                    return $query->orderBy('id');
                } else {
                    return $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                return $query->orderBy('id', 'desc');
            })
            ->with('location', 'detail_category')
            ->paginate(20)
            ->withQueryString();

        $detail_categories = DetailCategory::orderBy('name')
            ->get();

        $locations = Location::orderBy('name')
            ->get();

        return view('details.index')
            ->with([
                'details' => $details,
                'detail_categories' => $detail_categories,
                'locations' => $locations,
                'f_q' => $f_q,
                'f_detail_category' => $f_detail_category,
                'f_location' => $f_location,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_inStock' => $f_inStock,
                'f_sortBy' => $f_sortBy,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detail_categories = DetailCategory::orderBy('name')->get();

        $locations = Location::orderBy('name')->get();

        return view('details.create')
            ->with([
                'detail_categories' => $detail_categories,
                'locations' => $locations,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|integer|min:1',
            'detail_category' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
        ]);

        $detail = new Detail();
        $detail->location_id = $request->location;
        $detail->detail_category_id = $request->detail_category;
        $detail->name = $request->name;
        $detail->slug = str()->random(10);
        $detail->price = round($request->price, 1);
        $detail->save();

        $detail->slug = str($detail->name)->slug() . '-' . $detail->id;
        $detail->update();

        return to_route('details.show', $detail->id)
            ->with([
                'success' => $detail->name . ' detail successfully created!',
            ]);
    }


    public function show($detail)
    {
        $obj = Detail::with('location', 'detail_category')
            ->findOrFail($detail);
        $obj->increment('viewed');

        $sameCategory = Detail::where('detail_category_id', $obj->detail_category_id)
            ->with('location', 'detail_category')
            ->take(6)
            ->inRandomOrder()
            ->get();

        $sameLocation = Detail::where('location_id', $obj->location_id)
            ->with('location', 'detail_category')
            ->take(6)
            ->inRandomOrder()
            ->get();

        return view('details.show')
            ->with([
                'obj' => $obj,
                'sameCategory' => $sameCategory,
                'sameLocation' => $sameLocation,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        $detail_categories = DetailCategory::orderBy('name')
            ->get();
        $locations = Location::orderBy('name')
            ->get();

        return view('details.edit')
            ->with([
                'obj' => $detail,
                'detail_categories' => $detail_categories,
                'locations' => $locations,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'location' => 'required|integer|min:1',
            'detail_category' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
        ]);

        $detail->location_id = $request->location;
        $detail->detail_category_id = $request->detail_category;
        $detail->name = $request->name;
        $detail->slug = str($detail->name)->slug() . '-' . $detail->id;
        $detail->price = round($request->price, 1);

        $detail->update();

        return to_route('details.show', $detail->id)
            ->with([
                'success' => $detail->name . ' detail successfully edited!',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        $detailName = $detail->name;
        $detail->delete();

        return to_route('details.index')
            ->with([
                'success' => $detailName . ' detail successfully deleted!',
            ]);
    }
}
