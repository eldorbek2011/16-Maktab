@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.categorychildren.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <h5 class="card-header">Edit categorychildren</h5>
                <div class="card-body">
                    <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="text" class="form-control" id="name_uz" placeholder="name..." name="name_uz" value="{{ $category->name_uz }}">
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="text" class="form-control" id="name_ru" placeholder="name..." name="name_ru" value="{{ $category->name_ru }}">
                    </div>
                     <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($Category as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name_uz }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
