<x-guest-layout>
    <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900">
        <!-- Left Section -->
        <div class="w-1/2 hidden md:flex items-center justify-center bg-blue-200 dark:bg-blue-800">
            <!-- Add your content here (e.g., images, text, etc.) -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Welcome Back!</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Please login to access your account.</p>
            </div>
        </div>

        <!-- Right Section: Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-white dark:bg-gray-800">
            <div class="w-full sm:max-w-md px-6 py-4 shadow-md sm:rounded-lg">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="flex items-center">
        <span class="mr-2">Dark Mode</span>
        <label for="darkModeToggle" class="switch">
            <input id="darkModeToggle" type="checkbox" />
            <span class="slider round"></span>
        </label>
    </div>
    <script>
        const toggle = document.getElementById('darkModeToggle');
        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                document.documentElement.classList.add('dark');
                fetch('/toggle-dark-mode');
            } else {
                document.documentElement.classList.remove('dark');
                fetch('/toggle-dark-mode');
            }
        });
    </script>

</x-guest-layout>
