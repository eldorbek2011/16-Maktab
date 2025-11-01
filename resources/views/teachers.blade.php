@extends('admin.site')
@section('content')

    <style>
        /* Umumiy konteyner – GRID bilan 3 ta ustun */
        .categoriesContainer {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 ta karta bir qatorda */
            gap: 40px;
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
            justify-items: center;
        }

        /* Kategoriya kartasi */
        .categoryCard {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            width: 100%;
            max-width: 420px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .categoryCard:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        /* Kategoriya nomi */
        .categoryCard h1 {
            background: #FFC107;
            color: #1a1a1a;
            font-size: 22px;
            font-weight: 700;
            padding: 18px 15px;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 3px solid #e0a800;
        }

        /* O'qituvchi kartasi */
        .teacherCard {
            padding: 25px 20px 20px;
            border-bottom: 1px solid #eee;
        }

        .teacherCard:last-child {
            border-bottom: none;
            padding-bottom: 25px;
        }

        .teacherCard:hover {
            background-color: #fffbe6;
            border-radius: 12px;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        /* Rasm */
        .photo {
            margin-bottom: 18px;
        }

        .photo img {
            width: 180px;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
            border: 4px solid #fff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            background: #FFC107;
        }

        /* Ism va lavozim */
        .description h2 {
            font-size: 19px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 8px 0;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .description .position {
            display: block;
            font-size: 15px;
            color: #0066cc;
            margin-bottom: 12px;
            font-weight: 500;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 6px;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        .description p {
            margin: 8px 0;
            font-size: 14.5px;
            color: #444;
        }

        .description a {
            color: #0066cc;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .description a:hover {
            color: #003366;
            text-decoration: underline;
        }

        /* Responsiv – 2 ta ustun */
        @media (max-width: 992px) {
            .categoriesContainer {
                grid-template-columns: repeat(2, 1fr); /* 2 ta karta */
                gap: 30px;
                padding: 30px 15px;
            }
            .photo img {
                width: 160px;
                height: 200px;
            }
        }

        /* Responsiv – 1 ta ustun */
        @media (max-width: 576px) {
            .categoriesContainer {
                grid-template-columns: 1fr; /* 1 ta karta */
            }
            .categoryCard {
                max-width: 100%;
            }
            .photo img {
                width: 140px;
                height: 180px;
            }
            .description h2 {
                font-size: 17px;
            }
        }
    </style>

    <!-- Header -->
    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.O`qituvchilar') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('message.O`qituvchilar') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Main Content -->
    <main>
        <section>
            <div class="categoriesContainer">

                @foreach($teachers as $categoryName => $teachersGroup)
                    <div class="categoryCard">
                        <h1>{{ $categoryName }}</h1>

                        @foreach($teachersGroup as $teacher)
                            <div class="teacherCard">
                                <div class="photo">
                                    <img src="{{ asset('admin/images/' . $teacher->image) }}" alt="{{ $teacher['name_' . app()->getLocale()] }}">
                                </div>
                                <div class="description">
                                    <h2>{{ $teacher['name_' . app()->getLocale()] }}</h2>
                                    <span class="position">
                                    {{ $teacher->position['name_' . app()->getLocale()] ?? 'Belgilanmagan' }}
                                </span>
                                    <p><strong>Telefon:</strong> <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a></p>
                                    <p><strong>Email:</strong> <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endforeach

            </div>
        </section>
    </main>

@endsection
