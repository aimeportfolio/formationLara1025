@extends('base'),
<!-- resources/views/posts/confirm-delete.blade.php -->

<div>
    <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
    <form action="{{ route('blog.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</div>
