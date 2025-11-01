@extends('layouts.adminLayout')

@section('title', 'Admin - Employees')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 100px;
                    padding: 20px;
                }

                .card {
                    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                }

                table img {
                    width: 60px;
                    height: 60px;
                    border-radius: 8px;
                    object-fit: cover;
                }

                .btn {
                    margin: 3px;
                }

                .table th, .table td {
                    vertical-align: middle !important;
                    text-align: center;
                }

                .pagination {
                    justify-content: center;
                }

                #flash-message {
                    animation: fadeOut 3s forwards;
                }

                @keyframes fadeOut {
                    0% { opacity: 1; }
                    80% { opacity: 1; }
                    100% { opacity: 0; display: none; }
                }
            </style>

            {{-- Flash Message --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h4 class="mb-0">Xodimlar ro‘yxati</h4>
                    <a href="{{ route('admin.employee.create') }}" class="btn btn-light btn-sm fw-bold">
                        + Yangi Xodim Qo‘shish
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Ism (UZ)</th>
                                    <th>Ism (RU)</th>
                                    <th>Lavozim</th>
                                    <th>Kategoriya</th>
                                    <th>Rasm</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>Ish vaqti</th>
                                    <th>Harakatlar</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name_uz }}</td>
                                        <td>{{ $employee->name_ru }}</td>
                                        <td>{{ $employee->position->name_uz ?? '—' }}</td>
                                        <td>{{ $employee->category->name_uz ?? '—' }}</td>
                                        <td>
                                            <img src="{{ asset('admin/images/' . $employee->image) }}" alt="employee">
                                        </td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->work_time }}</td>
                                        <td>
                                            <a href="{{ route('admin.employee.show', $employee->id) }}" class="btn btn-success btn-sm">
                                                Ko‘rish
                                            </a>
                                            <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn btn-primary btn-sm">
                                                Tahrirlash
                                            </a>

                                            <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST"
                                                  onsubmit="return confirm('Rostan ham o‘chirmoqchimisiz?');"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    O‘chirish
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">Hozircha xodimlar mavjud emas</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ✅ PAGINATION ishlaydi faqat paginate() bo‘lsa --}}
                    @if ($employees instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $employees->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
