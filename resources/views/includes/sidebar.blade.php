<aside class="sidebar position-fixed d-lg-block"
    style="width: var(--sidebar-width); height: 100vh; background: var(--sidebar-bg); color: white; top: 0; left: 0; z-index: 1040; padding-top: 1rem;">


    <div class="d-flex justify-content-between align-items-center px-1 mb-3 d-lg-none">

        <img src="{{asset('images/logo_encore.png')}}" />

        <label for="sidebar-toggle" class="btn btn-sm btn-drak text-light m-0 p-1">
            <i class="bi bi-x-lg"></i>
        </label>
    </div>


    <div class="logo px-3 fw-bold mb-3 d-none d-lg-block">
        <img src="{{asset('images/logo_encore.png')}}" />
    </div>

    <nav class="nav flex-column">
        <a href="#" class="nav-link text-white-50">
            <i class="bi bi-file-bar-graph me-2"></i> Dashboard
        </a>
        <a href="#" class="nav-link text-white-50">
            <i class="bi bi-clipboard me-2"></i> Orders
        </a>
        <a href="#" class="nav-link text-white-50 {{ request()->is('/') ? 'active' : '' }}">
            <i class="bi bi-box-seam me-2"></i> Inventory
        </a>
        <a href="#" class="nav-link text-white-50">
            <i class="bi bi-credit-card me-2"></i> Payments
        </a>
        <a href="#" class="nav-link text-white-50">
            <i class="bi bi-people me-2"></i> Customers
        </a>
        <a href="#" class="nav-link text-white-50">
            <i class="bi bi-bar-chart me-2"></i> Reports
        </a>
        <a href="#" class="nav-link text-white-50">
            <i class="bi bi-gear me-2"></i> Settings
        </a>
    </nav>
</aside>

<style>
    /* menu custom active style */
    .nav-link {
        position: relative;
        padding-left: 1.5rem;
    }

    .nav-link.active {
        color: white !important;
    }

    .nav-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background-color: white;
        border-radius: 0 2px 2px 0;
    }
</style>