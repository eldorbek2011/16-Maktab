<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">




    <!-- Font awesome style -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body>
    <!-- Header Start -->
    <header>
        <div class="bannerBox">
            <div class="headerBar">
                <div class="topMainMenu">
                    <a href="/" class="topMain-logo">
                        <img src="image/Gerb.png" alt="Logo" width="8%">
                        @if (App::getLocale() == 'uz')
                            <p>27-sonli umumta'lim maktabi</p>
                        @elseif(App::getLocale() == 'ru')
                            <p>27-я общеобразовательная школа</p>
                        @endif
                    </a>
                    <ul>
                        @foreach ($categoryTop as $categorytop)
                            <li>
                                <a href="https://vacancy.argos.uz/">{{ $categorytop['name_' . App::getLocale()] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Search form: kategoriya bo'yicha qidirish uchun -->
                    <div class="additionalFuntions">

                        <!-- Masalan: searchBtn tugmasidan pastroqqa joylashtiring -->
                        <form action="{{ route('search.posts') }}" method="GET"
                            class="d-flex align-items-center gap-2" role="search">
                            <div class="input-group" style="max-width: 400px;">
                                <span class="input-group-text bg-white">
                                    <i class="fas fa-eye text-primary"></i>
                                </span>
                                <input type="text" name="query" value="{{ request('query') }}" class="form-control"
                                    aria-label="Search">
                            </div>
                            <button type="submit" class="btn btn-primary d-flex align-items-center">
                                <i class="fas fa-search me-1"></i> {{ __('message.Qidirish') }}
                            </button>
                        </form>




                        <!-- Qidiruv formasi (dastlab yashiringan) -->


                    </div>

                </div>
                <div class="container">
                    <div class="headerMenuBox">
                        <div class="bigMenuBtn">
                            <button type="button" class="borderedBtn">
                                <div class="menuBars"></div>
                            </button>
                            <div class="overlay">
                                <div class="container">
                                    <div class="topLogoGerb">
                                        <img src="image/Gerb.png" alt="Logo" width="13%">
                                    </div>
                                    <div class="listMenu">
                                        <ul>
                                            <li><a href="{{ route('schooltack') }}">Maktab haqida</a>
                                                <ul>
                                                    <li><a href="{{ route('schooltack') }}">{{ __('message.message.about_school') }}</a></li>
                                                    <li><a href="{{ route('leaderShep') }}">{{ __('message.Mudir') }}</a></li>
                                                    <li><a href="{{ route('teachers') }}">{{ __('message.Oqituvchilar') }}</a></li>
                                                    <li><a href="{{ route('rekvizit') }}">{{ __('message.Rekvizitlar') }}</a></li>
                                                </ul>
                                            <li><a href="{{ route('education') }}">{{ __("message.Ta'lim") }}</a>
                                                <ul>
                                                    <li><a href="{{ route('education') }}">{{ __('message.1smena') }}</a></li>

                                                </ul>
                                            <li class="overlay_li-social"><a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a>
                                                <ul>
                                                    <li><a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a></li>
                                                    <li><a href="{{ route('Gallery') }}">{{ __('message.Galeriya') }}</a></li>
                                                    <li><a href="{{ route('infoGrafika') }}">{{ __('message.Infografika') }}</a></li>
                                                </ul>
                                        </ul>
                                        <ul class="simple">
                                            <li><a href="{{ route('usefulresurs') }}">{{ __('message.Boglanish') }}</a></li>
                                            <li><a href="{{ route('connect') }}">{{ __('message.Boglanish') }}</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mainMenuBox">
                            <div class="menuList">
                                <div class="menuLine"></div>
                                <div class="bottomMainMenu">
                                      <ul class="menu">
                                        <li>
                                           <a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a>

                                            <ul class="menu_ul-li">
                                                <li>
                                                    <a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a href="{{ route('leaderShep') }}">{{ __('message.Mudir') }}</a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a href="{{ route('teachers') }}">{{ __('message.Oqituvchilar') }}</a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a href="{{ route('rekvizit') }}">{{ __('message.Rekvizitlar') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('education') }}">{{ __("message.Ta'lim") }} </a>
                                            <ul class="menu_ul-li">
                                                <li>
                                                    <a href="{{ route('education') }}">{{ __("message.1smena") }}</a>
                                                </li>
                                                <hr>

                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('usefulresurs') }}">{{ __("message.useful_resources") }} </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }} </a>
                                            <ul class="menu_ul-li">
                                                <li>
                                                    <a href="{{ route('schoolNews') }}">{{ __('message.Maktab yangiliklari') }}</a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a href="{{ route('Gallery') }}">{{ __('message.Galeriya') }}</a>
                                                </li>
                                                <hr>
                                                <li>
                                                    <a href="{{ route('infoGrafika') }}">{{ __('message.Infografika') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('connect') }}">{{ __('message.Boglanish') }} </a>
                                        </li>
                                    </ul>
                                </div>
                                <form class="mainSearchForm" action="search.html" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Izlash"
                                            name="ContentSearch">
                                        <div class="input-group-prepend">
                                            <button class="btn __searchBtn closeBtn" type="button">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="dropdown langBar">
                                    @if (session('lang') == 'uz')
                                        <span>O'z</span>
                                        <a href="{{ url('/lang/ru') }}">Русский</a>
                                    @else
                                        <span>Русский</span>
                                        <a href="{{ url('/lang/uz') }}">O'zbekcha</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>


    <!-- Footer Start -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <ul class="footer_menu">
                        <li><a href="https://vacancy.argos.uz/">{{ __('message.BoshIshOrinlari') }}</a></li>
                        <li><a href="schoolRules.html">{{ __('message.Maktab qonun qoidalari') }}</a></li>
                        <li><a href="FAQ.html">{{ __('message.Tez-tez beriladigan savollar') }}</a></li>
                        <li><a href="stateSymbols.html">{{ __('message.Davlat ramzlari') }}</a></li>
                    </ul>
                </div>
                <div class="footer_contact-left">
                    <a href="https://instagram.com/_behruz__14_o1"><i class="fab fa-instagram"></i>
                        <span>{{ __('message.27-maktab') }}</span></a>
                    <a href="https://mail.google.com/behruzjalolov13@gmail.com"><i class="fas fa-envelope"></i>
                        <span>{{ __('message.27-maktab') }}.com</span></a>
                </div>
                <div class="footer_contact-right">
                    <a href="https://facebook.com/Behruz"><i class="fab fa-facebook-f"></i>
                        <span>{{ __('message.27-maktab') }}</span></a>
                    <a href="https://telegram.org/JalolovB"><i class="fab fa-telegram-plane"></i>
                        <span>{{ __('message.27-maktab') }} </span></a>
                </div>
                <div class="footer_logo">
                    <span><img src="./image/Gerb.png" alt="Logo" width="20%"></span>
                    @if (App::getLocale() == 'uz')
                        <a href="">27-sonli Umumta'lim maktabi <i>Sirdaryo, Guliston tumani</i></a>
                    @elseif(App::getLocale() == 'ru')
                        <a href="">Средняя школа № 27 <i>Сырдарья, Гулистанский район</i></a>
                    @endif

                </div>
                <a href="#" class="it_live-logo">
                    <img src="./image/It live logo for red-04-04.png" alt="IT_Live" class="it_live-img">
                </a>
                <span class="year_text">© {{ __('message.2025-2030 Barcha huquqlar himoyalangan') }}</span>
            </div>
        </div>
    </footer>

    <!-- Js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('/js/wow.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>
