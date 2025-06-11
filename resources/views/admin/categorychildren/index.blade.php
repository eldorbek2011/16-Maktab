
@extends('layouts.adminLayout')
@section('title')
    Admin - KateogryChildren

@endsection
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <style>
                        .main-content {
                            margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
                            padding: 20px;
                        }
                    </style>

                    @if (session('success'))
                        <div id="flash-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <script>

                        setTimeout(function() {
                            var flash = document.getElementById('flash-message');
                            if (flash) {
                                flash.style.display = 'none';
                            }
                        }, 3000);
                    </script>


                    <a href="{{ route('admin.categorychildren.create') }}" class="btn btn-primary">Create</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name_uz</th>
                                <th scope="col">Name_ru</th>
                                <th scope="col">Category (name)</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($childrens as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name_uz }}</td>
                                    <td>{{ $category->name_ru }}</td>
                                    <td>{{ $category->category->name_uz ?? '—' }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('admin.categorychildren.destroy', $category->id) }}" method = "POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class = 'btn btn-danger'>Delete</button>
                                        </form>
                                        <a href="{{ route('admin.categorychildren.edit',$category->id) }}" class="btn btn-success">Edit</a>

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
