@extends('layouts.adminLayout')

@section('title', 'Admin - Create Lesson')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                </style>

                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Fan yaratish</h5>
                        <a href="{{ route('admin.lesson.index') }}" class="btn btn-success btn-sm">Orqaga</a>
                    </div>

                    <div class="card-body">
                        {{-- Xatolik xabarlari --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.lesson.store') }}" method="POST">
                            @csrf

                            {{-- Nomi (UZ) --}}
                            <div class="mb-3">
                                <label for="name_uz" class="form-label fw-bold">Nomi (UZ)</label>
                                <input type="text" id="name_uz" name="name_uz" class="form-control @error('name_uz') is-invalid @enderror" value="{{ old('name_uz') }}" placeholder="Masalan: Matematika" required>
                                @error('name_uz')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nomi (RU) --}}
                            <div class="mb-3">
                                <label for="name_ru" class="form-label fw-bold">Nomi (RU)</label>
                                <input type="text" id="name_ru" name="name_ru" class="form-control @error('name_ru') is-invalid @enderror" value="{{ old('name_ru') }}" placeholder="Например: Математика" required>
                                @error('name_ru')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tugmalar --}}
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">💾 Saqlash</button>
                                <a href="{{ route('admin.lesson.index') }}" class="btn btn-secondary">Orqaga</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
