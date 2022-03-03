<x-guest-layout>

    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
            src="{{asset('images/login-office.jpeg')}}" alt="Office" />
        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
            src="{{asset('images/login-office-dark.jpeg')}}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Login
            </h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input type="email" name="email" value="{{old('email')}}" required autofocus
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Email" />
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Password</span>
                    <input type="password" name="password" required autocomplete="current-password"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Password" />
                </label>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-700 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button type="submit"
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Log in
                </button>
            </form>

            @if (Route::has('password.request'))
            <p class="mt-4">
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </p>
            @endif
        </div>
    </div>
</x-guest-layout>