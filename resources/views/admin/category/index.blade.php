@extends('layouts.adminLayout')

@section('title', 'Admin - Category')

@section('content')
<style>
    .main-content {
        margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
        padding: 20px;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
</style>

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        const flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>

                {{-- Create Button --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">Category List</h4>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create
                    </a>
                </div>

                {{-- Category Table --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 5%;">#</th>
                                    <th scope="col" style="width: 30%;">Name (Uz)</th>
                                    <th scope="col" style="width: 30%;">Name (Ru)</th>
                                    <th scope="col" style="width: 35%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name_uz }}</td>
                                        <td>{{ $category->name_ru }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Show --}}
                                                <a href="{{ route('admin.category.show', $category->id) }}" 
                                                   class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i> Show
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.category.edit', $category->id) }}" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('admin.category.destroy', $category->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Are you sure you want to delete this category?')" 
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            No categories found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
