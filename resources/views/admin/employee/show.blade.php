@extends('layouts.adminLayout')
@section('title', 'Show Employee')
@section('content')

<div class="col-md-8 offset-md-2 mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Xodim ma’lumotlari</h5>
            <a href="{{ route('admin.employee.index') }}" class="btn btn-light btn-sm fw-bold">← Back</a>
        </div>

        <div class="card-body">
            {{-- Employee Image --}}
            <div class="text-center mb-4">
                <img src="{{ asset('admin/images/' . $employee->image) }}" 
                     alt="Employee Image" 
                     class="rounded shadow-sm" 
                     style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Name (UZ):</label>
                    <input type="text" class="form-control" value="{{ $employee->name_uz }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Name (RU):</label>
                    <input type="text" class="form-control" value="{{ $employee->name_ru }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <input type="email" class="form-control" value="{{ $employee->email }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Telefon:</label>
                    <input type="text" class="form-control" value="{{ $employee->phone }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Ish vaqti:</label>
                    <input type="text" class="form-control" value="{{ $employee->work_time }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Kategoriya:</label>
                    <input type="text" class="form-control" 
                           value="{{ $employee->category->name_uz ?? '—' }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Lavozimi:</label>
                    <input type="text" class="form-control" 
                           value="{{ $employee->position->name_uz ?? '—' }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
    }
    .card-header {
        border-top-left-radius: 15px !important;
        border-top-right-radius: 15px !important;
    }
</style>

@endsection
