<!doctype html>
<html lang="en" class="scroll-smooth dark">
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

        <div class="mt-8 md:mt-0">
            {{--            @guest()--}}

            {{--            @else--}}

            {{--            @endguest--}}
            @auth()
                <p class="text-xs inline-block font-bold uppercase">Welcome, {{auth()->user()->username}}</p>
                <form method="POST" action="/logout" class="inline-block">
                    @csrf
                    <button type="submit" class="text-xs  text-red-500 font-bold capitalize ml-3">Logout</button>
                </form>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="text-xs font-bold uppercase ml-3">Login</a>
            @endauth
            <a href="#newletter"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>


    {{$slot}}
    <label class="swap swap-rotate">

        <!-- this hidden checkbox controls the state -->
        <input type="checkbox" class="theme-controller" value="dark"/>

        <!-- sun icon -->
        <svg class="swap-on fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
        </svg>

        <!-- moon icon -->
        <svg class="swap-off fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/>
        </svg>

    </label>

    <footer id="newletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
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
