@extends('layouts.adminLayout')

@section('title', 'Admin - Employee Categories')

@section('content')
<div class="main-content px-4 py-4">
    <section class="section">
        <div class="container-fluid">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bx bx-category me-2"></i> Employee Categories</h5>
                    <a href="{{ route('admin.empCategory.create') }}" class="btn btn-light btn-sm">
                        <i class="bx bx-plus me-1"></i> Create
                    </a>
                </div>

                <div class="card-body bg-light">
                    {{-- Flash message --}}
                    @if (session('success'))
                        <div id="flash-message" class="alert alert-success text-center fw-semibold">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="table-responsive mt-3">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="text-start">#</th>
                                    <th scope="col">Name (UZ)</th>
                                    <th scope="col">Name (RU)</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empCategorys as $empCategory)
                                    <tr class="border-bottom">
                                        <th scope="row" class="text-start">{{ $empCategory->id }}</th>
                                        <td>
                                            <span class="badge bg-success-subtle text-success fw-semibold px-3 py-2">
                                                {{ $empCategory->name_uz }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info-subtle text-info fw-semibold px-3 py-2">
                                                {{ $empCategory->name_ru }}
                                            </span>
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline-success btn-sm" 
                                               href="{{ route('admin.empCategory.show', $empCategory->id) }}">
                                                <i class="bx bx-show"></i>
                                            </a>

                                            <a class="btn btn-outline-primary btn-sm" 
                                               href="{{ route('admin.empCategory.edit', $empCategory->id) }}">
                                                <i class="bx bx-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.empCategory.destroy', $empCategory->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination agar kerak bo‘lsa --}}
                    {{-- <div class="mt-4">
                        {{ $empCategorys->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Auto-hide flash message --}}
<script>
    setTimeout(() => {
        const flash = document.getElementById('flash-message');
        if (flash) flash.style.display = 'none';
    }, 3000);
</script>

<style>
    .main-content {
        margin-left: 250px;
        background-color: #f8fafc;
        min-height: 100vh;
    }

    .btn-outline-success:hover {
        background-color: #16a34a;
        color: #fff;
    }

    .btn-outline-danger:hover {
        background-color: #dc2626;
        color: #fff;
    }

    .btn-outline-primary:hover {
        background-color: #2563eb;
        color: #fff;
    }

    .table-hover tbody tr:hover {
        background-color: #eef6ff;
    }
</style>
@endsection
