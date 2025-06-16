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
        <div class="news__detail">
            <div class="container">
                <div class="headerArea">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="titleBox">
                                <h1>{{ $post->{'title_' . app()->getLocale()} }}</h1>
                                <span>{{ $post->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="titleBox_img">
                                <img alt="image" src="{{ asset('admin/images/' . $post->image) }}" width="70%">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="news__detail-text">
                    <div class="row">
                        <div class="col-12 text-justify fw-medium">
                            <p>{{ $post->{'body_' . app()->getLocale()} }}</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
</main>
<!-- Main section End -->

@endsection
