@extends('layouts.adminLayout')
@section('title')
    Admin - SmenaType
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 25px;
                    }
                    .table td, .table th {
                        padding: 1rem; /* jadval kattaroq ko‘rinadi */
                        vertical-align: middle;
                        font-size: 1.1rem; /* matn kattaroq */
                    }
                    .btn {
                        padding: 0.6rem 1rem; /* tugmalar kattaroq */
                        font-size: 1rem;
                    }
                </style>

                @if (session('success'))
                    <div id="flash-message" class="alert alert-success py-2 px-3 mb-2">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => {
                            var flash = document.getElementById('flash-message');
                            if (flash) flash.style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                <div class="d-flex justify-content-between mb-4">
                    <h3 class="mb-0">🗂 SmenaType ro‘yxati</h3>
                    <a href="{{ route('admin.smenatype.create') }}" class="btn btn-primary">➕ Create</a>
                </div>

                <div class="card-body p-3">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name_uz</th>
                                <th>Name_ru</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($smenatypes as $smenatype)
                                <tr>
                                    <td>{{ $smenatype->id }}</td>
                                    <td>{{ $smenatype->name_uz }}</td>
                                    <td>{{ $smenatype->name_ru }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('admin.smenatype.show', $smenatype->id) }}" class="btn btn-success">Show</a>
                                        <a href="{{ route('admin.smenatype.edit', $smenatype->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.smenatype.destroy', $smenatype->id) }}" method="POST" onsubmit="return confirm('O‘chirishni xohlaysizmi?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
