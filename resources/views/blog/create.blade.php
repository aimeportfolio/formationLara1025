@extends('base')

@section('title', 'Create un post')

@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="title" value="le titre de l'article"><br>
        <textarea name="content" id="content_id" cols="30" rows="10">Le contenu de l'article</textarea><br>
        <button type="submit">Créer un article</button>
    </form>
@endsection
