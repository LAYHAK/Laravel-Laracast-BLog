<x-layout title="Publish New post">
    <main class="flex my-5  ">

        <x-admin-sidebar></x-admin-sidebar>
        <x-setting heading="Edit Post ">

            <form method="post" action="/admin/posts/{{$post->id}}" class="space-y-12" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="space-y-4">
                    <x-form.input name="title" :value="old('title',$post->title)"/>
                    <x-form.input name="slug" :value="old('slug',$post->slug)"/>
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"/>
                    <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
                    <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>
                    <section>
                        <x-form.label name="category"/>
                        <select id="category_id" name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @php($categories = \App\Models\Category::all())
                            <option {{old('category_id')}}selected disabled>Choose a category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </section>
                </div>
                <div class="space-y-2">
                    <div>
                        <x-form.submit-button>Update</x-form.submit-button>
                        <x-button background="bg-red-500" url="/" label="go back"/>
                    </div>
                </div>
            </form>
        </x-setting>
    </main>
</x-layout>
