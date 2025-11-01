@extends('layouts.adminLayout')
@section('title', 'Admin - Create SmenaType')

@section('content')
<div class="col-md-6 offset-md-3 mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">➕ Yangi SmenaType yaratish</h6>
            <a href="{{ route('admin.smenatype.index') }}" class="btn btn-sm btn-success">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.smenatype.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name_uz" class="form-label fw-bold">Name (UZ)</label>
                    <input type="text" class="form-control @error('name_uz') is-invalid @enderror" id="name_uz" name="name_uz" placeholder="Masalan: 1-smena" value="{{ old('name_uz') }}" required>
                    @error('name_uz')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name_ru" class="form-label fw-bold">Name (RU)</label>
                    <input type="text" class="form-control @error('name_ru') is-invalid @enderror" id="name_ru" name="name_ru" placeholder="Например: 1-смена" value="{{ old('name_ru') }}" required>
                    @error('name_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">💾 Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
