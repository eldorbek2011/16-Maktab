<div class="main-content d-flex">
    <!-- Sidebar -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-light border-end"
           style="width: 250px; height: 100vh; position: fixed; overflow-y: auto;">
        <div class="app-brand demo p-3 text-center border-bottom">
            <a href="{{ url('/') }}" class="app-brand-link text-decoration-none d-flex justify-content-center align-items-center">
                <span class="fw-bold fs-5 text-primary">Maktab</span>
            </a>
        </div>

        <div class="menu-divider mt-0"></div>
        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner nav flex-column pt-2">
            <!-- Dashboard -->
            <li class="menu-item active">
                <a href="{{ url('/admin/dashboard') }}" class="menu-link d-flex align-items-center text-dark mb-1 px-3 py-2 rounded">
                    <i class="bx bx-home-smile me-2"></i> <span>Admin Panel</span>
                </a>
            </li>

            <!-- Menu Items -->
            <li class="menu-item">
                <a href="{{ route('admin.category.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-grid-alt me-2"></i> Kategoriyalar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.employee.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-user me-2"></i> Xodimlar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.position.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-briefcase me-2"></i> Lavozimlar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.empCategory.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-category me-2"></i> Xodim Kategoriyalari
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.CategoryTop.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-star me-2"></i> Yuqori Kategoriyalar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.posts.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-news me-2"></i> Maqolalar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.statictik.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-bar-chart-alt-2 me-2"></i> Statistika
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-image me-2"></i> Galeriya
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.infografika.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-pie-chart-alt me-2"></i> Infografika
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.smenatype.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-time me-2"></i> Smena Turlari
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.class.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-group me-2"></i> Sinflar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.schedule.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-calendar me-2"></i> Dars Jadvali
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.usefulResource.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-bookmark me-2"></i> Foydali Resurslar
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.categorychildren.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-dice-1 me-2"></i> Bolalar Kategoriyalari
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.HomePageImageTag.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-image-alt me-2"></i> Bosh Sahifa Rasmlari
                </a>
            </li>
        </ul>
    </aside>

    <!-- Content -->
    <section class="section ms-250 flex-grow-1" style="margin-left: 250px; padding: 20px;">
        <!-- Content bo'sh qoldirildi -->
    </section>
</div>

<style>
    /* Sidebar hover va active effekt */
    .menu-link {
        transition: all 0.2s ease;
    }
    .menu-link:hover {
        background-color: #e7f1ff;
        color: #0d6efd;
    }
    .menu-item.active .menu-link {
        background-color: #0d6efd;
        color: #fff;
    }
</style>
