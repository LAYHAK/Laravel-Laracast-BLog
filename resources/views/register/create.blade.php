{{--? create form--}}
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <div
                class="flex flex-col max-w-md border border-gray-600 p-6 rounded-xl sm:p-10 dark:bg-gray-100 dark:text-gray-900 mt-10">
                <div class=" text-center">
                    <h1 class="my-1 text-4xl font-bold">Sign up</h1>
                </div>
                <form method="post" action="/register" class="space-y-12">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm">Name</label>
                            <input name="name" id="name" placeholder="Enter your username"
                                   class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-100 dark:text-gray-800"
                                   value="{{ old('name') }}"
                            >
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm">Username</label>
                            <input name="username" id="username" placeholder="Enter your username"
                                   class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-100 dark:text-gray-800"
                                   value="{{ old('username') }}"
                            >
                            @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
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
                                <a href="#"
                                   class="text-xs hover:underline dark:text-gray-700">Forgot password?</a>
                            </div>
                            <input type="password" name="password" id="password" placeholder="*****"
                                   class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-100 dark:text-gray-800"
                            >
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <button type="submit"
                                    class="w-full px-8 py-3 font-semibold rounded-md dark:bg-blue-500 dark:text-gray-100">
                                Sign up
                            </button>
                            <p class="px-6 text-sm text-center dark:text-gray-400 mt-5">Already have an account?
                                <a href="/login" class="hover:underline dark:text-blue-500">Sign
                                    in</a>.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </section>
</x-layout>
