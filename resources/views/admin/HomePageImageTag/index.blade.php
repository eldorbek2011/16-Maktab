@extends('layouts.adminLayout')
@section('title')
Admin - Kateogry

@endsection
@section('content')

<div class="main-content">
        <section class="section">
            <div class="row">
            <div class="col-md-12">
            <style>
    .main-content {
        margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
        padding: 20px;
    }
</style>

                                    @if (session('success'))
                          <div id="flash-message" class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif

                      <script>

                          setTimeout(function() {
                              var flash = document.getElementById('flash-message');
                              if (flash) {
                                  flash.style.display = 'none';
                              }
                          }, 3000);
                      </script>


                <a href="{{ route('admin.HomePageImageTag.create') }}" class="btn btn-primary">Create</a>
              <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">title_uz</th>
                          <th scope="col">title_ru</th>
                           <th scope="col">body_uz</th>
                            <th scope="col">body_ru</th>
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($HomePageImageTag as $homepage)
                        <tr>
                          <th scope="row">{{ $homepage->id }}</th>
                          <td>{{ $homepage->title_uz }}</td>
                          <td>{{ $homepage->title_ru }}</td>
                           <td>{{ $homepage->body_uz }}</td>
                            <td>{{ $homepage->body_ru }}</td>
                          <td class="d-flex justify-content-center align-items-center">
                            <form action="{{ route('admin.HomePageImageTag.destroy', $homepage->id) }}" method = "POST" >
                              @csrf
                              @method('DELETE')
                              <button class = 'btn btn-danger'>Delete</button>
                            </form>
                             
                          </td>
                        </tr>

                        @endforeach


                      </tbody>
                    </table>
                  </div>
            </div>
              </div>

    </section>
</div>

@endsection
