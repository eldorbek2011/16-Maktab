@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.category.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <h5 class="card-header">Edit Category</h5>
                <div class="card-body">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="text" class="form-control" id="name_uz" placeholder="name..." name="name_uz" value="{{ $position->name_uz }}">
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="text" class="form-control" id="name_ru" placeholder="name..." name="name_ru" value="{{ $position->name_ru }}">
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
