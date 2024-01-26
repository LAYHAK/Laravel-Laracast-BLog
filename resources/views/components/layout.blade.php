<!doctype html>
<html lang="en" class="scroll-smooth ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{$title ?? ""}} </title>
    @vite('resources/css/app.css')
    <link rel="icon" href="/images/lary-avatar.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body style="font-family: Open Sans, sans-serif">

<x-flash/>
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="{{asset('images/logo.svg')}}" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            {{--            @guest()--}}

            {{--            @else--}}

            {{--            @endguest--}}
            @auth()
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs inline-block font-bold uppercase">
                            Welcome, {{auth()->user()->username}}</button>
                    </x-slot>
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">All Posts
                    </x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New
                        Post
                    </x-dropdown-item>
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout').submit()"
                                     class="text-red-500">
                        Log out
                    </x-dropdown-item>
                    <form id="logout" method="POST" action="/logout" class="hidden">
                        @csrf
                        <button type="submit" class="text-xs  text-red-500 font-bold capitalize ml-3">Logout</button>
                    </form>
                </x-dropdown>

            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="text-xs font-bold uppercase ml-3">Login</a>
            @endauth
            {{--            <a href="#newletter"--}}
            {{--               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">--}}
            {{--                Subscribe for Updates--}}
            {{--            </a>--}}
            <x-button url="#newletter" label="Subscribe for Updates"/>
        </div>
    </nav>


    {{$slot}}

    <footer id="newletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-5">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter#newletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>
                        <input id="email" type="text" placeholder="Your email address"
                               name="email" class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">


                        @error('email')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>

                </form>
            </div>
        </div>
    </footer>
</section>

{{--    @yield('content')--}}

{{--{{$content}}--}}
{{-- if we define our oun name we need to use <x-slot:name></x-slot:name> --}}
{{-- this is default name for slot --}}

</body>
</html>
