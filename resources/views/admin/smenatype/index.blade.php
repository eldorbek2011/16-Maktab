


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


                    <a href="{{ route('admin.smenatype.create') }}" class="btn btn-primary">Create</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name_uz</th>
                                <th scope="col">Name_ru</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($smenatypes as $smenatype)
                                <tr>
                                    <th scope="row">{{ $smenatype->id }}</th>
                                    <td>{{ $smenatype->name_uz }}</td>
                                    <td>{{ $smenatype->name_ru }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('admin.smenatype.destroy', $smenatype->id) }}" method = "POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class = 'btn btn-danger'>Delete</button>
                                        </form>
                                        <a class="btn btn-success" href="{{route('admin.smenatype.show', $smenatype->id)}}">Show</a>
                                        <a class="btn btn-primary" href="{{route('admin.smenatype.edit', $smenatype->id)}}">Edit</a>
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

