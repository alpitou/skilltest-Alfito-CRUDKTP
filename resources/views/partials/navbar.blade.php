<nav class="navbar navbar-expand-lg" style="background-color: #000 ;">
    <div class="container">
    <a class="navbar-brand text-light" href="/home">
    <i class="fas fa-home"></i> <!-- Icon Home -->
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1 text-light {{ $active == 'home' ? 'active-link' : ''}}" href="/home">DATA KTP</a>
                </li>
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1 text-light {{ $active == 'tambah' ? 'active-link' : '';}}" href="/create">TAMBAH</a>
                </li>
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1 text-light {{ $active == 'activity' ? 'active-link' : ''}}" href="/activity">AKTIVITAS</a>
                </li>
                <li class="nav-item">
                    <a class="fs-6 nav-link mx-1 text-light {{ $active == 'import' ? 'active-link' : ''}}" href="/import">IMPORT</a>
                </li>
                @endif
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn my-btn mx-1 px-3 rounded-pill" style="width: 100%;">LOGOUT</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>