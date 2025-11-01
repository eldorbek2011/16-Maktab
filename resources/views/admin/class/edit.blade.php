@extends('layouts.adminLayout')

@section('title', 'Admin - Edit Class')

@section('content')
<div class="container mt-5" style="max-width: 720px;">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="mb-0">✏️ Sinfni tahrirlash</h5>
            <a href="{{ route('admin.class.index') }}" class="btn btn-light btn-sm">Orqaga</a>
        </div>

        <div class="card-body p-4">
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

            <form action="{{ route('admin.class.update', $class->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Name (UZ) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-bold">Nomi (UZ)</label>
                    <input type="text"
                           id="name_uz"
                           name="name_uz"
                           class="form-control form-control-lg @error('name_uz') is-invalid @enderror"
                           value="{{ old('name_uz', $class->name_uz) }}"
                           placeholder="Masalan: 1-sinf"
                           required>
                    @error('name_uz')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (RU) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-bold">Nomi (RU)</label>
                    <input type="text"
                           id="name_ru"
                           name="name_ru"
                           class="form-control form-control-lg @error('name_ru') is-invalid @enderror"
                           value="{{ old('name_ru', $class->name_ru) }}"
                           placeholder="Например: 1-й класс"
                           required>
                    @error('name_ru')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tugmalar --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-5">💾 Saqlash</button>
                    <a href="{{ route('admin.class.index') }}" class="btn btn-secondary btn-lg px-5">Orqaga</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

