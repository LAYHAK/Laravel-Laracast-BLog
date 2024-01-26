@props(['heading'])
<article class="max-w-lg mx-auto flex-1">


    <div
        class="flex flex-col max-w-md border border-gray-600 p-6 rounded-xl sm:p-10 dark:bg-gray-100 dark:text-gray-900 mt-10">
        <div class=" text-center">
            <h1 class="my-1 text-4xl font-bold capitalize">{{$heading}}</h1>
        </div>

        <div class="flex-1">
            {{$slot}}
        </div>


    </div>
</article>
