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
                <option value="{{ $location->slug }}" {{ $location->slug == $f_location ? 'selected':'' }}>
                    {{ $location->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="detail_category" class="form-label">Category</label>
        <select class="form-select" id="detail_category" name="detail_category">
            <option value selected>-</option>
            @foreach($detail_categories as $category)
                <option value="{{ $category->slug }}" {{ $category->slug == $f_detail_category ? 'selected':'' }}>
                    {{ $category->name }}
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
            <option value="low-to-high" {{ 'low-to-high' == $f_sortBy ? 'selected':'' }}>
                Low to high
            </option>
            <option value="high-to-low" {{ 'high-to-low' == $f_sortBy ? 'selected':'' }}>
                High to low
            </option>
        </select>
    </div>

    <div class="row g-1 g-sm-2">
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100">Filter</button>
        </div>
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">Clear</a>
        </div>
    </div>
</form>