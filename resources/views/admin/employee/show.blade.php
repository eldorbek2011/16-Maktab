
@extends('layouts.adminLayout')
@section('content')



    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.employee.index') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <h5 class="card-header">Show Employee</h5>
                <div class="card-body">
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="string" class="form-control" id="name_uz" placeholder="name..." name = "name_uz" value = "{{$employee->name_uz}}">
                    </div>
                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="string" class="form-control" id="name_ru" placeholder="name..." name = "name_ru" value = "{{$employee->name_ru}}">
                    </div>
                    <div class="mb-4">
                    <label class="form-label">Image</label><br>
                    <img src="{{ asset('admin/images/' . $employee->image) }}" alt="Employee Image" style="width: 150px; height: auto; border-radius: 8px;">
                </div>


                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email" name = "email" value = "{{$employee->email}}">
                    </div>
                    <div class="mb-4">
                    <div class="mb-4">
                    <label for="category_id" class="form-label">Kategoriya (empCategory)</label>
                    <select class="form-control" name="category_id" id="category_id" disabled>
                        @foreach($empCategories as $category)
                            <option value="{{ $category->id }}" {{ $employee->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name_uz }}
                            </option>
                        @endforeach
                    </select>
                </div>

                     </div>
                    <div class="mb-4">
                    <label for="position_id" class="form-label">Lavozimi (Position)</label>
                    <select class="form-control" name="position_id" id="position_id" disabled>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                                {{ $position->name_uz }}
                            </option>
                        @endforeach
                    </select>
                </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="string" class="form-control" id="phone" placeholder="phone" name = "phone" value = "{{$employee->phone}}">
                    </div>
                    <div class="mb-4">
                        <label for="work_time" class="form-label">Work_time</label>
                        <input type="time" class="form-control" id="work_time" placeholder="work_time" name = "work_time" value = "{{$employee->work_time}}">
                    </div>
                   
                </div>
            </div>
        </form>
    </div>


@endsection
