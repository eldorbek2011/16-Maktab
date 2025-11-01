@extends('admin.site')
@section('content')

    <style>
        .deputy_director-main .deputy_director-details h1 {
            font-weight: 100;
            color: #000;
            text-transform: uppercase;
            font-size: 24px;
            margin-top: 8px;
            line-height: 1.2;
        }
        .deputy_director-main .deputy_director-details h1 div {
            display: block;
            margin-bottom: 3px;
        }
        .deputy_director-main .deputy_director-details span {
            margin-top: 10px;
            display: block;
            color: #000;
            font-size: 16px;
            padding-top: 10px;
            border-top: 2px solid #2a3fcc;
        }
    </style>

    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.O`qituvchilar') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol id="w5" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                        <li class="breadcrumb-item " aria-current="page">{{ __('message.O`qituvchilar') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <main>
        <section>
            <div class="teachers">
                @foreach($teachers as $categoryName => $teachersGroup)
                    <div class="container deputy_director">
                        <h1 class="teachers__title mini mb-4">{{ $categoryName }}</h1>
                        <div class="row">
                        @foreach($teachersGroup as $teacher)
                                @php
                                    $fullName = $teacher['name_'. \App::getLocale()];
                                    $nameParts = explode(' ', $fullName);
                                    $lastName = $nameParts[0] ?? '';
                                    $firstName = $nameParts[1] ?? '';
                                    $middleName = $nameParts[2] ?? '';
                                @endphp
                                <div class="col-lg-4 col-md-3 col-sm-6">
                                    <a href="{{ route('teacher.detail', $teacher->id) }}" class="deputy_director-main">
                                        <div style="background-color: #FFD700; padding: 10px; display: inline-block;">
                                            <img src="{{ asset('admin/images/' . $teacher->image) }}" width="100%" alt="{{ $teacher['name_'.\App::getLocale()] }}" style="display: block;">
                                        </div>
                                        <div class="deputy_director-details">
                                            <h1>
                                                @if($lastName)<div>{{ strtoupper($lastName) }}</div>@endif
                                                @if($firstName)<div>{{ strtoupper($firstName) }}</div>@endif
                                                @if($middleName)<div>{{ strtoupper($middleName) }}</div>@endif
                                            </h1>
                                            <span>{{ $teacher->position->{'name_' . \App::getLocale()} ?? '' }}</span>
                                </div>
                                    </a>
                                </div>
                            @endforeach
                            </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
