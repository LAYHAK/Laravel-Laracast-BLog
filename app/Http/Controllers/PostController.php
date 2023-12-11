<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //? other way is to use scope query from our Post Model

        return view('posts', [
            'posts' => Post::latest('published_at')->filter(request(['search']))->get(),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
    // one way to make search more clean is to Extract method
    //    public function getPosts()
    //    {
    //        $posts = Post::latest('published_at');
    //        if (request('search')) {
    //            $posts
    //                ->where('title', 'like', '%'.request('search').'%')
    //                ->orWhere('body', 'like', '%'.request('search').'%')
    //                ->orWhere('excerpt', 'like', '%'.request('search').'%')
    //                ->orWhereHas('category', function ($query) {
    //                    $query->where('name', 'like', '%'.request('search').'%');
    //                })
    //                ->orWhereHas('author', function ($query) {
    //                    $query->where('username', 'like', '%'.request('search').'%');
    //                });
    //        }
    //
    //        return $posts->get();
    //    }
}
