

@extends('layouts.adminLayout')
@section('content')



    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.smenatype.store') }}" method="POST">
            @csrf

            <div class="card">
                <h5 class="card-header">show empCategory</h5>
                <div class="card-body">
                    <a href="{{ route('admin.smenatype.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="string" class="form-control" id="name_uz" placeholder="name..." name = "name_uz" value = "{{$smenatype->name_uz}}">
                    </div>
                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="string" class="form-control" id="name_ru" placeholder="name..." name = "name_ru" value = "{{$smenatype->name_ru}}">
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection
