<div class="container-xl">
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                SM-Autoservice
            </a>
            <div class="d-flex">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($services as $service)
                            <li><a class="dropdown-item" href="#">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($details as $detail)
                            <li><a class="dropdown-item" href="#">{{ $detail->detail_category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-person-add">login</i></a>
                </li>
            </div>
        </div>
    </nav>
</div>