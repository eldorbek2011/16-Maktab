

@extends('layouts.adminLayout')
@section('title')
    Admin - Statick

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

                    @if($statick->isEmpty())
                        <a href="{{ route('admin.statictik.create') }}" class="btn btn-primary">Create</a>
                    @endif

                    <script>

                        setTimeout(function() {
                            var flash = document.getElementById('flash-message');
                            if (flash) {
                                flash.style.display = 'none';
                            }
                        }, 3000);
                    </script>



                    @empty($statick)
                        <a href="{{ route('admin.statictik.create') }}" class="btn btn-primary">Create</a>
                    @endif
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">SinflarSoni</th>
                                <th scope="col">OquvchilarSoni</th>
                                <th scope="col">OqituvchilarSoni</th>
                                <th scope="col">Bituruvchilar</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statick as $stat)
                                <tr>
                                    <th scope="row">{{ $stat->id }}</th>
                                    <td>{{ $stat->classesCount }}</td>
                                    <td>{{ $stat->studentsCount }}</td>
                                    <td>{{ $stat->teachersCount }}</td>
                                    <td>{{ $stat->graduatesCount }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('admin.statictik.destroy', $stat->id) }}" method = "POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class = 'btn btn-danger'>Delete</button>
                                        </form>
                                        <a class="btn btn-success" href="{{route('admin.statictik.show',$stat->id)}}">Show</a>
                                        <a class="btn btn-primary" href="{{route('admin.statictik.edit',$stat->id)}}">Edit</a>
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
