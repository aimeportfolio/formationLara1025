<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use \Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create() : View
    {
        $post = new Post();
        return view('blog.create', ['post' => $post]);
    }

    public function store(FormPostRequest $request) : RedirectResponse
    {
        /*Avec Request $request
             $post = Post::create([
            'title' => $request->input('title'),
            'slug' => \Str::slug($request->input('title')),
            'content' => $request->input('content'),
        ]);*/

        $post = Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'Post created!');
    }

    public function edit(Post $post) : View
    {
        return view('blog.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a été bien modifier");
    }

    public function destroy(Post $post)
    {
        dd($post);
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Post supprimé avec succès.');
    }
    

    public function index(): View
    {
        $posts = Post::paginate(4);
        return view('blog.index', ['posts' => $posts]);
    }

    public function show(string $slug, Post $post): View|RedirectResponse
    {
        //dd($post);
        //$post = Post::findOrFail($post);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', ['slug' => $post->slug, 'post' => $post]);
    }
}
