@extends('layouts.adminLayout')

@section('title', 'Admin - Infografika')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 250px;
                    padding: 20px;
                }
                table th, table td {
                    vertical-align: middle !important;
                    text-align: center;
                }
                img {
                    border-radius: 8px;
                    object-fit: cover;
                }
            </style>

            {{-- ✅ Flash Message --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <script>
                setTimeout(() => {
                    const flash = document.getElementById('flash-message');
                    if (flash) flash.style.display = 'none';
                }, 3000);
            </script>

            {{-- ✅ Create Button --}}
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h4>📊 Infografika Ro‘yxati</h4>
                <a href="{{ route('admin.infografika.create') }}" class="btn btn-primary">
                    ➕ Create New
                </a>
            </div>

            {{-- ✅ Table --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title (UZ)</th>
                                <th scope="col">Title (RU)</th>
                                <th scope="col" style="width: 220px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($infoGrafika as $infoGrafik)
                                <tr>
                                    <th scope="row">{{ $infoGrafik->id }}</th>
                                    <td>
                                        @if($infoGrafik->image && file_exists(public_path('admin/images/' . $infoGrafik->image)))
                                            <img src="{{ asset('admin/images/' . $infoGrafik->image) }}" alt="Image" style="width: 70px; height: 70px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $infoGrafik->title_uz }}</td>
                                    <td>{{ $infoGrafik->title_ru }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.infografika.show', $infoGrafik->id) }}" class="btn btn-success btn-sm">
                                                👁 Show
                                            </a>
                                            <a href="{{ route('admin.infografika.edit', $infoGrafik->id) }}" class="btn btn-primary btn-sm">
                                                ✏ Edit
                                            </a>
                                            <form action="{{ route('admin.infografika.destroy', $infoGrafik->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No records found</td>
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
