@props(['post'])
<article
    {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100  border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div>
            <img src="{{asset(($post->thumbnail)?'/storage/'.$post->thumbnail:'/images/illustration-3.png')}}"
                 alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$post->title}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs ">
                            Published <time>{{$post->created_at->diffForHumans()}}</time>
                        </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4 ">

                {!!$post->excerpt!!}

            </div>

            <footer class="flex justify-between items-center mt-8 ">
                <div class="flex items-center text-sm">

                    <a href="?author={{$post->author->username}}">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    </a>

                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="?author={{$post->author->username}}"></a>
                            {{$post->author->username}}
                        </h5>
                    </div>
                </div>

                <div>
                    <x-button url="posts/{{$post->slug}}"
                              background="bg-gray-100 transition-colors"
                              text="text-gray-900 hover:bg-gray-300 hover:text-gray-600"
                              label="Read More"/>
                </div>
            </footer>
        </div>
    </div>

</article>
