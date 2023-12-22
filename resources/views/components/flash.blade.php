@if(session()->has('success'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(()=> show = false, 4000)"
        x-show="show"
        class="fixed top-24  right-5 flex shadow-md gap-6 rounded-lg overflow-hidden divide-x max-w-2xl dark:bg-green-400 dark:text-gray-100 dark:divide-gray-100">
        <div class="flex flex-1 flex-col p-4 border-l-8 dark:border-green-400">
            <span class="text-2xl">Success</span>
            <span class="text-xs dark:text-gray-100">{{session('success')}}</span>
        </div>
        <button
            @click="show = false"
            class="px-4 flex items-center text-xs uppercase tracki dark:text-gray-100 dark:border-gray-100">
            Dismiss
        </button>
    </div>
@endif
