@extends('admin.site')



@section('content')

<div class="bigBannerContent" style="background-image: url('image/329-maktab.jpg');">
    <div class="bannerContent">
        <div class="container-fluid">
            <div class="row">
                <div class="logoTextBox">
                    <div class="col-12">
                                       @if(isset($HomePageImageTag))
    @foreach($HomePageImageTag as $homePage)
        <div class="quote text-center">
            <h2>{!! __("message.school1") !!}</h2>
            <p>{{ $homePage['body_' . app()->getLocale()] }}</p>
            <span>Shavkat Mirziyoyev</span>
        </div>
    @endforeach
@endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main>
    <section>
        <div class="container">
            <!-- Service List Start -->
            <div class="mainServicesList">
                <!-- Birinchi blok -->
                <a href="{{ route('education') }}">
                    <div class="icon">
                        <img alt="icon" src="image/oquvchi.png" width="45%" style="margin-left: 60px;">
                    </div>
                    <h1>{{ __('message.Oquvchilar') }}</h1>
                    <div class="description">
                        @foreach($schedule as $schudel)
                        <p>{{ $schudel->week_day}}</p>
                       @endforeach
                    </div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
                <!-- Ikkinchi blok -->
                <a href="#">
                    <div class="icon">
                        <img alt="icon" src="image/Ota-ona.png" width="45%" style="margin-left: 75px;">
                    </div>
                    <h1>{{ __('message.OtaOnalar') }}</h1>
                    <div class="description"></div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
                <!-- Uchinchi blok -->
                <a href="#">
                    <div class="icon">
                        <img alt="icon" src="image/oqtuvchi.png" width="45%" style="margin-left: 80px;">
                    </div>
                    <h1>{{ __('message.Oqituvchilar') }}</h1>
                    <div class="description"></div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
            </div>
            <!-- Service List End -->

            <!-- School Info Start -->
            @if(isset($statictik) && count($statictik))
    <div class="row">
        <h1 class="text-center text-uppercase mt-5 title">{{ __('message.Maktab Haqida Qisqacha') }}</h1>
        @foreach($statictik as $stat)
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->classesCount }}</h2>
                    <p>{{ __('message.Sinflar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->studentsCount }}</h2>
                    <p>{{ __('message.O`quvchilar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->teachersCount }}</h2>
                    <p>{{ __('message.O`qituvchilar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->graduatesCount }}</h2>
                    <p>{{ __('message.Bituruvchilar Soni') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Statistika ma'lumotlari mavjud emas.</p>
@endif
            <!-- School Info End -->

            <hr class="sections__line">

            <!-- Online School Come Start -->
            <div class="onlineSchool">
                <div class="row">
                    <div class="col-lg-6 col-md-12 text-md-center d-md-inline-block d-flex align-items-center">
                        <div class="onlineSchool__info">
                            <h1>{{ __('message.Agar siz maktabgabora olmasangiz,maktab sizning uyingizga borishi mumkin.') }}</h1>
                            <p>{{ __("message.Maktab.uz - bu xalqaro standartlarga javob beradigan va maktab o'quvchilari uchun yuqori sifatli uzluksiz masofaviy ta'limni ta'minlaydigan ilg'or raqamli ta'lim texnologiyasi.") }}</p>
                            <button class="btns" type="button">{{ __('message.Batafsil') }}</button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="onlineSchool__img">
                            <img src="image/onlineSchool2.png" width="75%" alt="OnlineSchool">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Online School Come End -->

            <hr class="sections__line">

            <!-- Section News Start -->
            <div class="news">
                <div class="row mb-4">
                   @if(isset($posts) && count($posts))
    <div class="row mb-4">
        @foreach($posts as $post)
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('newsDetail', $post->id)}}">
            <div class="imageBox">
                <img alt="image" src="admin/images/{{ $post->image }}" width="170px">
            </div>
            <h1>{{ \Illuminate\Support\Str::limit($post['body_' . app()->getLocale()], 100) }}</h1>
            <span class="news__date">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
        </a>
    </div>
@endforeach

    </div>
@else
    <p>Yangiliklar mavjud emas.</p>
@endif
                </div>
            </div>
            <!-- Section News End -->

            <hr class="sections__line mt-0">

            <!--Map Section Start-->
            <div class="mapArea">
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6131044.44664104!2d64.608575!3d41.381166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38b20750bb92946b%3A0x54012c9057e544c8!2s11-%20umumiy%20o%CA%BBrta%20ta%CA%BClim%20maktabi!5e0!3m2!1sru!2s!4v1694608189347!5m2!1sru!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!--Map Section End-->

            <hr class="sections__line mt-5">

            <!-- Contact Section Start -->
            <div class="contact">
                <h1 class="text-center text-uppercase mb-5">{{ __('message.Biz bilan Boglaning') }}</h1>
                 <div class="row">
                        <div class="col-md-7">
                            <form action="{{ route('SendEmail') }}" method="POST">
                                @csrf
                                <div class="row contact_row1">
                                    <div class="col-lg-6">
                                    <input type="text" placeholder="{{ __('message.I.F.SH') }}" name="name">
                                </div>
                                    <div class="col-lg-6">
                                    <input type="email" placeholder="{{ __('message.Email') }}" name="email">
                                </div>
                                </div>
                                <div class="row contact_row2">
                                     <div class="col-lg-6">
                                    <input type="text"  placeholder="{{ __('message.+998') }}" name="phone">
                                </div>
                                    <div class="col-lg-6">
                                    <input type="text" placeholder="{{ __('message.Mavzu') }}" name="mavzu">
                                </div>
                                </div>
                                <div class="row contact_row3">
                                    <div class="col-12">
                                    <input type="text" placeholder="{{ __('message.Xabarlar') }}" name="message">
                                    <button type="submit" class="contact_btn">{{ __('message.Yuborish') }}</button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <h2 class="mb-3">{{ __('message.27mak') }}</h2>

                            <table id="w9" class="table table-striped table-bordered detail-view">
                                <tbody>
                                <tr>
                                    <th>{{ __('message.Mudir') }}:</th>
                                    <td>Jalolv Behruz</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.Telefon') }}:</th>
                                    <td>+99891-191-84-48</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.Faks') }}:</th>
                                    <td>+99891-191-84-48</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.instagram') }}:</th>
                                    <td>@27-maktab</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.telegram') }}:</th>
                                    <td>@27-maktab</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <!-- Contact Section End -->

            <hr class="sections__line mt-5">

            <!-- Useful Links Start -->
            <div class="usefulLinks">
                <div class="container">
                <h1 class="mb-5">{{ __('message.Foydali resurslar') }}</h1>
                <div class="slider">
                      <a href="#">
                                <div class="slider_content">
                                    <img src="image/gerb_slider.jpg" width="10%" alt="Image 1">
                                    <h1>{{ __('message.Ozbekistona Davlat Maktab 1') }}</h1>
                                </div>
                            </a>






                </div>

            </div>
            <!-- Useful Links End -->

        </div>
    </section>
</main>

@endsection
