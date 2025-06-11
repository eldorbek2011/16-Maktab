


@extends('layouts.adminLayout')
@section('content')



    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="card">
                <h5 class="card-header">show Posts</h5>
                <div class="card-body">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="title_uz" class="form-label">Title (uz)</label>
                        <input type="string" class="form-control" id="title_uz" placeholder="title..." name = "title_uz" value = "{{$post->title_uz}}">
                    </div>
                    <div class="mb-4">
                        <label for="title_ru" class="form-label">Title (ru)</label>
                        <input type="string" class="form-control" id="title_ru" placeholder="title..." name = "title_ru" value = "{{$post->title_ru}}">
                    </div>
                    <div class="mb-4">
                        <label for="body_uz" class="form-label">Body (uz)</label>
                        <input type="string" class="form-control" id="body_uz" placeholder="body..." name = "body_uz" value = "{{$post->body_uz}}">
                    </div>
                    <div class="mb-4">
                        <label for="body_ru" class="form-label">Body (ru)</label>
                        <input type="string" class="form-control" id="body_ru" placeholder="body_ru..." name = "body_ru" value = "{{$post->body_ru}}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Image</label><br>
                        <img src="{{ asset('admin/images/' . $post->image) }}" alt="Posts Image" style="width: 150px; height: auto; border-radius: 8px;">
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection
