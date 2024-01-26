<?php

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
