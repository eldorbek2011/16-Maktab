@extends('layouts.adminLayout')

@section('content')
<div class="col-md-8 offset-md-2">
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow-sm border-0 mt-4">
            <h5 class="card-header bg-primary text-white">Edit Category</h5>

            <div class="card-body">
                <a href="{{ route('admin.category.index') }}" class="btn btn-success mb-3">← Back</a>

                {{-- Name (Uz) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-semibold">Name (uz)</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_uz') is-invalid @enderror" 
                        id="name_uz" 
                        name="name_uz" 
                        placeholder="Enter category name in Uzbek..." 
                        value="{{ old('name_uz', $category->name_uz) }}"
                    >
                    @error('name_uz')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (Ru) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-semibold">Name (ru)</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_ru') is-invalid @enderror" 
                        id="name_ru" 
                        name="name_ru" 
                        placeholder="Enter category name in Russian..." 
                        value="{{ old('name_ru', $category->name_ru) }}"
                    >
                    @error('name_ru')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
