@extends('layouts.adminLayout')

@section('title', 'Admin - Show Class')

@section('content')
<div class="container mt-5" style="max-width: 720px;">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="mb-0">👁️ Sinf ma'lumotlari</h5>
            <a href="{{ route('admin.class.index') }}" class="btn btn-light btn-sm">Orqaga</a>
        </div>

        <div class="card-body p-4">
            <div class="mb-4">
                <label class="form-label fw-bold">ID</label>
                <p class="form-control">{{ $class->id }}</p>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Nomi (UZ)</label>
                <p class="form-control">{{ $class->name_uz }}</p>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Nomi (RU)</label>
                <p class="form-control">{{ $class->name_ru }}</p>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('admin.class.edit', $class->id) }}" class="btn btn-primary btn-lg px-5">✏️ Tahrirlash</a>
                <a href="{{ route('admin.class.index') }}" class="btn btn-secondary btn-lg px-5">Orqaga</a>
            </div>
        </div>
    </div>
</div>
@endsection

