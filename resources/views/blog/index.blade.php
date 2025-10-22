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
            <a type="button" class="btn btn-sm btn-primary" href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Voir</a>
            <a type="button" class="btn btn-sm btn-secondary" href="{{ route('blog.edit', ['post' => $post->id]) }}">Modifier</a>
            
            <form style="display:inline-block;" action="{{ route('blog.delete', $post->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer le post : {{ $post->title }}?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
            </form>        
        </article>
    @endforeach
    {{ $posts->links() }}
@endsection
