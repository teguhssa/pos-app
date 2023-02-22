<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        CORE
                    </div>
                </li>
                <li>
                    <a href="/dashboard" class="nav-link px-3 {{ request()->is('dashboard') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Menu
                    </div>
                </li>
                <li>
                    <a href="/barangs" class="nav-link px-3 {{ request()->is('barangs') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-inboxes"></i></span>
                        <span>Semua Barang</span>
                    </a>
                </li>
                <li>
                    <a href="/stock-in"
                        class="nav-link px-3 {{ request()->is('stock-in') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-box-arrow-in-down"></i></span>
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="/units" class="nav-link px-3 {{ request()->is('units') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-rulers"></i></span>
                        <span>Unit</span>
                    </a>
                </li>
                <li>
                    <a href="/suplayers" class="nav-link px-3 {{ request()->is('suplayers') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-people-fill"></i></span>
                        <span>Suplayer</span>
                    </a>
                </li>
                <li>
                    <a href="/categories" class="nav-link px-3 {{ request()->is('categories') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-list-task"></i></span>
                        <span>Kategori Barang</span>
                    </a>
                </li>
                <li>
                    <a href="/pembayaran" class="nav-link px-3 {{ request()->is('pembayaran') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-cash"></i></span>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="/riwayat-penjualan"
                        class="nav-link px-3 {{ request()->is('riwayat-penjualan') ? 'active' : '' }}">
                        <span class="me-2"><i class="bi bi-clipboard"></i></span>
                        <span>Riwayat Penjualan</span>
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li>
                        <a href="/users" class="nav-link px-3 {{ request()->is('users') ? 'active' : '' }}">
                            <span class="me-2"><i class="bi bi-person-fill"></i></span>
                            <span>Kelola User</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
