
@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.infografika.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <h5 class="card-header">Create Gallery</h5>
                <div class="card-body">
                    <a href="{{ route('admin.infografika.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="image..." name="image" value="{{ old('image') }}">
                        @error('image')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title_uz" class="form-label">Title (uz)</label>
                        <input type="text" class="form-control @error('title_uz') is-invalid @enderror" id="title_uz" placeholder="title..." name="title_uz" value="{{ old('title_uz') }}">
                        @error('title_uz')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title_ru" class="form-label">Title (ru)</label>
                        <input type="text" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru" placeholder="title..." name="title_ru" value="{{ old('title_ru') }}">
                        @error('title_ru')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

