<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// to see the query that is being executed
//    DB::listen(function ($query) {
//        logger($query->sql, $query->bindings);
//    });

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
    return view('posts', [
        'posts' => Post::latest('published_at')->get(),
        'categories' => Category::all(),
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {//Post::where('slug',$post)->firstOrFail()
    return view('post', [
        'post' => $post,
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category, // 'currentCategory' => $category->name, // 'currentCategory' => $categor
        'categories' => Category::all(),
    ]);
});
Route::get('/author/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
    ]);
});
// Route::get('/posts/{post}', function ($slug) {
//     return view('post', [
//         'post' => Post::find($slug),
//     ]);
