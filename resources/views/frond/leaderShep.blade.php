@extends('admin.site')
@section('content')
<style>
    @media (max-width:412px) {
        .topMain-logo {
            position: absolute;
            top: 14%;
            right: 35%;
            color: black;
        }

        .additionalFuntions {
            position: absolute;
            top: 24%;
            right: 3%;
        }

        .mainLeader {
            display: inline-block;
            width: 0;
        }

        .mainLeader .details {
            padding: 38px 0;
        }

        .mainLeader .details h1 {
            font-size: 27px;
            padding-left: 2px;
            margin-bottom: 25px;
        }

        .mainLeader .details span {
            padding-left: 2px;
        }

        .mainLeader .details span::after {
            top: -25%;
            left: 71%;
        }

        .deputy_director {
            margin-top: 67px;
            padding-left: 94px;
        }

        .mainLeader img {
            margin-left: 52px;
        }

        .mainLeader .details h1 {
            font-size: 27px;
            padding-left: 52px;
            margin-bottom: 25px;
        }

        .mainLeader .details span {
            padding-left: 52px;
        }
    }

    @media (max-width:375px) {
        .mainLeader {
            display: inline-block;
            width: 0;
        }

        .mainLeader .details {
            padding: 38px 0;
        }

        .mainLeader img {
            margin-left: 52px;
        }

        .mainLeader .details h1 {
            font-size: 27px;
            padding-left: 52px;
            margin-bottom: 25px;
        }

        .mainLeader .details span {
            padding-left: 52px;
        }

        .mainLeader .details span::after {
            top: -25%;
            left: 71%;
        }

        .deputy_director {
            margin-top: 67px;
            padding-left: 94px;
        }
    }
</style>

    <main>
        <section>
             <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rahbariyat batafsil') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">{{ __('message.home') }}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Rahbariyat batafsil') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

                <!-- Direktor -->
                @foreach ($teachers as $teacher)
    <div class="container">
        <a href="{{ route('LeaderShepDatail') }}" class="mainLeader">

            <img alt="Director" src="/admin/images/{{ $teacher->image }}">
            <div class="details">
                @php
                    $fullName = $teacher['name_' . \App::getLocale()];
                    $parts = explode(' ', $fullName);
                @endphp

                <h1>
                    <b>
                        @foreach ($parts as $part)
                            {{ $part }}<br>
                        @endforeach
                    </b>
                </h1>

                <span>{{ __('message.Maktab Directori') }}</span>
            </div>
        </a>
    </div>
@endforeach


                <hr class="sections__line">

                <!-- ZAM Direktors -->

            </div>
            </div>
        </section>
    </main>
@endsection
