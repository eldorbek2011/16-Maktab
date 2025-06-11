@extends('admin.site')
@section('content')
<style>
    .deputy_director-card {
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    transition: transform 0.2s;
}

.deputy_director-card:hover {
    transform: scale(1.05);
}

.deputy_director-image img {
    width: 100%;
    height: 150px; /* balandligini moslab o‘zgartir */
    object-fit: cover;
}

.deputy_director-info {
    padding: 10px;
    text-align: center;
}

.deputy_director-info h1 {
    font-size: 18px;
    margin: 5px 0;
}

.deputy_director-info span {
    font-size: 14px;
    color: #666;
}

</style>
    <!-- Main section Start -->
     <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Mudir') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Mudir') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
    <main>
        <section>
            <div class="leaderShip">
                <!-- Rahbariyat Detail -->
               
               <div class="container deputy_director">
    <div class="row">
        @foreach($teachers as $teacher)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="deputy_director-card">
                <div class="deputy_director-image">
                    <a href="{{route('LeaderShepDatail')}}" class="deputy_director-main">
                    <img src="/admin/images/{{ $teacher->image }}" alt="Zam Director">
                </div>
                <div class="deputy_director-info">
                    <h1>{{ $teacher['name_'.\App::getLocale()] }}</h1>
                    <span>{{ __('message.Mudir') }}</span>
                </div>
</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


                <hr class="sections__line">
            </div>
        </section>
    </main>
@endsection
<!-- Main section End -->
