<?php

namespace App\Http\Controllers;

use \Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
    public function index() {
        $posts = Post::paginate(2);
        return view('blog.index',['posts' => $posts]);
    }

    
    public function show(string $slug, string $id, Request $request): View | RedirectResponse {
        $post = Post::findOrFail($id);
        if($request->slug !== $post->slug) {
            return to_route('blog.show', [$post->slug, $request->id]);
        }
        return view('blog.show', ['post' => $post, 'id' => $id]);
    }
}
