<x-layout>
    <section class="px-6 py-8 min-h-screen">
        <main class="max-w-lg m-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl ">
            <h1 class="my-3 text-4xl font-bold text-center">Log In</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                <div class="space-y-2">
                    <div>
                        <label for="email" class="block mb-2 text-sm">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email"
                               class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-100 dark:text-gray-800"
                               value="{{ old('email') }}"
                        >
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <label for="password" class="text-sm">Password</label>
                        </div>
                        <input type="password" name="password" id="password" placeholder="*****"
                               class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-100 dark:text-gray-800"
                        >
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="space-y-2 my-5">
                    <div>
                        <button type="submit"
                                class="w-full px-8 py-3 font-semibold rounded-md dark:bg-blue-500 dark:text-gray-100">
                            Log In
                        </button>
                        <p class="px-6 text-sm text-center dark:text-gray-400 mt-5">Don't have an account yet?
                            <a href="/register" class="hover:underline dark:text-blue-500">Sign
                                up</a>.
                        </p>
                    </div>
                </div>
            </form>
        </main>
    </section>
</x-layout>
