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
        <div class="schoolGallery">
            <div class="container">
                <h1 class="gallery_title">{{__('message.Maktab Galereyasi')}}</h1>
                <div class="row">
                    @foreach($gallery as $galler)
                    <div class="col-6">
                        <img src="admin/images/{{$galler->image}}" alt="Img" width="500px" height="300px">
                        <h4>
                            {{ $galler->title_uz }}

                        </h4>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
