@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <h5 class="card-header">Create SmenaType</h5>
                <div class="card-body">
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-success">Back</a>

                    <select class="form-control" name ="smena_id">
                        <label for="number" class="form-label">Smena (id)</label>
                        @foreach($smenatype as $smena)
                            <option value = "{{ $smena->id }}">{{ $smena->name_uz }}</option>

                        @endforeach
                    </select>
                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" placeholder="image..." name = "image">
                    </div>
                    <select class="form-control" name ="lesson_id">
                        <label for="number" class="form-label">Lesson (id)</label>
                        @foreach($lessons as $lesson)
                            <option value = "{{ $lesson->id }}">{{ $lesson->name_uz }}</option>

                        @endforeach
                    </select>

                    <div class="mb-4">
                        <label for="week_day" class="form-label">Sinflar</label>
                        <input type="text" class="form-control @error('week_day') is-invalid @enderror" id="week_day" placeholder="Sinf Nomi..." name="week_day" value="{{ old('week_day') }}">
                        @error('week_day')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                     <div class="mb-4">
                        <label for="time" class="form-label">Sinflar Vaqti</label>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" placeholder="time..." name="time" value="{{ old('time') }}">
                        @error('time')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="room" class="form-label">Rooms</label>
                        <input type="text" class="form-control @error('room') is-invalid @enderror" id="room" placeholder="room..." name="room" value="{{ old('room') }}">
                        @error('room')
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

