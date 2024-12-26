<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $user->name }}</h3>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Email: {{ $user->email }}</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Role: {{ ucfirst($user->role) }}</p>
                <!-- Add other user details here -->
                <div class="mt-6">
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        Back to Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>