<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return Post::paginate(3);
    }

    
    public function show(string $slug, string $id, Request $request){
        $post = Post::findOrFail($id);
        if($request->slug !== $post->slug) {
            return to_route('blog.show', [$post->slug, $request->id]);
        }
        return $post;
    }
}
