@extends('layouts.adminLayout')

@section('content')
<div class="layout-page">

  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached bg-navbar-theme shadow-sm rounded-bottom-3 px-3 py-2" id="layout-navbar">
    <div class="d-flex align-items-center w-100 justify-content-between">

      <!-- Toggle -->
      <div class="layout-menu-toggle me-3 d-xl-none">
        <a class="nav-item nav-link px-0 text-primary" href="javascript:void(0)">
          <i class="bx bx-menu icon-md fs-3"></i>
        </a>
      </div>

      <!-- Search -->
      <div class="navbar-nav align-items-center flex-grow-1">
        <div class="nav-item d-flex align-items-center bg-light rounded-3 px-3 py-1 shadow-sm w-100" style="max-width: 300px;">
          <i class="bx bx-search text-secondary me-2 fs-5"></i>
          <input type="text" class="form-control border-0 shadow-none bg-transparent" placeholder="Qidirish..." aria-label="Qidirish..." />
        </div>
      </div>

      <!-- User menu -->
      <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" class="rounded-circle me-2" width="40" height="40">
            <span class="fw-semibold text-dark d-none d-md-inline">Direktor</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm">
            <li class="px-3 py-2">
              <div class="d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" class="rounded-circle me-2" width="40" height="40">
                <div>
                  <h6 class="mb-0">Shamshod Soliboyev</h6>
                  <small class="text-muted">Maktab direktori</small>
                </div>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>Profil</a></li>
            <li><a class="dropdown-item" href="#"><i class="bx bx-cog me-2"></i>Sozlamalar</a></li>
            <li><a class="dropdown-item" href="#"><i class="bx bx-book me-2"></i>Dars jadvali</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">@csrf
                <button type="submit" class="dropdown-item text-danger"><i class="bx bx-power-off me-2"></i>Chiqish</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navbar -->

  <!-- Content -->
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

      <!-- Welcome Card -->
      <div class="card border-0 shadow-lg mb-5">
        <div class="row g-0 align-items-center">
          <div class="col-md-7 p-4">
            <h4 class="text-primary fw-bold mb-2">🏫 16-MAKTABGA XUSH KELIBSIZ!</h4>
            <p class="text-muted mb-4">
              Bugun maktabimizda <strong>yangi o‘quv yili</strong> muvaffaqiyatli boshlandi. 
              O‘quvchilarimiz bilim, sport va ijod sohalarida faol ishtirok etmoqdalar.
            </p>
            <a href="#" class="btn btn-primary btn-sm px-4">Batafsil ma’lumot</a>
          </div>
          <div class="col-md-5 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/5850/5850276.png" class="img-fluid" alt="School Image" style="max-height: 180px;">
          </div>
        </div>
      </div>

      <!-- Small Stat Cards -->
      <div class="row g-4">

        <div class="col-md-6 col-lg-3">
          <div class="card border-0 shadow-sm h-100 hover-shadow">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2921/2921822.png" width="36" alt="Students">
                <i class="bx bx-dots-vertical-rounded text-muted"></i>
              </div>
              <p class="text-muted mb-1">O‘quvchilar</p>
              <h4 class="fw-semibold">860 nafar</h4>
              <span class="text-success small"><i class="bx bx-up-arrow-alt"></i> +12 yangi</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card border-0 shadow-sm h-100 hover-shadow">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" width="36" alt="Teachers">
                <i class="bx bx-dots-vertical-rounded text-muted"></i>
              </div>
              <p class="text-muted mb-1">O‘qituvchilar</p>
              <h4 class="fw-semibold">48 nafar</h4>
              <span class="text-success small"><i class="bx bx-up-arrow-alt"></i> +2 yangi</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card border-0 shadow-sm h-100 hover-shadow">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/201/201818.png" width="36" alt="Subjects">
                <i class="bx bx-dots-vertical-rounded text-muted"></i>
              </div>
              <p class="text-muted mb-1">Fanlar</p>
              <h4 class="fw-semibold">14 ta</h4>
              <span class="text-info small"><i class="bx bx-book-open"></i> yangilangan dastur</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card border-0 shadow-sm h-100 hover-shadow">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" width="36" alt="Events">
                <i class="bx bx-dots-vertical-rounded text-muted"></i>
              </div>
              <p class="text-muted mb-1">Tadbirlar</p>
              <h4 class="fw-semibold">6 ta</h4>
              <span class="text-warning small"><i class="bx bx-calendar-event"></i> yaqin tadbirlar</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<style>
  .hover-shadow:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
  }
</style>
@endsection
