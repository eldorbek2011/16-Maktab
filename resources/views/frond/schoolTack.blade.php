@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Maktab vazifalari') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Maktab vazifalari') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
<main>
    <section>
        <div class="container">
            <div class="mainQuoteBox">
                <div></div>
                <div class="quoteBox">
                    <p>{{ __("message.YangiOzbekiston") }}</p>
                    <span>Shavkat Mirziyoyev</span>
                </div>
            </div>
        </div>

        <div class="ourMissionBig">
            <div class="container">
                <div class="content">
                    <h1 class="greenTitle">{{ __("message.Bizning vazifamiz") }}</h1>
                    <p>{{ __("message.Umumiy") }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <h1 class="greenTitle center">Maktab Tarixi</h1>
            <p class="text-center"><i>Maktabda Bo'lgan Raxbarlar Xaqida Ma'lumotlar</i> <br></p>

            <ul class="tasksListWithTicks">
                <li>Sirdaryo viloyati, sirdaryo tumanidagi 16-umumtalim maktabi 1932-yilda tel’mon nomidagi 19-sonli 7 yillik maktab  tashkil topgan.
                    1937-Yildan To’liqsiz O’rta Maktab Sifatida O’zbek, Tojik, Rus Tillarida  Faoliyat Yuritgan.
                </li>
                <li>Shu kunga qadar Bo’lgan Raxbarlar: <br>
                    1)	Ilk bor Z.X.Isoxarov Direktor Bo’lgan <br>
                    2)	A.M.Nektalov Direktor Bo’lgan <br>
                    3)	R.Ro’ziboev <br>
                    4)	O.Shodiev <br>
                    5)	P.Momedov <br>
                    6)	E.Eshonqulov <br>
                    7)	B.Muxammadiev <br>
                    8)	Sh.Berdiev <br>
                    9)	S.Suyunovlar raxbarlik qilib kelgan <br>
                    Xozirgi kunda I.B.Bekbutaev Raxbarlik qilib kelmoqda.
                </li>
{{--                <li>{{ __("message.Card3") }}</li>--}}
{{--                <li>{{ __("message.Card4") }}</li>--}}
{{--                <li>{{ __("message.Card5") }}</li>--}}
{{--                <li>{{ __("message.Card6") }}</li>--}}
            </ul>
        </div>
        <div class="container">
            <h1 class="greenTitle center">{{ __("message.Funksiya") }}</h1>
            <p class="text-center"><i>{{ __("message.Xalq Talim") }} </i> <br></p>

            <ul class="tasksListWithTicks">
                <li>{{ __("message.Card1") }}</li>
                <li>{{ __("message.Card2") }}</li>
                <li>{{ __("message.Card3") }}</li>
                 <li>{{ __("message.Card4") }}</li>
                 <li>{{ __("message.Card5") }}</li>
                 <li>{{ __("message.Card6") }}</li>
            </ul>
        </div>
    </section>
</main>

@endsection


<!-- Js -->
