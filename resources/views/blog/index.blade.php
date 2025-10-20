@extends('base')

@section('title', 'Listng des articles')

@section('content')
    <div class="container d-md-flex justify-content-md-end">
        <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary">New</a>
    </div>
    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Lire la suite</a>
        </article>
    @endforeach
    {{ $posts->links() }}
@endsection
