<x-layout title="All Post">
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count()>0)
            <x-post-grid :posts="$posts"/>
        @else
            <p class="text-center">No Post Yet, Please Check back later!</p>
        @endif
    </main>
</x-layout>
