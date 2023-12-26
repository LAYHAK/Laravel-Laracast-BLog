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
    <body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">

                        <a href="{{route('home')}}?author={{$post->author->username}}">
                            <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        </a>
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="{{route('home')}}?author={{$post->author->username}}">{{$post->author->name}}</a>
                            </h5>
                        </div>

                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{route('home')}}"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category"/>

                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {!!$post->title!!}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    <x-panel>
                        <form method="post" action="/">
                            @csrf
                            <header class="flex gap-5 items-center">

                                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="60" height="60"
                                     class="rounded-full">
                                <label for="body">
                                    <h2>Want to Participate?</h2>
                                </label>
                            </header>
                            <textarea name="body" id="body" cols="30" rows="5"
                                      class="w-full text-sm focus:outline-none focus:ring p-5 mt-3"
                                      placeholder="Quick, thing of something to say!"></textarea>
                            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                                <button type="submit"
                                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                    Post
                                </button>
                            </div>

                        </form>
                    </x-panel>
                    @foreach($post->comments as $comment)
                        <x-post-comment :comment="$comment"></x-post-comment>
                    @endforeach
                </section>
            </article>
        </main>
    </section>
    </body>
</x-layout>
