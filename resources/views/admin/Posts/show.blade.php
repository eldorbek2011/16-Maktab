@extends('layouts.adminLayout')
@section('title', 'Admin - Show Post')

@section('content')
<div class="container mt-4" style="max-width: 700px;">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">📄 Post tafsilotlari</h5>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-success">Orqaga</a>
        </div>

        <div class="card-body">
            {{-- Title (UZ) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Title (UZ)</label>
                <input type="text" class="form-control" value="{{ $post->title_uz }}" readonly>
            </div>

            {{-- Title (RU) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Title (RU)</label>
                <input type="text" class="form-control" value="{{ $post->title_ru }}" readonly>
            </div>

            {{-- Body (UZ) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Body (UZ)</label>
                <textarea class="form-control" rows="3" readonly>{{ $post->body_uz }}</textarea>
            </div>

            {{-- Body (RU) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Body (RU)</label>
                <textarea class="form-control" rows="3" readonly>{{ $post->body_ru }}</textarea>
            </div>

            {{-- Image --}}
            @if($post->image)
            <div class="mb-3 text-center">
                <label class="form-label fw-bold">Rasm</label><br>
                <img src="{{ asset('admin/images/' . $post->image) }}" alt="Post Image" style="max-width: 100%; border-radius: 6px;">
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
