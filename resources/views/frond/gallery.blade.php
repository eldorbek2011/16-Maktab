@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __("message.Maktab Galereyasi") }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __("message.Maktab Galereyasi") }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
<main>
    <section>
        <div class="infografika">
            <div class="container">
                <div class="infografika_content">
                    @foreach($gallery as $galler)
                        <div class="item">
                            <a href="{{ asset('admin/images/' . $galler->image) }}">
                                <div class="imageBox">
                                    <img src="{{ asset('admin/images/' . $galler->image) }}">
                                </div>
                                <div class="descriptionBox">
                                    <h1>{{ $galler->title_uz }}</h1>
                                    <span class="news__date basic-flex">{{ $galler->created_at->format('H:i') }} / {{ $galler     ->created_at->format('d.m.Y') }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
</main>
@endsection
