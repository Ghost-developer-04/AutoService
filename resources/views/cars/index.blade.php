@extends('layouts.app')
@section('title') Cars | AutoService @endsection
@section('main')
    <div class="container-xl my-4">
        <div class="h4 text-primary mb-3">Cars</div>
        <div class="row">
            <div class="col-md-4 col-lg-3 col-xl-2">
                @include('app.filter')
            </div>
            <div class="col">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-2 g-sm-3">
                    @foreach($cars as $car)
                        @include('app.car')
                    @endforeach
                </div>
                <div class="my-3">
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection