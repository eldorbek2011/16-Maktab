
@extends('layouts.adminLayout')
@section('title')
    Admin - Kateogry

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


                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title_uz</th>
                                <th scope="col">Title_ru</th>
                                <th scope="col">Body_uz</th>
                                <th scope="col">Body_ru</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title_uz }}</td>
                                    <td>{{ $post->title_ru }}</td>
                                    <td>{{ $post->body_uz }}</td>
                                    <td>{{ $post->body_ru }}</td>
                                    <td>

                                        <img src="{{ asset('admin/images/' . $post->image) }}" alt="" style="width: 60px; height: 60px;">


                                    </td >
                                    <td class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method = "POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class = 'btn btn-danger'>Delete</button>
                                        </form>
                                        <a class="btn btn-success" href="{{route('admin.posts.show',$post->id)}}">Show</a>
                                        <a class="btn btn-primary" href="{{route('admin.posts.edit',$post->id)}}">Edit</a>
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
