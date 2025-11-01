@extends('layouts.adminLayout')

@section('title', 'Admin - Show Category')

@section('content')
<div class="main-content px-4 py-4">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bx bx-category me-2"></i> Show Category</h5>
                <a href="{{ route('admin.category.index') }}" class="btn btn-light btn-sm">
                    <i class="bx bx-arrow-back me-1"></i> Back
                </a>
            </div>

            <div class="card-body bg-light">
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-semibold">Name (UZ)</label>
                    <input type="text" class="form-control" id="name_uz"
                           value="{{ $category->name_uz }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-semibold">Name (RU)</label>
                    <input type="text" class="form-control" id="name_ru"
                           value="{{ $category->name_ru }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="url" class="form-label fw-semibold">URL</label>
                    <input type="text" class="form-control" id="url"
                           value="{{ $category->url }}" readonly>
                </div>
            </div>

            <div class="card-footer text-center bg-white">
                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary me-2">
                    <i class="bx bx-edit"></i> Edit
                </a>
                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
                    <i class="bx bx-list-ul"></i> Back to List
                </a>
            </div>
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
    .form-control[readonly] {
        background-color: #f0f2f5;
        border: 1px solid #ced4da;
        cursor: not-allowed;
    }
</style>
@endsection
