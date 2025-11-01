@extends('layouts.adminLayout')

@section('title', 'Admin - Create Employee Category')

@section('content')
<div class="main-content px-4 py-4">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bx bx-category me-2"></i> Create Employee Category</h5>
                <a href="{{ route('admin.empCategory.index') }}" class="btn btn-light btn-sm">
                    <i class="bx bx-arrow-back me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('admin.empCategory.store') }}" method="POST" class="p-3">
                @csrf
                <div class="card-body bg-light">
                    <div class="mb-4">
                        <label for="name_uz" class="form-label fw-semibold">Name (UZ)</label>
                        <input type="text" 
                               class="form-control @error('name_uz') is-invalid @enderror" 
                               id="name_uz" 
                               name="name_uz" 
                               placeholder="Masalan: O‘qituvchilar" 
                               value="{{ old('name_uz') }}">
                        @error('name_uz')
                        <div class="invalid-feedback d-block text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label fw-semibold">Name (RU)</label>
                        <input type="text" 
                               class="form-control @error('name_ru') is-invalid @enderror" 
                               id="name_ru" 
                               name="name_ru" 
                               placeholder="Например: Учителя" 
                               value="{{ old('name_ru') }}">
                        @error('name_ru')
                        <div class="invalid-feedback d-block text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-white text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bx bx-save me-1"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .main-content {
        margin-left: 250px;
        padding: 20px;
        background-color: #f8f9fc;
        min-height: 100vh;
    }

    .form-label {
        color: #1e293b;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    .btn-primary {
        background-color: #2563eb;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }
</style>
@endsection
