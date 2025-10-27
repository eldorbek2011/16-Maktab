@extends('admin.site')

@section('content')
    <style>
        @media (max-width:412px) {
            .mainLeader img { margin-left: 52px; }
            .mainLeader .details h1 {
                font-size: 27px;
                padding-left: 52px;
                margin-bottom: 25px;
            }
            .mainLeader .details span { padding-left: 52px; }
        }
    </style>

    <main>
        <section>
            <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rahbariyat batafsil') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{ __('message.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Rahbariyat batafsil') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section> <div class="container">
                    @foreach($teachers as $teacher)
                        <div class="mainLeader">
                            <img src="{{ asset('admin/images/' . $teacher->image) }}" alt="">
                            <div class="details">
                                <h1>{{ $teacher->name_uz }}</h1>
                                <span>{{ $teacher->position->name_uz ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>

            <hr class="sections__line">
        </section>
    </main>
@endsection
