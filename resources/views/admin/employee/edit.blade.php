@extends('layouts.adminLayout')
@section('title')
    Admin - Edit Employee
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-10">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                    .card {
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                    }
                    .form-group {
                        margin-bottom: 1rem;
                    }
                    img.preview {
                        border-radius: 10px;
                        margin-top: 10px;
                    }
                </style>

                <div class="card">
                    <div class="card-header">
                        <h4>Xodimni tahrirlash</h4>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">Orqaga</a>

                        <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Ismlar --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_uz" class="form-label">Ism (UZ)</label>
                                    <input type="text" class="form-control" id="name_uz" name="name_uz" value="{{ $employee->name_uz }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name_ru" class="form-label">Ism (RU)</label>
                                    <input type="text" class="form-control" id="name_ru" name="name_ru" value="{{ $employee->name_ru }}" required>
                                </div>
                            </div>

                            {{-- Email & Telefon --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                                </div>
                            </div>

                            {{-- Ish vaqti & Rasm --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="work_time" class="form-label">Ish vaqti</label>
                                    <input type="text" class="form-control" id="work_time" name="work_time" value="{{ $employee->work_time }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Yangi rasm (ixtiyoriy)</label>
                                    <input type="file" class="form-control" id="image" name="image">

                                    @if($employee->image)
                                        <div class="mt-2">
                                            <label>Joriy rasm:</label><br>
                                            <img src="{{ asset('admin/images/' . $employee->image) }}" width="120" class="preview" alt="current image">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Kategoriya & Lavozim --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">Kategoriya</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @foreach($empCategories as $cat)
                                            <option value="{{ $cat->id }}" {{ $employee->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat['name_'.app()->getLocale()] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="position_id" class="form-label">Lavozim</label>
                                    <select name="position_id" id="position_id" class="form-control" required>
                                        @foreach($positions as $pos)
                                            <option value="{{ $pos->id }}" {{ $employee->position_id == $pos->id ? 'selected' : '' }}>
                                                {{ $pos['name_'.app()->getLocale()] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Fan --}}
                            <div class="mb-3">
                                <label for="lesson_id" class="form-label">Fan (ixtiyoriy)</label>
                                <select name="lesson_id" id="lesson_id" class="form-control">
                                    <option value="">— Fan tanlanmagan —</option>
                                    @foreach($lessons as $lesson)
                                        <option value="{{ $lesson->id }}" {{ $employee->lesson_id == $lesson->id ? 'selected' : '' }}>
                                            {{ $lesson['name_'.app()->getLocale()] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tugmalar --}}
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Yangilash</button>
                                <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">Bekor qilish</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
