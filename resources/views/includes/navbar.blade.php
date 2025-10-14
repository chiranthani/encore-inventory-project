<div class="topbar position-fixed top-0 start-0 end-0 bg-white border-bottom"
  style="height: 56px; z-index: 1020;">
  <div class="d-flex align-items-center justify-content-between h-100 px-3">

    <div class="d-lg-none position-absolute start-0 top-50 translate-middle-y ps-3">
      <label for="sidebar-toggle" class="btn btn-sm mb-0">
        <i class="bi bi-list fs-4"></i>
      </label>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle text-center">
      <h5 class="mb-0 fw-bold">
        @yield('title', 'Dashboard')
      </h5>
    </div>

    <div class="d-flex align-items-center gap-3 position-absolute end-0 top-50 translate-middle-y pe-3">
      <div class="position-relative">
        <i class="bi bi-bell fs-5"></i>
        <span class="badge bg-danger rounded-pill px-1 position-absolute top-0 start-100 translate-middle"
          style="font-size: 0.6rem;">12</span>
      </div>

      <div class="d-flex align-items-center">
        <i class="bi bi-person-circle fs-4 me-1"></i>
        <span class="d-none d-sm-inline">User Name</span>
      </div>
    </div>

  </div>
</div>