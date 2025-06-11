@extends('admin.site')
@section('content')

<div class="mainContent withImage">
    <div class="imageHeader" style="padding-bottom: 0px;">
        <div class="container">
            <h1 class="pageTitle text-dark">{{ __("message.Ta'lim") }}</h1>
            <nav aria-label="breadcrumb">
                <ol id="w5" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ __("message.Ta'lim") }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<main>
    <section>




        <div class="main_tabs" style="padding: 10px 0;">
            <div class="container">

                <div class="serviceTabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($smenaType as $index => $smena)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                   data-toggle="tab"
                                   href="#tab{{ $index + 1 }}"
                                   role="tab"
                                   aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                    {{ $smena['name_'. \App::getLocale()] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content mt-5">
    @foreach($smenaType as $index => $smena)
        <div class="tab-pane fade {{ $index == 0 ? 'active show' : '' }}"
             id="tab{{ $index + 1 }}"
             role="tabpanel">
            <div class="servicesList">
                @foreach($educations->where('smena_id', $smena->id) as $schudel)
                    <a href="{{ route('educationDetail', $schudel->id) }}">
                        <div>
                            <div class="icon">
                                {{-- Rasm yo‘li asset() bilan tuzildi --}}
                               <img alt="icon" src="{{ asset('admin/images/' . $schudel->image) }}" class="img-fluid" width="80" height="80">


                            </div>
                            <span>{{ $schudel->week_day }}</span>
                        </div>
                        <span>{{ $schudel->week_day }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>


            </div>
        </div>
    </section>
</main>
@endsection
