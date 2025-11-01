@extends('layouts.adminLayout')

@section('title', 'Admin - Lessons')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                    table th, table td {
                        vertical-align: middle !important;
                    }
                </style>

                {{-- Flash success message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(() => {
                        const flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Lessons</h4>
                    <a href="{{ route('admin.lesson.create') }}" class="btn btn-primary">+ Create Lesson</a>
                </div>

                {{-- Lessons Table --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Name (UZ)</th>
                                    <th scope="col">Name (RU)</th>
                                    <th scope="col" width="220" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->id }}</td>
                                        <td>{{ $lesson->name_uz }}</td>
                                        <td>{{ $lesson->name_ru }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('admin.lesson.show', $lesson->id) }}" class="btn btn-success btn-sm">Show</a>
                                                <a href="{{ route('admin.lesson.edit', $lesson->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('admin.lesson.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Rostdan ham o‘chirasizmi?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Hozircha darslar mavjud emas.</td>
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
