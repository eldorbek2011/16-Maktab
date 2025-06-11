
@extends('layouts.adminLayout')
@section('title')
    Admin - employee

@endsection
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6">
                    <style>
                        .main-content {
                            margin-left: 100px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
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


                    <a href="{{ route('admin.employee.create') }}" class="btn btn-primary">Create</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name_uz</th>
                                <th scope="col">Name_ru</th>
                                <th scope="col">Position (id)</th>
                                <th scope="col">empCategory (id)</th>
                                <th scope="col">Image</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">work_time</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employe)
                                <tr>
                                    <th scope="row">{{ $employe->id }}</th>
                                    <td>{{ $employe->name_uz }}</td>
                                    <td>{{ $employe->name_ru }}</td>
                                   <td>{{ $employe->position->name_uz ?? '—' }}</td>
                                    <td>{{ $employe->category->name_uz ?? '—' }}</td>


                                    <td>

                                        <img src="/admin/images/{{ $employe->image }}" alt="" style="width: 60px; height: 60px;">

                                    </td >
                                    <td>{{ $employe->email }}</td>
                                    <td>{{ $employe->phone }}</td>
                                    <td>{{ $employe->work_time }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('admin.employee.destroy', $employe->id) }}" method = "POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class = 'btn btn-danger'>Delete</button>
                                        </form>
                                        <a class="btn btn-success" href="{{ route('admin.employee.show',$employe->id) }}">Ko‘rish</a>
                                        <a class="btn btn-primary" href="{{ route('admin.employee.edit',$employe->id) }}">O`zgartirish</a>

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
