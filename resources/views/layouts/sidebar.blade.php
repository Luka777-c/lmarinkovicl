<nav class="sidebar" id="sidebar">
    <div class="logo text-center border-bottom border-white border-opacity-10 py-4 px-3">
        <h1 class="h4 mb-1 fw-bold">VINOTEKA</h1>
        <p class="mb-0 small opacity-75">Sistem za upravljanje proizvodnjom</p>
    </div>
    <div class="nav-menu py-3">
        <div class="nav-item mx-3 mb-1">
            <a href="{{ route('home') }}" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('admin') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                <span>Dashboard</span>
            </a>
        </div>
        <div class="nav-item mx-3 mb-1">
            <a href="/ture" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('ture') ? 'active' : '' }}">
                <i class="fas fa-wine-bottle me-2"></i>
                <span>Proizvodne ture</span>
            </a>
        </div>
        <div class="nav-item mx-3 mb-1">
            <a href="/zalihe" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('zalihe*') ? 'active' : '' }}">
                <i class="fas fa-boxes me-2"></i>
                <span>Zalihe</span>
            </a>
        </div>
        <div class="nav-item mx-3 mb-1">
            <a href="/oprema" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('oprema*') ? 'active' : '' }}">
                <i class="fas fa-cogs me-2"></i>
                <span>Oprema</span>
            </a>
        </div>
        <div class="nav-item mx-3 mb-1">
            <a href="{{ route('narudzbenice.index') }}" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('narudzbenice*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart me-2"></i>
                <span>Narudžbenice</span>
            </a>
        </div>
        <div class="nav-item mx-3 mb-1">
            <a href="{{ route('zadaci.index') }}" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('zadaci*') ? 'active' : '' }}">
                <i class="fas fa-tasks me-2"></i>
                <span>Zadaci</span>
            </a>
        </div>
        <div class="nav-item mx-3 mb-1">
            <a href="{{ route('kontakt.index') }}" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 {{ request()->is('kontakt*') ? 'active' : '' }}">
                <i class="fas fa-address-card me-2"></i>
                <span>Kontakt</span>
            </a>
        </div>
        
        <!-- Logout -->
        <div class="nav-item mx-3 mt-auto">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link d-flex align-items-center rounded-3 px-3 py-2 w-100 border-0 bg-transparent text-white">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span>Odjavi se</span>
                </button>
            </form>
        </div>
    </div>
</nav> 