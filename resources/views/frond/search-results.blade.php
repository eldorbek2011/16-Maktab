@extends('admin.site')

@section('title', 'Qidiruv natijalari')

@section('content')

    <div class="container mt-4">

        <h2>Qidiruv natijalari: "{{ $query }}"</h2>

        @if($posts->count())
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                        <p>{{ Str::limit($post->content, 150) }}</p>
                    </li>
                @endforeach
            </ul>

            {{ $posts->withQueryString()->links() }}

        @else
            <p>Natija topilmadi.</p>
        @endif
    </div>
@endsection
