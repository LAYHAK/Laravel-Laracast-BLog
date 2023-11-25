{{--@extends('layout.main')
@section('title', 'All Posts')
@section('content')
@foreach($posts as $post)
@if($loop->first) @else <hr class="my-6 border-b border-gray-600 "> @endif
<article>
    <h1 class="text-indigo-600 text-3xl">
        <a href="posts/{{$post->slug}}">
        {{ $post->title }}
        </a>
    </h1>
    <p class="text-indigo-50">
        {{ $post->excerpt }}
    </p>
</article>
@endforeach
@endsection--}}



{{--    <x-slot:content>--}}
{{--    @foreach($posts as $post)--}}
{{--        @if($loop->first) @else--}}
{{--            <hr class="my-6 border-b border-gray-600 ">--}}
{{--        @endif--}}
{{--            <article>--}}
{{--                <h1 class="text-indigo-600 text-3xl">--}}
{{--                    <a href="posts/{{$post->slug}}">--}}
{{--                        {{ $post->title }}--}}
{{--                    </a>--}}
{{--                </h1>--}}
{{--                <p class="text-white">--}}
{{--                    By <a href="/author/{{$post->author->username}}" class="text-indigo-500 mt-5">--}}
{{--                        {{ $post->author->username}}--}}
{{--                    </a> in--}}

{{--                    <a href="/categories/{{$post->category->slug}}" class="text-indigo-500 mt-5">--}}
{{--                    {{ $post->category->name }}--}}
{{--                    </a>--}}
{{--                </p>--}}
{{--                <p class="text-indigo-50">--}}
{{--                    {{ $post->excerpt }}--}}
{{--                </p>--}}
{{--            </article>--}}
{{--    @endforeach--}}



<x-layout title="All Post">
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-feature-card/>
        <div class="lg:grid lg:grid-cols-2">
            <x-post-card/>
            <x-post-card/>
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card/>
            <x-post-card/>
            <x-post-card/>
        </div>
    </main>
{{--    </x-slot:content>--}}
</x-layout>
