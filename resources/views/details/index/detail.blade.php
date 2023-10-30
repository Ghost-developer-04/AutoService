<div class="col">
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="position-relative">
                <img src="{{ asset('img/oil_filter.jpg') }}" alt="" class="img-fluid rounded">
            </div>
            <a href="{{ route('details.show', $detail->id) }}" class="link-dark h6 text-decoration-none">
                {{ $detail->name }}
            </a>
            <div class="h5 text-primary">
                {{ number_format($detail->price, 2, '.', ' ') }}
                <small>TMT</small>
            </div>
            <div class="small">
                <a href="{{ route('details.index', ['detail_category' => $detail->detail_category->slug]) }}"
                   class="text-decoration-none">{{ $detail->detail_category->name }}</a>
                ∙ <a href="{{ route('details.index', ['location' => $detail->location->slug]) }}"
                     class="text-decoration-none">{{ $detail->location->name }}</a>
            </div>
        </div>
    </div>
</div>