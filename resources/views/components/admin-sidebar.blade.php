<div
    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[calc(100vh-2rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
    <div class="mb-2 p-4">
        <h5 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-gray-900">
            Lists</h5>
    </div>
    <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">
        <x-sidebar-item href="/admin/posts" :active="request()->is('admin/posts')">All Posts</x-sidebar-item>
        <x-sidebar-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post
        </x-sidebar-item>


    </nav>
</div>
