
@extends('layouts.adminLayout')
@section('content')



    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <h5 class="card-header">Create Category</h5>
                <div class="card-body">
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="string" class="form-control" id="name_uz" placeholder="name..." name = "name_uz">
                    </div>
                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="string" class="form-control" id="name_ru" placeholder="name..." name = "name_ru">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" placeholder="image..." name = "image">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email" name = "email">
                    </div>
                    <div class="mb-4">
                    <select class="form-control" name ="category_id">
                        <label for="number" class="form-label">Category (id)</label>
                        @foreach($empCategories as $empCategory)
                            <option value = "{{ $empCategory->id }}">{{ $empCategory->name_uz }}</option>
                        @endforeach
                    </select>
                     </div>
                    <select class="form-control" name ="position_id">
                        @foreach($positions as $position)
                            <option value = "{{ $position->id }}">{{ $position->name_uz }}</option>
                        @endforeach
                    </select>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="string" class="form-control" id="phone" placeholder="phone" name = "phone">
                    </div>
                    <div class="mb-4">
                        <label for="work_time" class="form-label">Work_time</label>
                        <input type="time" class="form-control" id="work_time" placeholder="work_time" name = "work_time">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
