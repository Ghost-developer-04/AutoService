<form action="{{ url()->current() }}">
    <div class="mb-3">
        <label for="q" class="form-label">Search</label>
        <input type="search" class="form-control" id="q" name="q" value="{{ $f_q }}" autocomplete="off" maxlength="30">
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <select class="form-select" id="location" name="location">
            <option value selected>-</option>
            @foreach($locations as $location)
                <option value="{{ $location->name }}" {{ $location->name == $f_location ? 'selected':'' }}>
                    {{ $location->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="car_brand" class="form-label">car_brand</label>
        <select class="form-select" id="car_brand" name="car_brand">
            <option value selected>-</option>
            @foreach($car_brands as $car_brand)
                <option value="{{ $car_brand->slug }}" {{ $car_brand->slug == $f_car_brand? 'selected':'' }}>
                    {{ $car_brand->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="car_serie" class="form-label">car_serie</label>
        <select class="form-select" id="car_serie" name="car_serie">
            <option value selected>-</option>
            @foreach($car_series as $car_serie)
                <option value="{{ $car_serie->slug }}" {{ $car_serie->slug == $f_car_serie ? 'selected':'' }}>
                    {{ $car_serie->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="service" class="form-label">service</label>
        <select class="form-select" id="service" name="service">
            <option value selected>-</option>
            @foreach($services as $service)
                <option value="{{ $service->slug }}" {{ $service->slug == $f_service ? 'selected':'' }}>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="minPrice" class="form-label">Min price</label>
        <input type="number" class="form-control" id="minPrice" name="minPrice" value="{{ $f_minPrice }}">
    </div>

    <div class="mb-3">
        <label for="maxPrice" class="form-label">Max price</label>
        <input type="number" class="form-control" id="maxPrice" name="maxPrice" value="{{ $f_maxPrice }}">
    </div>

    <div class="mb-3">
        <label for="sortBy" class="form-label">Sort By</label>
        <select class="form-select" id="sortBy" name="sortBy">
            <option value {{ is_null($f_sortBy) ? 'selected':'' }}>
                New to old
            </option>
            <option value="old-to-new" {{ 'old-to-new' == $f_sortBy ? 'selected':'' }}>
                Old to new
            </option>
        </select>
    </div>

    <div class="row g-1 g-sm-2">
        <div class="col">
            <button type="submit" class="btn btn-warning btn-sm w-100">Filter</button>
        </div>
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">Clear</a>
        </div>
    </div>
</form>