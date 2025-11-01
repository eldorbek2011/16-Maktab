@extends('layouts.adminLayout')

@section('title', 'Admin - HomePage Image Tag')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
                    padding: 20px;
                }

                .table th, .table td {
                    text-align: center;
                    vertical-align: middle !important;
                }

                .btn {
                    margin: 2px;
                }

                #flash-message {
                    animation: fadeOut 3s ease forwards;
                }

                @keyframes fadeOut {
                    0% { opacity: 1; }
                    90% { opacity: 1; }
                    100% { opacity: 0; display: none; }
                }
            </style>

            {{-- Flash xabar --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">🏷️ HomePage Image Tag ro‘yxati</h4>
                    <a href="{{ route('admin.HomePageImageTag.create') }}" class="btn btn-primary">
                        + Yangi yozuv qo‘shish
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title (UZ)</th>
                                <th>Title (RU)</th>
                                <th>Body (UZ)</th>
                                <th>Body (RU)</th>
                                <th>Harakatlar</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($homePageImageTags as $homepage)
                                <tr>
                                    <td>{{ $homepage->id }}</td>
                                    <td>{{ $homepage->title_uz }}</td>
                                    <td>{{ $homepage->title_ru }}</td>
                                    <td>{{ Str::limit($homepage->body_uz, 60) }}</td>
                                    <td>{{ Str::limit($homepage->body_ru, 60) }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('admin.HomePageImageTag.edit', $homepage->id) }}" class="btn btn-sm btn-primary">
                                            Tahrirlash
                                        </a>

                                        <form action="{{ route('admin.HomePageImageTag.destroy', $homepage->id) }}" method="POST"
                                              onsubmit="return confirm('Rostan ham o‘chirmoqchimisiz?');"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">O‘chirish</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Hozircha maʼlumot mavjud emas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
