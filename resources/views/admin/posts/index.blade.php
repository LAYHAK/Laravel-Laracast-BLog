<x-layout>
    {{-- write me a sibebar for admin page--}}
    <!-- component -->

    <main class="flex my-5  gap-5  ">
        <x-admin-sidebar/>
        <div class="flex flex-col flex-1 shrink-0">
            <div class="-m-1.5 overflow-x-auto flex flex-col content-between">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden h-screen">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                            <thead>
                            <tr>

                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @if($posts->count()>0)
                                @foreach($posts as $post)

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-800 ">
                                            <a href="/posts/{{$post->slug}}">
                                                {{$post->title}}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-800 ">
                                            Published
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-lg font-medium">
                                            <x-button background="bg-red-500" text="text-gray-50"
                                                      url="/admin/posts/{{$post->id}}/edit" label="Edit"/>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-lg font-medium">
                                            <form method="post" action="/admin/posts/{{$post->id}}"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-xs  text-red-500 font-bold capitalize ml-3">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>


                </div>
            </div>


            <div class="relative bottom-40">
                {{$posts->links()}}
            </div>
            @else
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-800 ">
                        No Posts Yet
                    </td>
                </tr>
            @endif
        </div>


    </main>


</x-layout>
