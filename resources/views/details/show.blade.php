@extends('layouts.app')
@section('title') {{ $obj->name }} | Details | AutoService @endsection
@section('main')
    <div class="container-xl my-4">
        <div class="row g-3 g-sm-4">
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="position-relative">
                            <img src="{{ asset('img/logo2.jpg') }}" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between">
                            <div class="h4">{{ $obj->name }}</div>
                            <div>
                                @include('details.show.actions')
                            </div>
                        </div>
                        <div class="mb-1">
                            Location: <a href="{{ route('details.index', ['location' => $obj->location->slug]) }}"
                                         class="text-decoration-none">{{ $obj->location->name }}</a>
                        </div>
                        <div class="mb-1">
                            Category: <a
                                    href="{{ route('details.index', ['detail_category' => $obj->detail_category->slug]) }}"
                                    class="text-decoration-none">{{ $obj->detail_category->name }}</a>
                        </div>
                        <div class="mb-1">
                            Viewed: {{ $obj->viewed }}
                        </div>
                        <div class="mb-1">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque earum ea non, voluptatem eos
                            cumque animi dolorem possimus repellat ullam, asperiores voluptas mollitia ratione?
                            Reiciendis numquam, eligendi, deserunt architecto perferendis voluptatem nulla adipisci nisi
                            debitis dolorum magnam nostrum ea ipsum doloremque quas consequuntur possimus aliquam quidem
                            inventore. Quaerat, commodi deserunt.
                        </div>
                        <div class="mb-1">
                            Cost: <span class="text-danger fw-semibold"> {{ $obj->price }} <span
                                        class="small">TMT</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('details.show.location')
    @include('details.show.category')
@endsection