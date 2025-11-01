@extends('admin.site')
@section('content')
<style>
    .leaderInfo .description .staffTitle {
        font-size: 32px;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 100;
        line-height: 1.2;
    }
    .leaderInfo .description .staffTitle div {
        display: block;
        margin-bottom: 5px;
        color: #000;
    }
    .leaderInfo .description>h2 {
        background: transparent;
        color: #000;
        padding: 0;
        margin: 20px 0;
        font-size: 25px;
        font-weight: normal;
        border-bottom: 2px solid #2a3fcc;
        display: inline-block;
        padding-bottom: 10px;
    }
</style>

    <!-- Image Header Start-->
    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.O`qituvchi batafsil') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol id="w5" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">{{ __('message.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('teachers') }}">{{ __('message.O`qituvchilar') }}</a></li>
                        <li class="breadcrumb-item " aria-current="page">{{ __('message.O`qituvchi batafsil') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Header End -->

    <!-- Main section Start -->
    <main>
        <section>
            <div class="leaderShip">

                <!-- O'qituvchi Detail -->
                <div class="container">

                    <div class="leaderInfo">
                        <div class="photo">
                            <img alt="image" src="/admin/images/{{ $teacher->image }}">
                        </div>

                        <div class="description">
                            @php
                                $fullName = $teacher['name_'. \App::getLocale()];
                                $nameParts = explode(' ', $fullName);
                                $lastName = $nameParts[0] ?? '';
                                $firstName = $nameParts[1] ?? '';
                                $middleName = $nameParts[2] ?? '';
                            @endphp
                            <h1 class="staffTitle">
                                @if($lastName)<div>{{ strtoupper($lastName) }}</div>@endif
                                @if($firstName)<div>{{ strtoupper($firstName) }}</div>@endif
                                @if($middleName)<div>{{ strtoupper($middleName) }}</div>@endif
                            </h1>

                            <h2>{{ $teacher->position->{'name_' . \App::getLocale()} ?? '' }}</h2>

                            <div class="contactInfo">
                                @if($teacher->work_time)
                                <div>
                                    <i class="far fa-clock"></i>
                                    <span>{{ $teacher->work_time }}</span>
                                </div>
                                @endif

                                @if($teacher->phone)
                                <div>
                                    <i class="fas fa-phone-alt"></i>
                                    <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a>
                                </div>
                                @endif

                                @if($teacher->email)
                                <div>
                                    <i class="far fa-envelope-open"></i>
                                    <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a>
                                </div>
                                @endif
                            </div>

                            @if($teacher->biography)
                            <div class="collapseBox">
                                <a data-toggle="collapse" href="#collapseExample" role="button">{{ __('message.Biografiya') }}</a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        {{ $teacher->biography }}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <hr class="sections__line">


            </div>
            </div>
        </section>
    </main>
@endsection

