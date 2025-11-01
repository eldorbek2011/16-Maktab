@extends('layouts.adminLayout')

@section('title', 'Admin - Create Post')

@section('content')
<div class="container mt-5" style="max-width: 720px;">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="mb-0">✏️ Post yaratish</h5>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-light btn-sm">Orqaga</a>
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

            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title (UZ) --}}
                <div class="mb-4">
                    <label for="title_uz" class="form-label fw-bold">Title (UZ)</label>
                    <input type="text"
                           id="title_uz"
                           name="title_uz"
                           class="form-control form-control-lg @error('title_uz') is-invalid @enderror"
                           value="{{ old('title_uz') }}"
                           placeholder="Masalan: Yangilik nomi"
                           required>
                    @error('title_uz')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Title (RU) --}}
                <div class="mb-4">
                    <label for="title_ru" class="form-label fw-bold">Title (RU)</label>
                    <input type="text"
                           id="title_ru"
                           name="title_ru"
                           class="form-control form-control-lg @error('title_ru') is-invalid @enderror"
                           value="{{ old('title_ru') }}"
                           placeholder="Например: Название новости"
                           required>
                    @error('title_ru')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Body (UZ) --}}
                <div class="mb-4">
                    <label for="body_uz" class="form-label fw-bold">Body (UZ)</label>
                    <textarea id="body_uz" name="body_uz" rows="4"
                              class="form-control @error('body_uz') is-invalid @enderror"
                              placeholder="Yangilik matni">{{ old('body_uz') }}</textarea>
                    @error('body_uz')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Body (RU) --}}
                <div class="mb-4">
                    <label for="body_ru" class="form-label fw-bold">Body (RU)</label>
                    <textarea id="body_ru" name="body_ru" rows="4"
                              class="form-control @error('body_ru') is-invalid @enderror"
                              placeholder="Текст новости">{{ old('body_ru') }}</textarea>
                    @error('body_ru')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="mb-4">
                    <label for="image" class="form-label fw-bold">Rasm</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                {{-- Tugmalar --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-5">💾 Saqlash</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-lg px-5">Orqaga</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
