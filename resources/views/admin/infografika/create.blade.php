@extends('layouts.adminLayout')

@section('title', 'Create Infografika')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <div class="col-md-8 offset-md-2">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                    .card {
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                    }
                    label {
                        font-weight: 600;
                    }
                </style>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Create Infografika</h5>
                        <a href="{{ route('admin.infografika.index') }}" class="btn btn-success btn-sm">⬅ Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.infografika.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Image --}}
                            <div class="mb-4">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image">
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Title (uz) --}}
                            <div class="mb-4">
                                <label for="title_uz" class="form-label">Title (UZ)</label>
                                <input type="text" class="form-control @error('title_uz') is-invalid @enderror"
                                       id="title_uz" name="title_uz" value="{{ old('title_uz') }}" placeholder="Masalan: Maktab hayoti">
                                @error('title_uz')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Title (ru) --}}
                            <div class="mb-4">
                                <label for="title_ru" class="form-label">Title (RU)</label>
                                <input type="text" class="form-control @error('title_ru') is-invalid @enderror"
                                       id="title_ru" name="title_ru" value="{{ old('title_ru') }}" placeholder="Например: Школьная жизнь">
                                @error('title_ru')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary px-4" type="submit">💾 Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
