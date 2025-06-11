@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.categorychildren.store') }}" method="POST">
            @csrf

            <div class="card">
                <h5 class="card-header">Create CategoryChilren</h5>
                <div class="card-body">
                    <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="text" class="form-control @error('name_uz') is-invalid @enderror" id="name_uz" placeholder="name..." name="name_uz" value="{{ old('name_uz') }}">
                        @error('name_uz')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <select class="form-control" name ="category_id">
                        <label for="number" class="form-label">Category (name)</label>
                        @foreach($category as $categor)
                            <option value = "{{ $categor->id }}">{{ $categor->name_uz }}</option>
                        @endforeach
                    </select>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="text" class="form-control @error('name_ru') is-invalid @enderror" id="name_ru" placeholder="name..." name="name_ru" value="{{ old('name_ru') }}">
                        @error('name_ru')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                     <div class="mb-4">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="url..." name="url" value="{{ old('url') }}">
                        @error('url')
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

