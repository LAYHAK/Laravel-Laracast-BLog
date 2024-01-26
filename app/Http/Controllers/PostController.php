<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        //? other way is to use scope query from our Post Model
        return view('posts.index', [
            'posts' => Post::latest('published_at')
                ->filter(request(
                    ['search', 'category']
                ))->Paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    //show use for show data
    //create use for create data
    //store use for store data to database
    //edit use for edit data
    //update use for update data
}
// one way to make search more clean is to Extract method
// public function getPosts()
// {
// $posts = Post::latest('published_at');
// if (request('search')) {
// $posts
// ->where('title', 'like', '%'.request('search').'%')
// ->orWhere('body', 'like', '%'.request('search').'%')
// ->orWhere('excerpt', 'like', '%'.request('search').'%')
// ->orWhereHas('category', function ($query) { $query->where('name', 'like', '%'.request('search').'%'); })
// ->orWhereHas('author', function ($query) { $query->where('username', 'like', '%'.request('search').'%'); });
// } return $posts->get(); }
// }
