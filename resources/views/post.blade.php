{{--@extends('layout.main')--}}
{{--@section('title', $post->title)--}}
{{--@section('content')--}}

{{--<article class="pb-16 border-b border-gray-600">--}}
{{--    <h1 class="text-indigo-600 text-3xl">--}}
{{--        {{ $post->title }}--}}
{{--    </h1>--}}
{{--        {!!  $post->body!!}--}}
{{--    <a class="text-indigo-600" href="/">Go Back</a>--}}
{{--</article>--}}

{{--@endsection--}}



<x-layout title="{{$post->title}}">
    <article class="pb-16 border-b border-gray-600">
        <h1 class="text-indigo-600 text-3xl">
            {{ $post->title }}
        </h1>
        <p class="text-white">
            By <a href="/author/{{ $post->author->username}}" class="text-indigo-500 mt-5">
                {{ $post->author->username}}
            </a> in
            <a href="/categories/{{$post->category->slug}}" class="text-indigo-500 mt-5">
            {{ $post->category->name }}
        </p>
        <p class="text-indigo-50">{{$post->body}}</p>

        <a class="text-indigo-600" href="/">Go Back</a>
    </article>
</x-layout>
