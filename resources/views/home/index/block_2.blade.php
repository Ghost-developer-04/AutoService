<div class="container-xl g-0">
    <div class="bg-image-2 g-0">
        <div class="bg-dark bg-opacity-75 pt-5">
            <div class="h3 fw-bold text-center text-danger text-uppercase">
                What brand is your car?
            </div>
            <div class="h3 fw-bold text-center text-info text-uppercase">
                no matter. We can serve it!
            </div>

            <div class="row row-cols-1 row-cols-md-2 pt-3 g-0">
                @foreach($car_brands as $car_brand)
                    <div class="col py-3 ps-3">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-2">
                                <img src="{{ asset('img/'.$car_brand->image_1) }}" alt="brand-logo" class="img-fluid">
                            </div>
                            <div class="col-10">
                                <div class="h5 text-danger fw-bold">
                                    {{ $car_brand->name }}
                                </div>
                                <div class="h6 fw-bold text-info">
                                    We have served {{ $car_brand->cars_count }}+ {{ $car_brand->name }} cars
                                </div>
                                <a href="{{ route('cars.index', ['car_brands' => $car_brand->slug]) }}"
                                   class="text-warning
                                text-decoration-none
                                border-bottom
                                border-2
                                border-warning">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>