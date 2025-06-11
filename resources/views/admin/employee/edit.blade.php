@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <h5 class="card-header">Edit Employee</h5>
                <div class="card-body">
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">Back</a>

                    <div class="mb-3">
                        <label for="name_uz" class="form-label">Name (UZ)</label>
                        <input type="text" class="form-control" name="name_uz" id="name_uz" value="{{ $employee->name_uz }}">
                    </div>

                    <div class="mb-3">
                        <label for="name_ru" class="form-label">Name (RU)</label>
                        <input type="text" class="form-control" name="name_ru" id="name_ru" value="{{ $employee->name_ru }}">
                    </div>

                    <div class="mb-3">
                        <label>Current Image</label><br>
                        <img src="{{ asset('admin/images/' . $employee->image) }}" width="120" alt="current image">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $employee->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($empCategories as $category)
                                <option value="{{ $category->id }}" {{ $employee->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_uz }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="position_id" class="form-label">Position</label>
                        <select name="position_id" class="form-control" id="position_id">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                                    {{ $position->name_uz }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $employee->phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="work_time" class="form-label">Work Time</label>
                        <input type="time" class="form-control" name="work_time" id="work_time" value="{{ $employee->work_time }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>

@endsection
