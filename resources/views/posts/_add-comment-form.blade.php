@auth()
    <x-panel>
        <form method="post" action="/posts/{{$post->slug}}/comments">
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
            @error('body')
            <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.submit-button>Post</x-form.submit-button>
            </div>

        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login"
                                                                                     class="text-blue-500 hover:underline">Log
            in</a> to leave a comment.
    </p>
@endauth
