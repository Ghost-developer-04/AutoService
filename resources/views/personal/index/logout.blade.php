<li class="nav-item">
    <a class="nav-link link-primary" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
        Logout {{ auth()->user()['name'] }}
    </a>
    <form action="{{ route('logout') }}" method="post" id="logoutForm">
        @csrf
    </form>
</li>