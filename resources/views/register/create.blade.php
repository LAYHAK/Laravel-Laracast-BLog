{{--* Create Register Form--}}
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <section
                class="flex flex-col max-w-md border border-gray-600 p-6 rounded-xl sm:p-10 dark:bg-gray-100 dark:text-gray-900 mt-10">
                <article class=" text-center">
                    <h1 class="my-1 text-4xl font-bold">Sign up</h1>
                </article>
                <form method="post" action="/register" class="space-y-12">
                    @csrf
                    <div class="space-y-4">
                        <x-form.input name="name" placeholder="Enter your name"/>
                        <x-form.input name="username" placeholder="Enter your username"/>
                        <x-form.input name="email" type="email" placeholder="Enter your email" autocomplete="user"/>
                        <x-form.input name="password" type="password" placeholder="******" autocomplete="new-password"/>
                        <x-form.input name="confirmPassword" type="password" placeholder="******"
                                      autocomplete="new-password"/>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <x-form.submit-button add-more-style="w-full ">Register</x-form.submit-button>
                            <p class="px-6 text-sm text-center dark:text-gray-400 mt-5">Already have an account?
                                <a href="/login" class="hover:underline dark:text-blue-500">Sign
                                    in</a>.
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </section>
</x-layout>
