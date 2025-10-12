<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('blog.index2');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', function (Request $request) {
        
        // Récuperation de deux articles en base de données
        //$post = (new \App\Models\Post())::find(2);

        //Pagination filtre
        //$post = (new \App\Models\Post())::where('id', '>', 2)->limit(1)->get();

        //Modification et sauvegarde
        //$post = (new \App\Models\Post())::find(2);
        //$post->title = 'titre modifié';
        //$post->save();

        return \App\Models\Post::paginate(3);
    })->name('index');

        Route::get('/{slug}-{id}', function (String $slug, String $id, Request $request) {
        $post = \App\Models\Post::findOrFail($id);
        if($request->slug !== $post->slug) {
            return to_route('blog.show', [$post->slug, $request->id]);
        }
        return $post;
    })->where([
        'slug' => '[a-z0-9\-]+',
        'id' => '[0-9]+',
    ])->name('show');
});





