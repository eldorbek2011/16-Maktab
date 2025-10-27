@extends('admin.layouts.app')

@section('content')
<h1>Kategoriya Bolalari Ro‘yxati</h1>

<a href="{{ route('admin.categorychildren.create') }}" class="btn btn-success mb-3">Yangi qo‘shish</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nomi (UZ)</th>
            <th>Nomi (RU)</th>
            <th>Asosiy Kategoriya</th>
            <th>Amallar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($childrens as $child)
            <tr>
                <td>{{ $child->id }}</td>
                <td>{{ $child->name_uz }}</td>
                <td>{{ $child->name_ru }}</td>
                <td>{{ $child->category->name_uz ?? 'Kategoriya yo‘q' }}</td>
                <td>
                    <a href="{{ route('admin.categorychildren.edit', $child->id) }}"
                        class="btn btn-primary btn-sm">Tahrirlash</a>
                    <form action="{{ route('admin.categorychildren.destroy', $child->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Ishonchingiz komilmi?')"
                            class="btn btn-danger btn-sm">O‘chirish</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection