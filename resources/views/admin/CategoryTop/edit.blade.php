@extends('layouts.adminLayout')

@section('title', 'Admin - Edit Top Category')

@section('content')
<div class="col-md-8 offset-md-2 mt-4">
    <form action="{{ route('admin.CategoryTop.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow-lg border-0 rounded-3">
            <h5 class="card-header bg-warning text-white fw-semibold py-3">
                <i class="bx bx-edit-alt me-1"></i> Edit Top Category
            </h5>

            <div class="card-body">
                <a href="{{ route('admin.category.index') }}" class="btn btn-success mb-3">
                    ← Back
                </a>

                {{-- Name (uz) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-semibold">Name (UZ)</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_uz') is-invalid @enderror" 
                        id="name_uz" 
                        name="name_uz" 
                        value="{{ $category->name_uz }}" 
                        placeholder="Masalan: Maktablar haqida"
                    >
                    @error('name_uz')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (ru) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-semibold">Name (RU)</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_ru') is-invalid @enderror" 
                        id="name_ru" 
                        name="name_ru" 
                        value="{{ $category->name_ru }}" 
                        placeholder="Например: О школах"
                    >
                    @error('name_ru')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- URL --}}
                <div class="mb-4">
                    <label for="url" class="form-label fw-semibold">URL</label>
                    <input 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror" 
                        id="url" 
                        name="url" 
                        value="{{ $category->url }}" 
                        placeholder="/example-url"
                    >
                    @error('url')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="text-end">
                    <button class="btn btn-warning text-white px-4 py-2">
                        <i class="bx bx-save me-1"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .card {
        border-radius: 14px !important;
        overflow: hidden;
    }
    .form-label {
        color: #34495e;
    }
    .form-control {
        border-radius: 10px;
        box-shadow: none !important;
    }
    .btn {
        border-radius: 8px;
        transition: 0.2s ease-in-out;
    }
    .btn-success {
        background: #1cc88a;
        border: none;
    }
    .btn-success:hover {
        opacity: 0.9;
    }
    .btn-warning {
        background: #f6c23e;
        border: none;
    }
    .btn-warning:hover {
        opacity: 0.9;
    }
</style>
@endsection
