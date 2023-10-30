@extends('layouts.app')
@section('title') {{ $obj->full_name }} | Products | PC @endsection
@section('main')
    <div class="container-xl my-4">
        <div class="row g-3 g-sm-4">
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="position-relative">
                            <img src="{{ asset('img/worker.jpg') }}" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="mb-1">
                            Name: {{ $obj->full_name }}
                        </div>
                        <div class="mb-1">
                            Location: <a href="{{ route('workers.index', ['location' => $obj->location->slug]) }}"
                                         class="text-decoration-none">{{ $obj->location->name }}</a>
                        </div>
                        <div class="mb-1">
                            Service: <a href="{{ route('workers.index', ['service' => $obj->service->slug]) }}"
                                        class="text-decoration-none">{{ $obj->service->name }}</a>
                        </div>
                        <div class="mb-1">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque earum ea non, voluptatem eos
                            cumque animi dolorem possimus repellat ullam, asperiores voluptas mollitia ratione?
                            Reiciendis numquam, eligendi, deserunt architecto perferendis voluptatem nulla adipisci nisi
                            debitis dolorum magnam nostrum ea ipsum doloremque quas consequuntur possimus aliquam quidem
                            inventore. Quaerat, commodi deserunt.
                        </div>
                        <div class="mb-1">
                            Experience: <span class="text-danger fw-semibold"> {{ $obj->experience }} <span class="small">years</span></span>
                        </div>
                        <div class="mb-1">
                            Applied for a job: <span class="text-primary fw-semibold"> {{ $obj->applied_for_job }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection