<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.posts.edit', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $attributes = $request->validate(
            [
                'title' => ['required', 'max:255'],
                'slug' => ['required', 'max:255', Rule::unique('posts', 'slug')->ignore($post)],
                'thumbnail' => ['image'],
                'excerpt' => ['required', 'max:255'],
                'body' => ['required', 'min:10', 'max:2000'],
                'category_id' => ['required', 'exists:categories,id'],
            ]
        );
        if (request()->file('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);

        return back()->with('success', 'Your post has been updated');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {

        $attributes = $request->validate(
            [
                'title' => ['required', 'min:4', 'max:255'],
                'slug' => ['required', 'max:255', Rule::unique('posts', 'slug')],
                'thumbnail' => ['required', 'image'],
                'excerpt' => ['required', 'max:255'],
                'body' => ['required', 'min:10', 'max:2000'],
                'category_id' => ['required', 'exists:categories,id'],
            ]
        );
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['published_at'] = now();
        Post::create($attributes);

        return redirect('/')->with('success', 'Your post has been created');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();

        return back()->with('success', 'Your post has been deleted');
    }
}
