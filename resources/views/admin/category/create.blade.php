@extends('layouts.adminLayout')

@section('content')
<div class="container py-5">
    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bx bx-category-alt me-2"></i>Yangi Kategoriya Qo‘shish</h5>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-light btn-sm shadow-sm">
                        <i class="bx bx-arrow-back me-1"></i> Orqaga
                    </a>
                </div>

                <div class="card-body p-4">

                    <!-- Uzbek Name -->
                    <div class="mb-4">
                        <label for="name_uz" class="form-label fw-semibold">Kategoriya nomi (O‘zbekcha)</label>
                        <input 
                            type="text" 
                            class="form-control @error('name_uz') is-invalid @enderror" 
                            id="name_uz" 
                            name="name_uz" 
                            placeholder="Masalan: Fanlar" 
                            value="{{ old('name_uz') }}"
                        >
                        @error('name_uz')
                        <div class="invalid-feedback d-block">
                            <i class="bx bx-error-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Russian Name -->
                    <div class="mb-4">
                        <label for="name_ru" class="form-label fw-semibold">Kategoriya nomi (Ruscha)</label>
                        <input 
                            type="text" 
                            class="form-control @error('name_ru') is-invalid @enderror" 
                            id="name_ru" 
                            name="name_ru" 
                            placeholder="Например: Предметы" 
                            value="{{ old('name_ru') }}"
                        >
                        @error('name_ru')
                        <div class="invalid-feedback d-block">
                            <i class="bx bx-error-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">
                            <i class="bx bx-save me-1"></i> Saqlash
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .card-header {
        font-weight: 600;
        letter-spacing: 0.3px;
    }
    .form-label {
        color: #333;
    }
    input.form-control {
        border-radius: 0.5rem;
        padding: 0.6rem 1rem;
    }
    input.form-control:focus {
        border-color: #4a8efc;
        box-shadow: 0 0 0 0.15rem rgba(74, 142, 252, 0.25);
    }
    button.btn-primary:hover {
        background-color: #0d6efd;
        transform: translateY(-2px);
        transition: 0.2s;
    }
</style>
@endsection
