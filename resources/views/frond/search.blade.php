
@extends('admin.site')
@section('content')

        <!-- Image Header Start-->
        <div class="mainContent withImage">
            <div class="imageHeader" style="padding-bottom: 0px;">
                <div class="container">
                    <h1 class="pageTitle text-dark">{{ ('message.search') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol id="w5" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ ('message.home') }}</a></li>
                            <li class="breadcrumb-item " aria-current="page">{{ __('message.search') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Image Header End -->
<!-- Header End -->

<!-- Main section Start -->
<main>
    <section>
        <div class="search">
            <div class="container mb-4">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Qidiruv..." value="{{ request('query') }}">
                        <button class="btn btn-primary" type="submit">Qidirish</button>
                    </div>
                </form>
            </div>

            <!-- Search Topilmaganda -->
            <div class="container">
                @if(request('query'))
                    @if($posts->isEmpty() && $directors->isEmpty() && $employees->isEmpty())
                        <div class="emptyBox"><i class="fas fa-search"></i>
                            <p>Natijalar topilmadi.</p>
                        </div>
                    @else
                        {{-- Teachers --}}
                        @if($posts->isNotEmpty())
                            <h2>Postlar</h2>
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <a href="#">
                                            <div class="imageBox">
                                                <img src="{{ asset('admin/images/' . $post->image) }}" alt="image" style="width: 200px">
                                            </div>
                                            <h5>{{ $post->title_uz }}</h5>
                                            <p>{{ Str::limit($post->body_uz, 100) }}</p>
                                            <span>{{ $post->category->{'name_' . app()->getLocale()} }} </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Directors --}}
                        @if($directors->isNotEmpty())
                            <h2>Direktorlar</h2>
                            <div class="row">
                                @foreach($directors as $director)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <a href="#">
                                            <div class="imageBox">
                                                <img src="{{ asset('admin/images/' . $director->image) }}" alt="image" style="width: 200px">
                                            </div>
                                            <h5>{{ $director->first_name_uz }} {{ $director->last_name_uz }}</h5>
                                            <span>{{ $director->position->{'name_' . app()->getLocale()} }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif



                        @if($employees->isNotEmpty())
                            <h2>Xodimlar</h2>
                            <div class="row">
                                @foreach($employees as $employee)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <a href="#">
                                            <div class="imageBox">
                                                <img src="{{ asset('admin/images/' . $employee->image) }}" alt="image" style="width: 200px">
                                            </div>
                                            <h5>{{ $employee->name_uz }} {{ $employee->email }}</h5>
                                            <span>{{ $employee->position->{'name_' . app()->getLocale()} }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                @else
                    <div class="emptyBox"><i class="fas fa-search"></i>
                        <p>Iltimos, qidiruv so‘zini kiriting.</p>
                    </div>
                @endif
            </div>


        </div>
    </section>
</main>
<!-- Main section End -->

@endsection