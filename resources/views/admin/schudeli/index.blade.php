


@extends('layouts.adminLayout')
@section('title')
    Admin - Schudeli

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


                    <a href="{{ route('admin.schedule.create') }}" class="btn btn-primary">Create</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Smena (id)</th>
                                <th scope="col">Lesson (id)</th>
                                <th scope="col">Image</th>
                                <th scope="col">sinf</th>
                                <th scope="col">Rooms</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schudeli as $schude)
                                <tr>
                                    <th scope="row">{{ $schude->id }}</th>
                                    <td>{{ $schude->smena ? $schude->smena->name_uz : 'No lesson' }}</td>
                                    <td>{{ $schude->lesson ? $schude->lesson->name_uz : 'No lesson' }}</td>
                                    <td>

                                        <img src="/admin/images/{{ $schude->image }}" alt="" style="width: 60px; height: 60px;">


                                    </td >
                                    <td>{{ $schude->week_day }}</td>
                                    <td>{{ $schude->room }}</td>
                                    <td>{{ $schude->time }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('admin.schedule.destroy', $schude->id) }}" method = "POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class = 'btn btn-danger'>Delete</button>
                                        </form>
                                        <a class="btn btn-success" href="{{route('admin.schedule.show', $schude->id)}}">Show</a>
                                        <a class="btn btn-primary" href="{{route('admin.schedule.edit', $schude->id)}}">Edit</a>
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

