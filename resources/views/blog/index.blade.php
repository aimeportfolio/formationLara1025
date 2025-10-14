@extends('base')

@section('title', 'Listng des articles')

@section('content')
        @foreach ($posts as $post)
            <article>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <a href="{{ route('blog.show', [$post->slug, $post->id]) }}">Lire la suite</a>
            </article>
        @endforeach
        {{ $posts->links() }}
@endsection