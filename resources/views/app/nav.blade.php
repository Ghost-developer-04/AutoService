<div class="container-xl g-0">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-car-front-fill text-info"></i>
                <span class="text-warning">SM-AutoService</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-md-flex ms-auto">
                    <div class="nav-item mb-3 mb-md-0 me-md-3">
                        <a class="text-warning fw-semibold text-decoration-none" aria-current="page" href="#">About us</a>
                    </div>
                    <div class="nav-item dropdown mb-3 mb-md-0 me-md-3">
                        <a class="text-warning fw-semibold text-decoration-none dropdown-toggle" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            @foreach($services as $service)
                                <li><a class="dropdown-item text-info" href="#">{{ $service->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="nav-item dropdown mb-3 mb-md-0 me-md-3">
                        <a class="text-warning fw-semibold text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Details
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            @foreach($detail_categories as $detail_category)
                                <li><a class="dropdown-item text-info" href="#">{{ $detail_category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="text-warning fw-semibold text-decoration-none me-1">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="bi bi-person-add me-1"></i>login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>