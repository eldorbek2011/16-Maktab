@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __("message.Yangiliklar") }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __("message.Yangiliklar") }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
<main>
    <section>
        <div class="schoolNews d-flex justify-between">
            <div class="container">
                <div class="navigationTabs">
    <a href="{{ route('schoolNews') }}" class="tab-link active" data-tab="tab1">
        <i class="fas fa-newspaper"></i> {{ __('message.Yangiliklar') }}
    </a>
    <a href="{{ route('schoolNews') }}" class="tab-link" data-tab="tab2">
        <i class="fas fa-bullhorn"></i>
        {{ __('message.E`lonlar') }}
    </a>
</div>

<script>
    const tabLinks = document.querySelectorAll('.tab-link');

    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // remove active from all
            tabLinks.forEach(l => l.classList.remove('active'));

            // add active to clicked one
            this.classList.add('active');
        });
    });
</script>


                <div class="tab-content">
                    <!-- Content for Yangiliklar tab -->
                    @foreach($posts as $post)
                    <div class="tab-pane fade active show" id="tab1">
                        <div class="imageCardBoxes">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <a href="">
                                        <div class="imageBox">
                                            <img alt="image" src="admin/images/{{$post->image}}">
                                        </div>
                                        <h1>
                                            {!! \Illuminate\Support\Str::limit($post['body_uz']) !!}
                                        </h1>
                                        <span class="news__date basic-flex">{{ $post->created_at->format('H:i') }}/ {{ $post->created_at->format('d.m.Y') }}</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Content for E'lonlar tab -->

                </div>

            </div>
        </div>
    </section>
</main>
@endsection
