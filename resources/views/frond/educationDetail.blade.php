@extends('admin.site')
@section('content')

<div class="container py-4">
    <h1 class="mb-4">{{ __("message.Ta'lim tafsilotlari") }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $schedule->week_day }}</h5>
            <p><strong>{{ __("message.Vaqti") }}:</strong> {{ $schedule->time }}</p>
            <p><strong>{{ __("message.Rasmlari") }}:</strong>
              <img src="{{ asset('admin/images/' . $schedule->image) }}" alt="Rasm" style="width: 600px; height: 600px;">

            </p>
            <p><strong>{{ __("message.Smena Turi") }}:</strong>
                {{ optional($schedule->smena)['name_'.App::getLocale()] }}
            </p>
        </div>
    </div>

    <a href="{{ route('education') }}" class="btn btn-secondary mt-3">{{ __("message.Orqaga") }}</a>
</div>

@endsection
