@extends('admin.site')
@section('content')
    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.useful_resources') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol id="w5" class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}">{{ __('message.home') }}</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ __('message.useful_resources') }}

                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <main>
        <section>
            <div class="useful-links">
                <div class="container">

                    <div class="projectsList">
                        @foreach ($usefulresource as $usefulresourc)
                            <a class="item"
                                href="{{ route('useful-resources.detail', ['resource' => $usefulresourc->id]) }}">
                                <img alt="logo" src="{{ asset('admin/images/' . $usefulresourc->image) }}">
                                <div class="description">
                                    <h1>{{ $usefulresourc['title_' . app()->getLocale()] }}</h1>
                                    <h3>{{ $usefulresourc['body_' . app()->getLocale()] }}</h3>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
