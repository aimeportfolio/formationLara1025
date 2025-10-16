<?php

namespace App\Http\Controllers;

use \Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index() {
        //test de validation directement dans les controllers
        $validator = Validator::make([
            'title' => '123',
            'content' => 'Bonjo'
        ],[
            'title' => 'required|string|min:6|max:10',
            'content' => 'required|string|min:2|max:10',
        ]);
        return $validator->validated();

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
