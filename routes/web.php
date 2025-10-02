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

Route::prefix('blog')->name('monblog.')->group(function () {
    Route::get('/', function (Request $request) {
        return [
            "link" => \route('monblog.show', ['slug' => 'mon-article-spéciale', 'id' => 12]),
        ];
    })->name('index');

    Route::get('/{slug}-{id}', function (String $slug, String $id, Request $request) {
        return [
            "slug" => $slug,
            "id" => $id,
            //"prenom" => $request->all()["prenom"],
            "prenom" => $request->input('prenom', 'Aimé TOSSOU'),
        ];
    })->where([
        'slug' => '[a-z0-9\-]+',
        'id' => '[0-9]+',
    ])->name('show');
});





