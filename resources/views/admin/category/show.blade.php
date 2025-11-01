@extends('layouts.adminLayout')

@section('title', 'Admin - Show Category')

@section('content')
<div class="col-md-8 offset-md-2 mt-4">

    <div class="card shadow-sm border-0">
        <h5 class="card-header bg-info text-white">Show Category</h5>

        <div class="card-body">
            {{-- Back button --}}
            <a href="{{ route('admin.category.index') }}" class="btn btn-success mb-3">
                ← Back
            </a>

            {{-- Name (uz) --}}
            <div class="mb-4">
                <label for="name_uz" class="form-label fw-semibold">Name (uz)</label>
                <input 
                    type="text" 
                    id="name_uz" 
                    class="form-control bg-light" 
                    value="{{ $category->name_uz }}" 
                    readonly
                >
            </div>

            {{-- Name (ru) --}}
            <div class="mb-4">
                <label for="name_ru" class="form-label fw-semibold">Name (ru)</label>
                <input 
                    type="text" 
                    id="name_ru" 
                    class="form-control bg-light" 
                    value="{{ $category->name_ru }}" 
                    readonly
                >
            </div>

            {{-- Info message --}}
            <div class="alert alert-secondary mt-3 mb-0">
                <i class="fas fa-info-circle"></i> This is a read-only view of the category.
            </div>
        </div>
    </div>
</div>
@endsection
