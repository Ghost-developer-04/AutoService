<div class="col">
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="position-relative">
                <img src="{{ asset('img/logo2.jpg') }}" alt="" class="img-fluid rounded">
            </div>
            <a href="{{ route('cars.show', $car->id) }}" class="link-dark h6 text-decoration-none">
                {{ $car->name }}
            </a>
            <div class="small">
                <a href="{{ route('cars.index', ['location' => $car->location->slug]) }}"
                   class="text-decoration-none">{{ $car->location->name }}</a>
                ∙ <a href="{{ route('cars.index', ['car_brand' => $car->car_brand->slug]) }}"
                     class="text-decoration-none">{{ $car->car_brand->name }}</a>
                ∙ <a href="{{ route('cars.index', ['car_serie' => $car->car_serie->slug]) }}"
                     class="text-decoration-none">{{ $car->car_serie->name }}</a>
            </div>
            <div class="text-danger">
                {{ $car->service->price }} <span class="small">TMT</span>
            </div>
            <a class="text-warning text-decoration-none" href="{{ route('cars.index', ['service' => $car->service->slug]) }}">
                {{ $car->service->name }}
            </a>
        </div>
    </div>
</div>