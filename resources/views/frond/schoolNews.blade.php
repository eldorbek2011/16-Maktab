@extends('admin.site')
@section('content')

        <!-- Image Header Start-->
        <div class="mainContent withImage">
            <div class="imageHeader" style="padding-bottom: 0px;">
                <div class="container">
                    <h1 class="pageTitle text-dark">{{ __('message.Yangiliklar') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol id="w5" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                            <li class="breadcrumb-item " aria-current="page">{{ __('message.Yangiliklar') }}</li>
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
        <div class="schoolNews">
            <div class="container">
                <div class="navigationTabs">
                    <a href="#" class="active" data-tab="tab1">
                        <i class="fas fa-newspaper"></i> {{ __('message.Yangiliklar') }}
                    </a>
                    <a href="#" class="active" data-tab="tab2">
                        <i class="fas fa-bullhorn"></i> {{ __("message.E'lonlar") }}
                    </a>
                </div>

                <div class="tab-content">
                    <!-- Content for Yangiliklar tab -->
                    <div class="tab-pane fade active show" id="tab1">
                        <div class="imageCardBoxes">
                            <div class="row">

                                @foreach($posts as $post)
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".6s">
                                        <a href="{{ route('newsDetail', $post->id) }}"> <!-- ✅ to‘g‘ri -->


                                            <div class="imageBox">
                                                <img alt="image" src="{{ asset('admin/images/' . $post->image) }}" width="170px">
                                            </div>
                                            <h1>{{ $post->{'body_'. app()->getLocale()} }}</h1>
                                            <span>{{ $post->created_at->format('d M Y') }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<!-- Main section End -->

@endsection
