
@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.statictik.store') }}" method="POST">
            @csrf

            <div class="card">
                <h5 class="card-header">Create Statictik</h5>
                <div class="card-body">
                    <a href="{{ route('admin.statictik.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="classesCount" class="form-label">classesCount</label>
                        <input type="integer" class="form-control @error('classesCount') is-invalid @enderror" id="classesCount" placeholder="classesCount..." name="classesCount" value="{{ old('classesCount') }}">
                        @error('classesCount')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="studentsCount" class="form-label">studentsCount</label>
                        <input type="integer" class="form-control @error('studentsCount') is-invalid @enderror" id="studentsCount" placeholder="studentsCount..." name="studentsCount" value="{{ old('studentsCount') }}">
                        @error('studentsCount')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="teachersCount" class="form-label">teachersCount</label>
                        <input type="integer" class="form-control @error('teachersCount') is-invalid @enderror" id="teachersCount" placeholder="teachersCount..." name="teachersCount" value="{{ old('teachersCount') }}">
                        @error('teachersCount')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="graduatesCount" class="form-label">graduatesCount</label>
                        <input type="integer" class="form-control @error('graduatesCount') is-invalid @enderror" id="graduatesCount" placeholder="graduatesCount..." name="graduatesCount" value="{{ old('graduatesCount') }}">
                        @error('graduatesCount')
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
