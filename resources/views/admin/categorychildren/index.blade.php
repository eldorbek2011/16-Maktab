@extends('layouts.adminLayout')

@section('title', 'Admin - Category Children')

@section('content')
<div class="main-content px-4 py-4">
    <style>
        .main-content {
            margin-left: 250px;
            background: #f8f9fc;
            min-height: 100vh;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .btn {
            border-radius: 8px;
        }
        .btn-primary {
            background: #4e73df;
            border: none;
        }
        .btn-success {
            background: #1cc88a;
            border: none;
        }
        .btn-danger {
            background: #e74a3b;
            border: none;
        }
        .btn-primary:hover, .btn-success:hover, .btn-danger:hover {
            opacity: 0.9;
        }
        #flash-message {
            border-radius: 10px;
            text-align: center;
        }
    </style>

    {{-- Flash message --}}
    @if (session('success'))
        <div id="flash-message" class="alert alert-success shadow-sm fw-semibold">
            {{ session('success') }}
        </div>
    @endif

    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash-message');
            if (flash) flash.style.display = 'none';
        }, 3000);
    </script>

    {{-- Header & Create button --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary mb-0">Category Children List</h3>
        <a href="{{ route('admin.categorychildren.create') }}" class="btn btn-primary px-4">
            <i class="bx bx-plus me-1"></i> Create New
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card bg-white">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Name (UZ)</th>
                        <th>Name (RU)</th>
                        <th>Parent Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($childrens as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td class="fw-semibold">{{ $category->name_uz }}</td>
                            <td>{{ $category->name_ru }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $category->category->name_uz ?? '—' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.categorychildren.edit', $category->id) }}" 
                                       class="btn btn-success btn-sm px-3">
                                        <i class="bx bx-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.categorychildren.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Rostan ham o‘chirmoqchimisiz?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3">
                                            <i class="bx bx-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bx bx-folder-open fs-3 d-block mb-2"></i>
                                Hech qanday ma’lumot topilmadi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
