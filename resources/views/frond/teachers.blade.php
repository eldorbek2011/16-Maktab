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
            /*display: block;*/
            margin-bottom: 3p   x;
            font-size: 36px;
            font-weight: 500;
        }
        .deputy_director-main .deputy_director-details span {
            margin-top: 10px;
            display: block;
            color: #000;
            font-size: 16px;
            padding-top: 10px;
            border-top: 2px solid #2a3fcc;
        }
        .empcategory{
            text-align: left;
        }
        .teachers_name{
            text-align: left;
            align-items: center;
            font-size: 36px;
        }
    </style>

    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.O`qituvchilar') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol id="w5" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ __('message.O`qituvchilar') }}</li>
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
                        @if(count($teachersGroup) > 0)
                            {{-- Har bir kategoriyaga bir marta sarlavha chiqariladi --}}
                            <h1 class="teachers__title mini mb-4">
                                {{ $teachersGroup[0]->position->{'name_' . \App::getLocale()} ?? '' }}
                            </h1>
                        @endif

                        <div class="row">
                            @foreach($teachersGroup as $teacher)
                                @php
                                    $fullName = $teacher['name_'. \App::getLocale()];
                                    $nameParts = explode(' ', $fullName);
                                    $lastName = $nameParts[0] ?? '';
                                    $firstName = $nameParts[1] ?? '';
                                    $middleName = $nameParts[2] ?? '';
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                    <a href="{{ route('teacher.detail', $teacher->id) }}" class="deputy_director-main d-block text-center text-decoration-none">
                                        <div style="background-color: #FFD700; padding: 10px;">
                                            <img src="{{ asset('admin/images/' . $teacher->image) }}" width="100%" alt="{{ $fullName }}" style="display:block;">
                                        </div>
                                        <div class="deputy_director-details">
                                            <h1 class="teachers_name">
                                                @if($lastName)<div>{{ strtoupper($lastName) }}</div>@endif
                                                @if($firstName)<div>{{ strtoupper($firstName) }}</div>@endif
                                                @if($middleName)<div>{{ strtoupper($middleName) }}</div>@endif
                                            </h1>
{{--                                            --}}{{-- 🔹 O‘qituvchining lavozimi --}}
{{--                                            <span>{{ $teacher->position->{'name_' . \App::getLocale()} ?? '' }}</span>--}}

                                            {{-- 🔹 Kategoriya (masalan: O‘qituvchi, Rahbariyat va h.k.) --}}
                                            <span class="empcategory">{{ $teacher->category->{'name_' . \App::getLocale()} ?? '' }}</span>
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
