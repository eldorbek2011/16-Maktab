@extends('layouts.adminLayout')

@section('title', 'Admin - Create Category Children')

@section('content')
<div class="col-md-8 offset-md-2 mt-4">
    <form action="{{ route('admin.categorychildren.store') }}" method="POST">
        @csrf

        <div class="card shadow-sm border-0">
            <h5 class="card-header bg-primary text-white">Create Category Children</h5>

            <div class="card-body">
                <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-success mb-3">
                    ← Back
                </a>

                {{-- Name (uz) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-semibold">Name (uz)</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_uz') is-invalid @enderror" 
                        id="name_uz" 
                        placeholder="Kategoriya nomi (uz)..." 
                        name="name_uz" 
                        value="{{ old('name_uz') }}"
                    >
                    @error('name_uz')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category tanlash --}}
                <div class="mb-4">
                    <label for="category_id" class="form-label fw-semibold">Parent Category</label>
                    <select 
                        class="form-select @error('category_id') is-invalid @enderror" 
                        name="category_id" 
                        id="category_id"
                    >
                        <option value="" disabled selected>-- Kategoriya tanlang --</option>
                        @foreach($category as $categor)
                            <option value="{{ $categor->id }}" {{ old('category_id') == $categor->id ? 'selected' : '' }}>
                                {{ $categor->name_uz }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (ru) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-semibold">Name (ru)</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_ru') is-invalid @enderror" 
                        id="name_ru" 
                        placeholder="Kategoriya nomi (ru)..." 
                        name="name_ru" 
                        value="{{ old('name_ru') }}"
                    >
                    @error('name_ru')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- URL --}}
                <div class="mb-4">
                    <label for="url" class="form-label fw-semibold">URL</label>
                    <input 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror" 
                        id="url" 
                        placeholder="Masalan: /about-us" 
                        name="url" 
                        value="{{ old('url') }}"
                    >
                    @error('url')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="text-end">
                    <button class="btn btn-primary px-4" type="submit">
                        <i class="bx bx-save me-1"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
