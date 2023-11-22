{{--@extends('layout.main')--}}
{{--@section('title', 'All Posts')--}}
{{--@section('content')--}}
{{--@foreach($posts as $post)--}}
{{--@if($loop->first) @else <hr class="my-6 border-b border-gray-600 "> @endif--}}
{{--<article>--}}
{{--    <h1 class="text-indigo-600 text-3xl">--}}
{{--        <a href="posts/{{$post->slug}}">--}}
{{--        {{ $post->title }}--}}
{{--        </a>--}}
{{--    </h1>--}}
{{--    <p class="text-indigo-50">--}}
{{--        {{ $post->excerpt }}--}}
{{--    </p>--}}
{{--</article>--}}
{{--@endforeach--}}
{{--@endsection--}}

<x-layout title="All Post">
{{--    <x-slot:content>--}}
    @foreach($posts as $post)
        @if($loop->first) @else
            <hr class="my-6 border-b border-gray-600 ">
        @endif
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
{{--    </x-slot:content>--}}
</x-layout>
