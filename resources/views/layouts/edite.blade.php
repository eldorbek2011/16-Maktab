@extends('admin.layouts.app')

@section('content')
<h1>Kategoriya Bolasini Tahrirlash</h1>

<form action="{{ route('admin.categorychildren.update', $children->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name_uz" value="{{ $children->name_uz }}" placeholder="Name UZ" required>
    <input type="text" name="name_ru" value="{{ $children->name_ru }}" placeholder="Name RU" required>

    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $children->category_id ? 'selected' : '' }}>
                {{ $category->name_uz }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-2">Saqlash</button>
</form>
@endsection