@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __("message.Infografika") }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __("message.Infografika") }}</li>
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
                    @foreach($infografika as $info) @endforeach
                    <div class="item">
                        <a href="admin/images/{{$info->image}}">
                            <div class="imageBox">
                                <img src="admin/images/{{$info->image}}">
                            </div>
                            <div class="descriptionBox">
                                <h1>{{$info->title_uz}}</h1>
                                <span class="news__date basic-flex">{{ $info->created_at->format('H:i') }}/ {{ $info->created_at->format('d.m.Y') }}</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
