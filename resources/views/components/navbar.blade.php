<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6495ED;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('jadwal.index') }}">
            🚤 Speedboat
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
