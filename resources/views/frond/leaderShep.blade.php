@extends('admin.site')

@section('content')
    <style>
        .leaderInfo {
            margin-bottom: 60px;
            display: flex;
            align-items: flex-start;
            gap: 40px;
        }
        .leaderInfo a {
            text-decoration: none;
            color: inherit;
            display: flex;
            width: 100%;
        }
        .leaderInfo:hover {
            opacity: 0.9;
            cursor: pointer;
        }
        .leaderInfo .photo {
            width: 40%;
            margin-right: 50px;
            text-align: right;
            max-height: 500px;
        }
        .leaderInfo .photo .frame {
            display: inline-block;
            border: none; /* remove frame */
            padding: 0;
            box-shadow: none;
            border-radius: 0;
        }
        .leaderInfo .photo img {
            width: 500px;
            max-width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }
        .leaderInfo .description {
            flex: 1;
            max-width: 700px;
        }
        .leaderInfo .description .staffTitle {
            font-size: 42px;
            margin-bottom: 28px;
            text-transform: uppercase;
            font-weight: 400;
            line-height: 1.1;
            font-family: sans-serif;
            letter-spacing: 2px;
        }
        .leaderInfo .description .staffTitle div {
            /*display: block;*/
            margin-bottom: 5px;
            color: #000;
        }
        .leaderInfo .description>h2 {
            background: transparent;
            color: #000;
            padding: 0;
            margin: 28px 0 0;
            font-size: 22px;
            font-weight: 500;
            display: inline-block;
            padding-bottom: 8px;
            text-transform: none;
        }
        .leaderInfo .description .role-underline{
            width: 100%;
            height: 2px;
            background:#2a3fcc;
            margin-top: 14px;
            border-radius: 2px;
            margin-left: 0;
        }
        .other-leaders-section .leaderInfo {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        .leadershep_name{
            text-align: left;
            font-size: 36px;
            margin-top: 24px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 2px;
            line-height: 1.1;
        }
        .leadershep_position{
            text-align: left;
            font-size: 20px;
            font-weight: 500;
            margin-top: 24px;
        }
        .other-leaders-section .leaderInfo .photo {
            width: 100%;
            margin-right: 0;
            text-align: left;
        }
        .other-leaders-section .leaderInfo .photo img {
            width: 100%;
            max-width: 280px;
        }
        .other-leaders-section .leaderInfo .description {
            width: 100%;
            text-align: left;
        }
        .other-leaders-section .leaderInfo .description>h2 {
            margin: 24px 0 0;
        }
        @media (max-width:412px) {
            .leaderInfo {
                display: block;
            }
            .leaderInfo .photo {
                width: 100%;
                text-align: center;
                margin-right: 0;
            }
            .leaderInfo .photo img {
                width: 100%;
            }
            .leaderInfo .description .staffTitle {
                font-size: 32px;
                margin: 16px 0 20px;
                letter-spacing: 1px;
            }
            .leaderInfo .description>h2 { font-size: 18px; }
            .leaderInfo .description .role-underline{ width: 100%; }
        }
    </style>

    <main>
        <section>
            <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rahbariyat') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{ __('message.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Rahbariyat') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section>
                <div class="container">
                    <div class="leaderShip">
                        @php
                            $director = $teachers->firstWhere('category.name_uz', 'Direktor');
                            $otherLeaders = $teachers->filter(function($teacher) {
                                return $teacher->category && $teacher->category->name_uz !== 'Direktor';
                            });
                        @endphp
                        @if($director)
                        <div class="container">
                            &#xFEFF;
                            <a href="{{ route('leaderShep.detail', $director->id) }}" class="mainLeader">
                                <img alt="image" src="/admin/images/{{ $director->image }}">
                                <div class="details">
                                    @php
                                        $fullName = $director['name_'. \App::getLocale()];
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

                                    <span>{{ $director->position->{'name_' . \App::getLocale()} ?? __('message.Mudir') }}</span>
                                </div>
                            </a>

                            <div class="leadersList">
                            </div>
                        </div>
                        @endif
{{--                        @if($director)--}}
{{--                            <div class="director-section" style="display: flex; justify-content: center; margin-bottom: 60px;">--}}
{{--                                <a href="{{ route('leaderShep.detail', $director->id) }}" style="text-decoration: none; color: inherit;">--}}
{{--                                    <div class="leaderInfo" style="max-width: 1000px; margin: 0 auto;">--}}
{{--                                        <div class="photo">--}}
{{--                                            <div class="frame">--}}
{{--                                                <img alt="image" src="/admin/images/{{ $director->image }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="description">--}}
{{--                                            @php--}}
{{--                                                $fullName = $director['name_'. \App::getLocale()];--}}
{{--                                                $nameParts = explode(' ', $fullName);--}}
{{--                                                $lastName = $nameParts[0] ?? '';--}}
{{--                                                $firstName = $nameParts[1] ?? '';--}}
{{--                                                $middleName = $nameParts[2] ?? '';--}}
{{--                                            @endphp--}}
{{--                                            <h1 class="staffTitle">--}}
{{--                                                @if($lastName)<div>{{ strtoupper($lastName) }}</div>@endif--}}
{{--                                                @if($firstName)<div>{{ strtoupper($firstName) }}</div>@endif--}}
{{--                                                @if($middleName)<div>{{ strtoupper($middleName) }}</div>@endif--}}
{{--                                            </h1>--}}

{{--                                            <h2>{{ $director->position->{'name_' . \App::getLocale()} ?? __('message.Mudir') }}</h2>--}}
{{--                                            <div class="role-underline"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @if($otherLeaders->count() > 0)--}}
{{--                            <div class="container">--}}
{{--                                @foreach($otherLeaders as $teacher)--}}
{{--                                    &#xFEFF;--}}
{{--                                    <a href="/en/leaders/1" class="mainLeader">--}}
{{--                                        <img alt="image" src="/image/direktor.png">--}}
{{--                                    <div class="details">--}}
{{--                                        <h1><b>Aripova</b><br>Umida<br>Djangirovna</h1>--}}

{{--                                        <span>Director of the school</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                @endforeach--}}
{{--                                <div class="leadersList">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        @if($otherLeaders->count() > 0)
                            <div class="other-leaders-section">
                                <div class="row">
                                    @foreach($otherLeaders as $teacher)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <a href="{{ route('leaderShep.detail', $teacher->id) }}" style="text-decoration: none; color: inherit;">
                                                <div class="leaderInfo" style="margin-bottom: 40px;">
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
                                                        <h1 class="staffTitle leadershep_name">
                                                            @if($lastName)<div>{{ strtoupper($lastName) }}</div>@endif
                                                            @if($firstName)<div>{{ strtoupper($firstName) }}</div>@endif
                                                            @if($middleName)<div>{{ strtoupper($middleName) }}</div>@endif
                                                        </h1>

                                                        <h2 class="leadershep_position">{{ $teacher->position->{'name_' . \App::getLocale()} ?? '' }}</h2>
                                                        <div class="role-underline" style="margin-left:auto; margin-right:auto;"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <hr class="sections__line">
        </section>
    </main>
@endsection
