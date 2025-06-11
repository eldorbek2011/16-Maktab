@extends('admin.site')
@section('content')

            <!-- Image Header Start-->
            <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rahbariyat batafsil') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{ __('message.home') }}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Rahbariyat batafsil') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
          
    
    <!-- Header End -->

    <!-- Main section Start -->
    <main>
        <section>
            <div class="leaderShip">

                <!-- Rahbariyat Detail -->
                <div class="container">

                    <div class="leaderInfo">
                        @foreach($teachers as $teacher)
                        <div class="photo">
                            <img alt="image" src="/admin/images/{{ $teacher->image }}">
                        </div>

                        <div class="description">
                            <h1 class="staffTitle">{{ $teacher['name_'. \App::getLocale()] }}</h1>

                            <h2>{{__('message.Mudir')}}</h2>

                            <div class="contactInfo">
                                <div>
                                    <i class="far fa-clock"></i>
                                    <span>{{ $teacher->work_time }}</span>
                                </div>

                                <div>
                                    <i class="fas fa-phone-alt"></i>
                                    <a href="tel:998 99 871 25 13">{{ $teacher->phone }}</a>
                                </div>

                                <div>
                                    <i class="far fa-envelope-open"></i>
                                    <a href="mailto:school329@xtv.uz">{{ $teacher->email }}</a>
                                </div>
                            </div>



                            <div class="collapseBox">
                                <a data-toggle="collapse" href="#collapseExample" role="button">{{ __('message.Biografiya') }}</a>

                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <hr class="sections__line">


            </div>
            </div>
        </section>
    </main>
    @endsection

