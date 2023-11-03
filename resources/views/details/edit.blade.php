@extends('layouts.app')
@section('title') Edit | Details | AutoService @endsection
@section('main')
    <div class="container-xl my-4">
        <div class="row justify-content-center g-3 g-sm-4">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <form action="{{ route('details.update', $obj->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="detail_category" class="form-label">Category</label>
                                <select class="form-select" id="detail_category" name="detail_category" required autofocus>
                                    @foreach($detail_categories as $detail_category)
                                        <option value="{{ $detail_category->id }}" {{ $detail_category->id == $obj->detail_category_id ? 'selected':'' }}>
                                            {{ $detail_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <select class="form-select" id="location" name="location" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $location->id == $obj->location_id ? 'selected':'' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $obj->name }}" required>
                                @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" min="0" step="0.1" class="form-control" id="price" name="price" value="{{ $obj->price }}" required>
                            </div>

                            <a href="{{ route('details.show', $obj->id) }}" class="btn btn-secondary btn-sm">Back</a>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection