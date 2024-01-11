<?php

use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

//? to see the query that is being executed
//*   DB::listen(function ($query) {
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
Route::post('newsletter', NewslettersController::class);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

//Route::get('/ping', function () {
//    $mailchimp = new \MailchimpMarketing\ApiClient();
//
//    $mailchimp->setConfig([
//        'apiKey' => config('services.mailchimp.key'),
//        'server' => 'us21',
//    ]);
//    $response = $mailchimp->lists->getAllLists();
//    ddd($response);
//});
//Route::get('/categories/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts' => $category->posts,
//        'currentCategory' => $category, // 'currentCategory' => $category->name, // 'currentCategory' => $categor
//        'categories' => Category::all(),
//    ]);
//})->name('category');

//Route::get('/author/{author:username}', function (User $author) {
//    return view('posts.index', [
//        'posts' => $author->posts,
//    ]);
//});

// Route::get('/posts/{post}', function ($slug) {
//     return view('post', [
//         'post' => Post::find($slug),
//     ]);
