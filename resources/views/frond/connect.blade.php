@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __("message.Bog'lanish") }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __("message.Bog'lanish") }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
<main>
    <section>
        <div class="connect">
            <div class="container">
                <!--Map Section Start  -->
                <div class="mapArea">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6131044.44664104!2d64.608575!3d41.381166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38b20750bb92946b%3A0x54012c9057e544c8!2s11-%20umumiy%20o%CA%BBrta%20ta%CA%BClim%20maktabi!5e0!3m2!1sru!2s!4v1694608189347!5m2!1sru!2s"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <!--Map Section End  -->

                <hr class="sections__line mt-5">

                <!-- Contact Section Start -->
                <div class="contact">
                    <h1 class="text-center text-uppercase mb-5 title title_map">{{ __('message.Biz bilan Boglaning') }}</h1>
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
            </div>
        </div>
    </section>
</main>
@endsection
