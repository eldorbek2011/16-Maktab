@extends('layouts.adminLayout')
@section('title')
    Admin - Create Employee
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
                </style>

                <div class="card">
                    <div class="card-header">
                        <h4>Xodim yaratish</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">Orqaga</a>

                        <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_uz" class="form-label">Ism (UZ)</label>
                                    <input type="text" class="form-control" id="name_uz" name="name_uz" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name_ru" class="form-label">Ism (RU)</label>
                                    <input type="text" class="form-control" id="name_ru" name="name_ru" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="work_time" class="form-label">Ish vaqti</label>
                                    <input type="text" class="form-control" id="work_time" name="work_time" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Rasm</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">Kategoriya</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @foreach($empCategories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat['name_'. app()->getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="position_id" class="form-label">Lavozim</label>
                                    <select name="position_id" id="position_id" class="form-control" required>
                                        @foreach($positions as $pos)
                                            <option value="{{ $pos->id }}">{{ $pos['name_'. app()->getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="lesson_id" class="form-label">Fan (ixtiyoriy)</label>
                                <select name="lesson_id" id="lesson_id" class="form-control">
                                    <option value="">— Fan tanlanmagan —</option>
                                    @foreach($lessons as $lesson)
                                        <option value="{{ $lesson->id }}">{{ $lesson['name_'. app()->getLocale()] }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Majburiy emas — o‘qituvchining fani.</small>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                                <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">Orqaga</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
