@extends('layouts.adminLayout')
@section('title', 'Create Gallery')
@section('content')

<div class="col-md-8 offset-md-2 mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h5 class="mb-0">🖼️ Yangi Galereya Qo‘shish</h5>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-light btn-sm fw-bold">← Back</a>
        </div>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body p-4">

                {{-- Image upload --}}
                <div class="mb-4">
                    <label for="image" class="form-label fw-bold">Rasm yuklash</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-3 text-center">
                        <img id="preview" src="#" alt="Preview" 
                             style="display:none; width: 180px; height: 180px; border-radius: 10px; object-fit: cover;">
                    </div>
                </div>

                {{-- Title (uz) --}}
                <div class="mb-4">
                    <label for="title_uz" class="form-label fw-bold">Sarlavha (uz)</label>
                    <input type="text" class="form-control @error('title_uz') is-invalid @enderror"
                           id="title_uz" placeholder="Sarlavha..." name="title_uz" value="{{ old('title_uz') }}">
                    @error('title_uz')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Title (ru) --}}
                <div class="mb-4">
                    <label for="title_ru" class="form-label fw-bold">Sarlavha (ru)</label>
                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror"
                           id="title_ru" placeholder="Название..." name="title_ru" value="{{ old('title_ru') }}">
                    @error('title_ru')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4 fw-bold">💾 Saqlash</button>
                </div>

            </div>
        </form>
    </div>
</div>

{{-- Image preview script --}}
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = "#";
            preview.style.display = 'none';
        }
    }
</script>

<style>
    .card {
        border-radius: 15px;
    }
    .form-label {
        color: #333;
    }
</style>

@endsection
