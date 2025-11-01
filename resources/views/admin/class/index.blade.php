@extends('layouts.adminLayout')

@section('title', 'Admin - Sinflar')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                {{-- Styling --}}
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                    .table td, .table th {
                        vertical-align: middle !important;
                    }
                    .btn {
                        margin-right: 5px;
                    }
                </style>

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => {
                            let flash = document.getElementById('flash-message');
                            if (flash) flash.style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                {{-- Header and Create button --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Sinflar ro'yxati</h4>
                    <a href="{{ route('admin.class.create') }}" class="btn btn-primary">+ Yangi sinf</a>
                </div>

                {{-- Table --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;">#</th>
                                    <th>Nomi (UZ)</th>
                                    <th>Nomi (RU)</th>
                                    <th style="width: 250px;">Harakatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($classes as $class)
                                    <tr>
                                        <td>{{ $class->id }}</td>
                                        <td>{{ $class->name_uz }}</td>
                                        <td>{{ $class->name_ru }}</td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- Delete --}}
                                                <form action="{{ route('admin.class.destroy', $class->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Rostdan o\'chirmoqchimisiz?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">🗑️ O'chirish</button>
                                                </form>

                                                {{-- Show --}}
                                                <a href="{{ route('admin.class.show', $class->id) }}" class="btn btn-success btn-sm">
                                                    👁️ Ko'rish
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.class.edit', $class->id) }}" class="btn btn-primary btn-sm">
                                                    ✏️ Tahrirlash
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Hozircha hech qanday sinf kiritilmagan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

