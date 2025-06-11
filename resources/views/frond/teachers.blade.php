@extends('admin.site')
@section('content')


    <style>
        .categoriesContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            padding: 20px;
        }

        .categoryCard {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            flex: 1 1 400px; /* kartalar 400px dan kichik bo‘lmasin, lekin joyga qarab kengaysin */
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .categoryCard h1 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2c3e50;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 8px;
        }

        .teacherCard {
            display: flex;
            gap: 15px;
            align-items: center;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.03);
            background-color: #fafafa;
            transition: box-shadow 0.3s ease;
        }

        .teacherCard:hover {
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .photo img {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #ccc;
        }

        .description h2 {
            margin: 0 0 8px 0;
            font-size: 20px;
            color: #333;
        }

        .description p {
            margin: 3px 0;
            color: #555;
            font-size: 15px;
        }

        .description a {
            color: #007BFF;
            text-decoration: none;
        }

        .description a:hover {
            text-decoration: underline;
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
            <div class="categoriesContainer">

                @foreach($teachers as $categoryName => $teachersGroup)
                    <div class="categoryCard">
                        <h1>{{ $categoryName }}</h1>

                        @foreach($teachersGroup as $teacher)
                            <div class="teacherCard">
                                <div class="photo">
                                    <img alt="image" src="{{ asset('admin/images/' . $teacher->image) }}">
                                </div>
                                <div class="description">
                                    <h2>{{ $teacher['name_'.\App::getLocale()] }}</h2>
                                    <p>Lavozimi: {{ $teacher->position['name_'.\App::getLocale()] ?? 'Belgilanmagan' }}</p>
                                    <p>Telefon: <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a></p>
                                    <p>Email: <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endforeach

            </div>
        </section>
    </main>
@endsection
