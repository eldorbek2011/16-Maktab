@extends('layouts.adminLayout')
@section('title', 'Admin - Schudeli')

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
                    .table-img {
                        width: 50px;
                        height: 50px;
                        object-fit: cover;
                        border-radius: 5px;
                    }
                    .action-btns form, .action-btns a {
                        margin-right: 4px;
                    }
                </style>

                @if (session('success'))
                    <div id="flash-message" class="alert alert-success mb-2">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => { document.getElementById('flash-message').style.display = 'none'; }, 3000);
                    </script>
                @endif

                <a href="{{ route('admin.schedule.create') }}" class="btn btn-primary mb-2">Create</a>
                
                <div class="card-body p-0">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Smena</th>
                            <th>Sinf</th>
                            <th>PDF Fayl</th>
                            <th>Room</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schudeli as $schude)
                            <tr>
                                <td>{{ $schude->id }}</td>
                                <td>{{ $schude->smena?->name_uz ?? '-' }}</td>
                                <td>{{ $schude->classModel?->name_uz ?? '-' }}</td>
                                <td>
                                    @if($schude->pdf_file)
                                        <a href="{{ asset('admin/pdfs/'.$schude->pdf_file) }}" target="_blank" class="btn btn-info btn-sm">
                                            <i class="bx bx-file"></i> PDF
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $schude->room ?? '-' }}</td>
                                <td>{{ $schude->time ?? '-' }}</td>
                                <td class="action-btns d-flex">
                                    <a href="{{ route('admin.schedule.show', $schude->id) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('admin.schedule.edit', $schude->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.schedule.destroy', $schude->id) }}" method="POST" onsubmit="return confirm('O‘chirishni xohlaysizmi?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
