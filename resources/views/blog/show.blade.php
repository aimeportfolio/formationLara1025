@extends('base')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Créer : {{ $post->created_at->format('d/m/Y à H:i') }} | Modifier : {{ $post->updated_at->format('d-m-Y à H:i') }}</p>
@endsection