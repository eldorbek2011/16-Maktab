@extends('layouts.adminLayout')
@section('title', 'Admin - Edit Schedule')

@section('content')
<div class="container mt-4" style="max-width: 700px;">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">📝 Dars jadvalini tahrirlash</h5>
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

            <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Smena --}}
                <div class="mb-3">
                    <label for="smena_id" class="form-label fw-bold">Smena</label>
                    <select name="smena_id" id="smena_id" class="form-control" required>
                        <option value="" disabled>— Smena tanlang —</option>
                        @foreach($smenatype as $smena)
                            <option value="{{ $smena->id }}" {{ (int)$schedule->smena_id === (int)$smena->id ? 'selected' : '' }}>
                                {{ $smena['name_'. \App::getLocale()] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sinf --}}
                <div class="mb-3">
                    <label for="class_id" class="form-label fw-bold">Sinf</label>
                    <select name="class_id" id="class_id" class="form-control" required>
                        <option value="" disabled>— Sinf tanlang —</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ (int)$schedule->class_id === (int)$class->id ? 'selected' : '' }}>
                                {{ $class['name_'. \App::getLocale()] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Xona --}}
                <div class="mb-3">
                    <label for="room" class="form-label fw-bold">Xona</label>
                    <input type="text" name="room" id="room" class="form-control" value="{{ $schedule->room ?? '' }}">
                </div>

                {{-- Vaqt --}}
                <div class="mb-3">
                    <label for="time" class="form-label fw-bold">Vaqt</label>
                    <input type="time" name="time" id="time" class="form-control" value="{{ $schedule->time ?? '' }}">
                </div>

                {{-- Joriy PDF fayl --}}
                @if($schedule->pdf_file)
                <div class="mb-3">
                    <label class="form-label fw-bold">Joriy PDF fayl</label>
                    <div class="mb-2">
                        <a href="{{ asset('admin/pdfs/'.$schedule->pdf_file) }}" target="_blank" class="btn btn-info btn-sm">
                            <i class="bx bx-file"></i> PDF ni ko'rish
                        </a>
                        <span class="ms-2">{{ $schedule->pdf_file }}</span>
                    </div>
                </div>
                @endif

                {{-- Yangi PDF fayl --}}
                <div class="mb-3">
                    <label for="pdf_file" class="form-label fw-bold">Yangi PDF fayl (ixtiyoriy)</label>
                    <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf">
                    <small class="text-muted">PDF formatdagi dars jadvali faylini yuklang</small>
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">💾 Saqlash</button>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">Bekor qilish</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
