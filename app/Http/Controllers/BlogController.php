<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use \Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    public function index() : View{
        $posts = Post::paginate(2);
        return view('blog.index',['posts' => $posts]);
    }


    public function show(Post $post, Request $request): View | RedirectResponse {
        // avec le model binding on recupere exactement ce qu'il nous faut en injectant Post aussi
        // dans la Request on a accès aux élements ci-dessous
        dd($request->post->created_at->format('d-m-Y'));

        /*if($post->slug !== $slug) {
            return to_route('blog.show', [$post->slug, $request->post]);
        }*/
        return view('blog.show', ['post' => $post]);
    }
}
