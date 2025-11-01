@extends('layouts.adminLayout')

@section('title', 'Admin - Edit Employee Category')

@section('content')
<div class="main-content px-4 py-4">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bx bx-edit me-2"></i> Edit Employee Category</h5>
                <a href="{{ route('admin.empCategory.index') }}" class="btn btn-light btn-sm">
                    <i class="bx bx-arrow-back me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('admin.empCategory.update', $empCategory->id) }}" method="POST" class="p-3">
                @csrf
                @method('PUT')

                <div class="card-body bg-light">
                    {{-- Name (uz) --}}
                    <div class="mb-4">
                        <label for="name_uz" class="form-label fw-semibold">Name (UZ)</label>
                        <input type="text" 
                               class="form-control @error('name_uz') is-invalid @enderror" 
                               id="name_uz" 
                               name="name_uz" 
                               placeholder="Masalan: Rahbariyat" 
                               value="{{ old('name_uz', $empCategory->name_uz) }}">
                        @error('name_uz')
                        <div class="invalid-feedback d-block text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Name (ru) --}}
                    <div class="mb-4">
                        <label for="name_ru" class="form-label fw-semibold">Name (RU)</label>
                        <input type="text" 
                               class="form-control @error('name_ru') is-invalid @enderror" 
                               id="name_ru" 
                               name="name_ru" 
                               placeholder="Например: Руководство" 
                               value="{{ old('name_ru', $empCategory->name_ru) }}">
                        @error('name_ru')
                        <div class="invalid-feedback d-block text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-white text-end">
                    <button type="submit" class="btn btn-warning text-dark px-4">
                        <i class="bx bx-refresh me-1"></i> Update
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

    .btn-warning {
        background-color: #facc15;
        border: none;
    }

    .btn-warning:hover {
        background-color: #eab308;
    }
</style>
@endsection
