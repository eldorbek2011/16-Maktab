@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rekvizitlar') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Rekvizitlar') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
<main>
    <section>
        <div class="container">
            <div class="page_content mb-5 mt-5"><b></b>
                <p></p>
                <p><strong>{{ __("message.Federal byudjet daromadiga mablag' o'tkazish uchun Bosh daromad ma'muri sifatida Vazirlikning rekvizitlari:") }}</strong></p>

                <p>{{ __("message.Qabul qiluvchi: mintaqalararo operatsion UFK (O'zbekiston Respublikasi  Xalq ta'limi vazirligi)") }}</p>

                <p>{{ __('message.INN: 9710062939') }}</p>

                <p>{{ __('message.KPP: 771001001') }}</p>

                <p>{{ __('message.Bank nomi: Aloqabank, Toshkent') }}</p>

                <p>{{ __('message.BIK: 24501901') }}</p>

                <p>{{ __('message.Hisob') }}</p>
                <p></p>
            </div>
        </div>
    </section>
</main>





@endsection
