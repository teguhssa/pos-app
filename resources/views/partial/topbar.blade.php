<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">myPOS</a>

        <div class="d-flex justify-content-center align-items-center">
            <h6 class="text-white mb-0 me-4">{{ Auth::user()->username }}</h6>
            <form action="/logout" method="post">
                @csrf
                <button class="nav-link text-white" style="background: none; border:none;" type="submit">
                    <span><i class="bi bi-box-arrow-in-right"></i> Keluar</span>
                </button>
              </form>
        </div>

    </div>
</nav>
