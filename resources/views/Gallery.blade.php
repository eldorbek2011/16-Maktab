@extends('admin.site')
@section('content')

    <style>
        /* Umumiy konteyner – 3 ta ustun */
        .galleryContainer {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Har bir galereya kartasi */
        .galleryCard {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
        }

        .galleryCard:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.18);
        }

        .galleryCard img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-bottom: 4px solid #007BFF;
        }

        /* Pastki qism – matn */
        .cardContent {
            padding: 18px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #003399;
            color: white;
        }

        .cardContent h3 {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 8px;
            line-height: 1.4;
            color: #fff;
        }

        .cardContent .date {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 500;
        }

        /* "Foto" yozuvi – yashil */
        .fotoLabel {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #00C853;
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 200, 83, 0.3);
            z-index: 2;
        }

        /* Raqam – ko‘k */
        .numberBadge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #007BFF;
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 700;
            box-shadow: 0 3px 8px rgba(0, 123, 255, 0.3);
            z-index: 2;
        }

        /* Sarlavha */
        .gallery_title {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 30px;
            text-transform: uppercase;
            letter-spacing: 1.8px;
        }

        .gallery_title::after {
            content: '';
            display: block;
            width: 90px;
            height: 4px;
            background: #007BFF;
            margin: 15px auto 0;
            border-radius: 2px;
        }

        /* Responsiv */
        @media (max-width: 992px) {
            .galleryContainer {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .galleryContainer {
                grid-template-columns: 1fr;
                padding: 30px 15px;
                gap: 25px;
            }
            .galleryCard img {
                height: 220px;
            }
            .numberBadge, .fotoLabel {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }
            .fotoLabel {
                padding: 5px 12px;
                font-size: 13px;
            }
        }
    </style>

    <!-- Header -->
    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __("message.Maktab Galereyasi") }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __("message.Maktab Galereyasi") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <section>
            <div class="container">
                <h1 class="gallery_title">{{ __('message.Maktab Galereyasi') }}</h1>


                <div class="galleryContainer">
                    @foreach($gallery as $galler)
                        @php
                            $number = $loop->iteration;
                        @endphp

                        <div class="galleryCard">
                            <div class="numberBadge">{{ $number }}</div>
                            <div class="fotoLabel">{{ __('message.Foto') }}</div>

                            <img src="{{ asset('admin/images/' . $galler->image) }}" alt="{{ $galler->title_uz }}">

                            <div class="cardContent">
                                <h3>{{ $galler->title_uz }}</h3>
                                <div class="date">
                                    {{ \Carbon\Carbon::parse($galler->created_at)->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

@endsection
