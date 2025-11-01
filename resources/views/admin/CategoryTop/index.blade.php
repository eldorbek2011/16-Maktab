@extends('layouts.adminLayout')

@section('title', 'Admin - Category Top')

@section('content')
<div class="main-content px-4 py-4">
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                        background-color: #f8f9fc;
                        min-height: 100vh;
                    }
                    .card {
                        border-radius: 14px;
                        overflow: hidden;
                        border: none;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
                    }
                    table {
                        border-collapse: separate;
                        border-spacing: 0 10px;
                    }
                    thead {
                        background-color: #4e73df;
                        color: white;
                    }
                    thead th {
                        border: none;
                        text-align: center;
                        vertical-align: middle;
                        font-weight: 600;
                        padding: 14px;
                    }
                    tbody tr {
                        background: white;
                        border-radius: 10px;
                        transition: 0.2s ease;
                    }
                    tbody tr:hover {
                        background-color: #f1f3f9;
                        transform: scale(1.01);
                    }
                    td, th {
                        text-align: center;
                        vertical-align: middle;
                    }
                    .btn {
                        border-radius: 8px;
                        margin: 0 3px;
                    }
                    .btn-danger {
                        background: #e74a3b;
                        border: none;
                    }
                    .btn-success {
                        background: #1cc88a;
                        border: none;
                    }
                    .btn-primary {
                        background: #4e73df;
                        border: none;
                    }
                    #flash-message {
                        position: relative;
                        padding: 10px 20px;
                        border-radius: 8px;
                        font-weight: 500;
                        margin-bottom: 15px;
                    }
                </style>

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        const flash = document.getElementById('flash-message');
                        if (flash) {
                            flash.style.transition = 'opacity 0.5s';
                            flash.style.opacity = '0';
                            setTimeout(() => flash.style.display = 'none', 500);
                        }
                    }, 3000);
                </script>

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold text-primary mb-0">
                        <i class="bx bx-category me-2"></i> Category Top List
                    </h4>
                    <a href="{{ route('admin.CategoryTop.create') }}" class="btn btn-primary px-3">
                        <i class="bx bx-plus me-1"></i> Create New
                    </a>
                </div>

                {{-- Table --}}
                <div class="card p-3">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name (UZ)</th>
                                <th>Name (RU)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categoryTop as $categorytop)
                                <tr>
                                    <th scope="row">{{ $categorytop->id }}</th>
                                    <td>{{ $categorytop->name_uz }}</td>
                                    <td>{{ $categorytop->name_ru }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="btn btn-success btn-sm" href="{{ route('admin.CategoryTop.show', $categorytop->id) }}">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.CategoryTop.edit', $categorytop->id) }}">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.CategoryTop.destroy', $categorytop->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?')">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted py-4">
                                        No categories found 🙁
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
