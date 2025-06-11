@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.posts.store') }}" method="POST"enctype="multipart/form-data">
            @csrf

            <div class="card">
                <h5 class="card-header">Create Posts</h5>
                <div class="card-body">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="title_uz" class="form-label">title (uz)</label>
                        <input type="text" class="form-control @error('title_uz') is-invalid @enderror" id="title_uz" placeholder="title..." name="title_uz" value="{{ old('title_uz') }}">
                        @error('title_uz')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title_ru" class="form-label">title (ru)</label>
                        <input type="text" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru" placeholder="title_ru..." name="title_ru" value="{{ old('title_ru') }}">
                        @error('title_ru')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body_uz" class="form-label">Body (uz)</label>
                        <input type="text" class="form-control @error('body_uz') is-invalid @enderror" id="body_uz" placeholder="body..." name="body_uz" value="{{ old('body_uz') }}">
                        @error('body_uz')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body_ru" class="form-label">Body (ru)</label>
                        <input type="text" class="form-control @error('body_ru') is-invalid @enderror" id="body_ru" placeholder="body..." name="body_ru" value="{{ old('body_ru') }}">
                        @error('body_ru')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" placeholder="image..." name = "image">
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
