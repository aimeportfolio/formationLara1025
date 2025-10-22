
<form action="" method="post" class="form-group">
    @csrf
    <div class="mb-2">
        <input class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-2">
        <input class="form-control" type="text" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-2">
        <textarea class="form-control" name="content" id="content_id" cols="30" rows="5">{{ old('content', $post->content) }}</textarea>
        @error('content')
            {{ $message }}
        @enderror
    </div>
    <button class="btn btn-sm btn-primary mb-5" type="submit">
        @if ($post->id)
            Modifier un article
        @else
            Créer un article
        @endif
    </button>
</form>