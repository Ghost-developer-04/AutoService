<div class="col">
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="position-relative">
                <img src="{{ asset('img/worker.jpg') }}" alt="" class="img-fluid rounded pb-3">
            </div>
            <a href="{{ route('workers.show', $worker->id) }}" class="link-dark h6 text-decoration-none">
                {{ $worker->first_name }} {{ $worker->last_name }}
            </a>
            <div class="small">
                Location: <a href="{{ route('cars.index', ['location' => $worker->location->slug]) }}"
                   class="text-decoration-none">{{ $worker->location->name }}</a>
                <br>
                Service: <a href="{{ route('cars.index', ['service' => $worker->service->slug]) }}"
                     class="text-decoration-none py-3">{{ $worker->service->name }}</a>
                <div>
                    Phone: <span class='border-bottom border-2 border-warning text-danger'>+993{{ $worker->phone_number }}</span>
                </div>
            </div>
            <div>
                Experience: <span class="text-info fw-semibold">{{ $worker->experience }} <span class="small">years</span></span>
            </div>
        </div>
    </div>
</div>