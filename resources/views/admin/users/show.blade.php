<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- User Details Card -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-xl ring-1 ring-gray-200 dark:ring-gray-700">
                <div class="flex items-center space-x-6">
                    <!-- Avatar Section -->
                    <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-indigo-600 flex items-center justify-center bg-indigo-100">
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="User Avatar" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-3xl text-indigo-600"></i> <!-- Default Person Icon -->
                        @endif
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">{{ $user->name }}</h3>
                        <p class="text-lg text-gray-700 dark:text-gray-400 flex items-center">
                            <i class="fas fa-envelope text-indigo-600 mr-2"></i>{{ $user->email }}
                        </p>
                        <p class="text-lg text-gray-700 dark:text-gray-400 flex items-center">
                            <i class="fas fa-user-tag text-indigo-600 mr-2"></i>
                            <span class="font-semibold text-indigo-600">Role:</span> {{ ucfirst($user->role) }}
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="mt-6 border-t border-gray-300 dark:border-gray-700"></div>

                <!-- Back Button and Edit Button -->
                <div class="mt-8 flex justify-between">
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-lg focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Users
                    </a>

                    <a href="{{ route('admin.users.edit', $user->id) }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 transition-all duration-300 ease-in-out">
                        <i class="fas fa-edit mr-2"></i> Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
