@extends('base')

@section('title', 'Create un post')

@section('content')
    <form action="" method="post" class="form-group">
        @csrf
        <div class="mb-2">
            <input class="form-control" type="text" name="title" value="{{ old('title', 'Mon titre') }}">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-2">
            <input class="form-control" type="text" name="slug" value="{{ old('slug', 'mon-slug') }}">
            @error('slug')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-2">
            <textarea class="form-control" name="content" id="content_id" cols="30" rows="5">{{ old('content', 'Le contenu de l\'article') }}</textarea>
            @error('content')
                {{ $message }}
            @enderror
        </div>
        <button class="btn btn-sm btn-primary mb-5" type="submit">Créer un nouvel article</button>
    </form>
@endsection
