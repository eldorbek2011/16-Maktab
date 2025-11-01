@extends('layouts.adminLayout')
@section('title', 'Admin - Show Schedule')

@section('content')
<div class="container mt-5" style="max-width: 720px;">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="mb-0">👁️ Dars jadvali ma'lumotlari</h5>
            <a href="{{ route('admin.schedule.index') }}" class="btn btn-light btn-sm">Orqaga</a>
        </div>

        <div class="card-body p-4">
            <div class="mb-4">
                <label class="form-label fw-bold">ID</label>
                <p class="form-control">{{ $schedule->id }}</p>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Smena</label>
                <p class="form-control">{{ $schedule->smena?->name_uz ?? '-' }}</p>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Sinf</label>
                <p class="form-control">{{ $schedule->classModel?->name_uz ?? '-' }}</p>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Xona</label>
                <p class="form-control">{{ $schedule->room ?? '-' }}</p>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Vaqt</label>
                <p class="form-control">{{ $schedule->time ?? '-' }}</p>
            </div>

            @if($schedule->pdf_file)
            <div class="mb-4">
                <label class="form-label fw-bold">PDF Fayl</label>
                <div>
                    <a href="{{ asset('admin/pdfs/'.$schedule->pdf_file) }}" target="_blank" class="btn btn-info">
                        <i class="bx bx-file"></i> PDF ni ko'rish
                    </a>
                    <span class="ms-2">{{ $schedule->pdf_file }}</span>
                </div>
            </div>
            @endif

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('admin.schedule.edit', $schedule->id) }}" class="btn btn-primary btn-lg px-5">✏️ Tahrirlash</a>
                <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary btn-lg px-5">Orqaga</a>
            </div>
        </div>
    </div>
</div>
@endsection

