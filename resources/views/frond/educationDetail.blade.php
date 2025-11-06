@extends('admin.site')
@section('content')

<div class="container py-4">
    <h1 class="mb-4">{{ __("message.Ta'lim tafsilotlari") }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $schedule->week_day }}</h5>
{{--            <p><strong>{{ __("message.Vaqti") }}:</strong> {{ $schedule->time }}</p>--}}
            <p><strong>{{ __("message.Rasmlari") }}:</strong></p>
            <div style="max-width: 820px;">
                @foreach($schudeli as $schude)
                    {{-- Rasm yo‘li asset() bilan tuzildi --}}
                    @if($schude->pdf_file)
                        <a href="{{ asset('admin/pdfs/'.$schude->pdf_file) }}" target="_blank" rel="noopener" class="btn btn-info btn-sm" aria-label="Open PDF in new tab">
                            <span style="margin-right:8px; font-weight:600;">{{ $schude->classModel?->name_uz }}</span>
                            {{-- inline svg to avoid external icon dependency --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top:-2px;">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <path d="M14 2v6h6"/>
                                <path d="M9 15h1.5a2.5 2.5 0 0 0 0-5H9v5z"/>
                                <path d="M12.5 15V10"/>
                                <path d="M16 15h2a2 2 0 0 0 0-4h-2v4z"/>
                            </svg>
                            <span style="margin-left:6px;">PDF</span>
                        </a>
                    @else
                        <span class="text-muted">-</span>
                    @endif


                @endforeach
            </div>
            <p><strong>{{ __("message.Smena Turi") }}:</strong>
                {{ optional($schedule->smena)['name_'.App::getLocale()] }}
            </p>
        </div>
    </div>

    <a href="{{ route('education') }}" class="btn btn-secondary mt-3">{{ __("message.Orqaga") }}</a>
</div>

@endsection
