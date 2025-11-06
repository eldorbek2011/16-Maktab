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
                                        <a href="{{ asset('admin/pdfs/'.$schude->pdf_file) }}" target="_blank" rel="noopener" class="btn btn-info btn-sm" aria-label="Open PDF in new tab">
                                            <span style="margin-right:8px; font-weight:600;">{{ $schude->classModel?->name_uz }}</span>
                                            {{-- inline svg to avoid external icon dependency --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top:-2px;">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                <path d="M14 2v6h6"/>
                                                <path d="M9 15h1.5a2.5 2.5 0 0 0 0-5H9v5z"/>
                                                <path d="M12.5 15V10"/>
                                                <path d="M16 15h2a2 2 0 0 0 0-4h-2v4z"/>
                                            </svg>
                                            <span style="margin-left:6px;">PDF</span>
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
