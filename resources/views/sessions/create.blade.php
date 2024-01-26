<x-layout>
    <section class="px-6 py-8 min-h-screen">
        <main class="max-w-lg m-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl ">
            <h1 class="my-3 text-4xl font-bold text-center">Log In</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                <div class="space-y-2">
                    <x-form.input name="email" type="email" placeholder="example@gmail.com" autocomplete="username"/>
                    <x-form.input name="password" type="password" placeholder="******" autocomplete="new-password"/>
                </div>
                <div class="space-y-2 my-5">
                    <x-form.submit-button add-more-style="w-full mt-5">Log In</x-form.submit-button>
                    <p class="px-6 text-sm text-center dark:text-gray-400 mt-5">Don't have an account yet?
                        <a href="/register" class="hover:underline dark:text-blue-500">Sign
                            up</a>.
                    </p>
                </div>
            </form>
        </main>
    </section>
</x-layout>
