@extends('layouts.adminLayout')
@section('title', 'Admin - Posts')

@section('content')
<div class="container mt-4" style="max-width: 1000px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4>📄 Posts</h4>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">➕ Yangi</a>
    </div>

    @if (session('success'))
        <div id="flash-message" class="alert alert-success py-1 px-2">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('flash-message')?.remove(), 3000);
        </script>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-1">
            <table class="table table-sm table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title (UZ)</th>
                        <th>Title (RU)</th>
                        <th>Body (UZ)</th>
                        <th>Body (RU)</th>
                        <th>Rasm</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ Str::limit($post->title_uz, 20) }}</td>
                            <td>{{ Str::limit($post->title_ru, 20) }}</td>
                            <td>{{ Str::limit($post->body_uz, 30) }}</td>
                            <td>{{ Str::limit($post->body_ru, 30) }}</td>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset('admin/images/' . $post->image) }}" alt="post" style="width: 40px; height: 40px; object-fit: cover; border-radius: 3px;">
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success btn-sm">Show</a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('O‘chirishni xohlaysizmi?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
