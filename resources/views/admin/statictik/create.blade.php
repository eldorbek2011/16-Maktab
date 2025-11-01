@extends('layouts.adminLayout')
@section('title', 'Create Statictik')

@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <h5 class="card-header">Create Statictik</h5>
        <div class="card-body">
            <a href="{{ route('admin.statictik.index') }}" class="btn btn-success mb-3">Back</a>

            <form action="{{ route('admin.statictik.store') }}" method="POST">
                @csrf

                @foreach(['classesCount','studentsCount','teachersCount','graduatesCount'] as $field)
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ ucfirst($field) }}</label>
                        <input type="number" 
                               class="form-control @error($field) is-invalid @enderror" 
                               id="{{ $field }}" 
                               name="{{ $field }}" 
                               placeholder="{{ $field }}..." 
                               value="{{ old($field) }}">
                        @error($field)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
