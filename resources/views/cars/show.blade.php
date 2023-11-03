@extends('layouts.app')
@section('title') {{ $obj->name }} | Cars | AutoService @endsection
@section('main')
    <div class="container-xl my-4">
        <div class="row g-3 g-sm-4">
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="position-relative">
                            <img src="{{ asset('img/logo.jpg') }}" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="mb-1">
                            Name: {{ $obj->name }}
                        </div>
                        <div class="mb-1">
                            Location: <a href="{{ route('cars.index', ['location' => $obj->location->slug]) }}"
                                         class="text-decoration-none">{{ $obj->location->name }}</a>
                        </div>
                        <div class="mb-1">
                            Brand: <a href="{{ route('cars.index', ['car_brand' => $obj->car_brand->slug]) }}"
                                      class="text-decoration-none">{{ $obj->car_brand->name }}</a>
                        </div>
                        <div class="mb-1">
                            Serie: <a href="{{ route('cars.index', ['car_serie' => $obj->car_serie->slug]) }}"
                                      class="text-decoration-none">{{ $obj->car_serie->name }}</a>
                        </div>
                        <div class="mb-1">
                            Service: <a href="{{ route('cars.index', ['service' => $obj->service->slug]) }}"
                                        class="text-decoration-none">{{ $obj->service->name }}</a>
                        </div>
                        <div class="mb-1">
                            Worker: <a href="{{ route('cars.index', ['worker' => $obj->worker->slug]) }}"
                                       class="text-decoration-none">{{ $obj->worker->full_name }}</a>
                        </div>
                        <div class="mb-1">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque earum ea non, voluptatem eos
                            cumque animi dolorem possimus repellat ullam, asperiores voluptas mollitia ratione?
                            Reiciendis numquam, eligendi, deserunt architecto perferendis voluptatem nulla adipisci nisi
                            debitis dolorum magnam nostrum ea ipsum doloremque quas consequuntur possimus aliquam quidem
                            inventore. Quaerat, commodi deserunt.
                        </div>
                        <div>
                            Arrived: <span class="text-danger fw-semibold">{{ $obj->arrival_date }}</span>
                        </div>
                        @if($obj->isReady == True)
                            <div>
                                Departure: <span class="text-success fw-semibold">{{ $obj->departure_date }}</span>
                            </div>
                        @else
                            <div class="text-primary">
                                In Service
                            </div>
                        @endif
                        <div class="mb-1">
                            Cost: <span class="text-danger fw-semibold"> {{ $obj->price }} <span class="small">TMT</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('cars.show.location')
    @include('cars.show.service')
    @include('cars.show.worker')
@endsection