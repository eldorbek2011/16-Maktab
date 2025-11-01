@extends('layouts.adminLayout')
@section('title', 'Show SmenaType')

@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <h5 class="card-header">Show SmenaType</h5>
        <div class="card-body">
            <a href="{{ route('admin.smenatype.index') }}" class="btn btn-success mb-3">Back</a>

            <div class="mb-3">
                <label class="form-label fw-bold">Name (UZ)</label>
                <p class="form-control-plaintext">{{ $smenatype->name_uz }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Name (RU)</label>
                <p class="form-control-plaintext">{{ $smenatype->name_ru }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
