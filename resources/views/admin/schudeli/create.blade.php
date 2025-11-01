@extends('layouts.adminLayout')
@section('title', 'Admin - Create Schedule')

@section('content')
<div class="container mt-4" style="max-width: 700px;">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">🗓 Yangi dars jadvali</h5>
            <a href="{{ route('admin.schedule.index') }}" class="btn btn-success btn-sm">Orqaga</a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Smena --}}
                <div class="mb-3">
                    <label for="smena_id" class="form-label fw-bold">Smena</label>
                    <select name="smena_id" id="smena_id" class="form-control" required>
                        <option value="" disabled selected>— Smena tanlang —</option>
                        @foreach($smenatype as $smena)
                            <option value="{{ $smena->id }}">{{ $smena['name_'. \App::getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Sinf --}}
                <div class="mb-3">
                    <label for="class_id" class="form-label fw-bold">Sinf</label>
                    <select name="class_id" id="class_id" class="form-control" required>
                        <option value="" disabled selected>— Sinf tanlang —</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class['name_'. \App::getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Xona --}}
                <div class="mb-3">
                    <label for="room" class="form-label fw-bold">Xona</label>
                    <input type="text" name="room" id="room" class="form-control">
                </div>

                {{-- Vaqt --}}
                <div class="mb-3">
                    <label for="time" class="form-label fw-bold">Vaqt</label>
                    <input type="time" name="time" id="time" class="form-control">
                </div>

                {{-- PDF fayl --}}
                <div class="mb-3">
                    <label for="pdf_file" class="form-label fw-bold">Dars jadvali PDF fayli</label>
                    <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf">
                    <small class="text-muted">PDF formatdagi dars jadvali faylini yuklang</small>
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">💾 Saqlash</button>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">Orqaga</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
