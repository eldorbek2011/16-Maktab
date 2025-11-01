@extends('admin.site')

@section('content')
    <style>
        .leaderInfo {
            margin-bottom: 60px;
            display: flex;
            align-items: flex-start;
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
        .leaderInfo .photo img {
            width: 80%;
            height: auto;
            object-fit: cover;
        }
        .leaderInfo .description {
            flex: 1;
        }
        .leaderInfo .description .staffTitle {
            font-size: 32px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 100;
            line-height: 1.2;
            font-family: sans-serif;
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
            text-transform: capitalize;
        }
        .other-leaders-section .leaderInfo {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .other-leaders-section .leaderInfo .photo {
            width: 100%;
            margin-right: 0;
            text-align: center;
        }
        .other-leaders-section .leaderInfo .photo img {
            width: 100%;
            max-width: 300px;
        }
        .other-leaders-section .leaderInfo .description {
            width: 100%;
            text-align: center;
        }
        .other-leaders-section .leaderInfo .description>h2 {
            margin: 20px auto 0;
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
                font-size: 22px;
                margin: 20px 0;
            }
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
                            <div class="director-section" style="display: flex; justify-content: center; margin-bottom: 60px;">
                                <a href="{{ route('leaderShep.detail', $director->id) }}" style="text-decoration: none; color: inherit;">
                                    <div class="leaderInfo" style="max-width: 766px; margin: 0 auto;">
                                        <div class="photo">
                                            <img alt="image" src="/admin/images/{{ $director->image }}">
                                        </div>

                                        <div class="description">
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

                                            <h2>{{ $director->position->{'name_' . \App::getLocale()} ?? __('message.Mudir') }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif

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
                                                        <h1 class="staffTitle">
                                                            @if($lastName)<div>{{ strtoupper($lastName) }}</div>@endif
                                                            @if($firstName)<div>{{ strtoupper($firstName) }}</div>@endif
                                                            @if($middleName)<div>{{ strtoupper($middleName) }}</div>@endif
                                                        </h1>

                                                        <h2>{{ $teacher->position->{'name_' . \App::getLocale()} ?? '' }}</h2>
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
