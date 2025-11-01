@extends('layouts.adminLayout')
@section('content')

<style>
    .show-card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-top: 50px;
    }
    .show-card h5 {
        font-weight: 600;
        color: #2c3e50;
        text-align: center;
        margin-bottom: 25px;
    }
    .form-label {
        font-weight: 500;
        color: #34495e;
    }
    input[readonly] {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        cursor: not-allowed;
    }
    .btn-back {
        display: inline-block;
        margin-bottom: 20px;
        background-color: #28a745;
        border: none;
        color: white;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
    }
    .btn-back:hover {
        background-color: #218838;
    }
</style>

<div class="container">
    <div class="col-md-8 offset-md-2">
        <div class="show-card">
            <h5>📋 Show Position</h5>

            <a href="{{ route('admin.position.index') }}" class="btn-back">← Back</a>

            <div class="mb-4">
                <label for="name_uz" class="form-label">Name (Uzbek)</label>
                <input type="text" class="form-control" id="name_uz"
                       value="{{ $position->name_uz }}" readonly>
            </div>

            <div class="mb-4">
                <label for="name_ru" class="form-label">Name (Russian)</label>
                <input type="text" class="form-control" id="name_ru"
                       value="{{ $position->name_ru }}" readonly>
            </div>
        </div>
    </div>
</div>

@endsection
