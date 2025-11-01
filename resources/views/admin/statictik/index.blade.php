@extends('layouts.adminLayout')
@section('title', 'Admin - Statictik')

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
                    .table td, .table th {
                        padding: 0.6rem;
                        vertical-align: middle;
                        font-size: 0.95rem;
                    }
                    .btn-sm {
                        padding: 0.35rem 0.6rem;
                        font-size: 0.8rem;
                    }
                </style>

                @if(session('success'))
                    <div id="flash-message" class="alert alert-success py-1 px-2 mb-2">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => {
                            var flash = document.getElementById('flash-message');
                            if(flash) flash.style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                @if($statick->isEmpty())
                    <a href="{{ route('admin.statictik.create') }}" class="btn btn-primary mb-3">➕ Create Statictik</a>
                @endif

                <div class="card-body p-2">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="table-light small">
                            <tr>
                                <th>#</th>
                                <th>Sinflar Soni</th>
                                <th>O‘quvchilar Soni</th>
                                <th>O‘qituvchilar Soni</th>
                                <th>Bitiruvchilar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statick as $stat)
                                <tr>
                                    <td>{{ $stat->id }}</td>
                                    <td>{{ $stat->classesCount }}</td>
                                    <td>{{ $stat->studentsCount }}</td>
                                    <td>{{ $stat->teachersCount }}</td>
                                    <td>{{ $stat->graduatesCount }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.statictik.show',$stat->id) }}" class="btn btn-success btn-sm">Show</a>
                                        <a href="{{ route('admin.statictik.edit',$stat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.statictik.destroy',$stat->id) }}" method="POST" onsubmit="return confirm('O‘chirishni xohlaysizmi?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($statick->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Hech qanday ma’lumot yo‘q</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
