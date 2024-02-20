<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return ["name" => "Gipsz Jakab"];
//     return array('One', 'Two', 'Three');
//     return "alma";
// });

Route::get('/', function () {
    $posts = Post::all();
    return view('posts', ['posts' => $posts]);
});

Route::get('/posts/{post}', function ($slug) {
    // $file = resource_path() . '/posts/' . $slug . '.html';
    // // $file = __DIR__ . '/../resources/posts/' . $slug . '.html';

    // if (! file_exists($file))
    // {
    //     return redirect('/');
    //     abort(404);
    //     ddd($file . ' does not exists');
    //     dd($file . ' does not exists');
    // }

    // $post = file_get_contents($file);

    $post = Post::find($slug);
    return view('post', ['post' => $post]);
});