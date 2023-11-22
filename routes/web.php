<?php

use App\Models\Document;
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
Route::get('/', function () {
    return view('posts', [
        'posts' => Document::all(),
    ]);
});

Route::get('/posts/{post}', function ($slug) {
    return view('post', [
        'post' => Document::findOrFail($slug),
    ]);
});
