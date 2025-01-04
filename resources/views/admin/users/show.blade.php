<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- User Details Card -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md ring-1 ring-gray-200 dark:ring-gray-700">
                <div class="space-y-6">
                    <!-- Username Section -->
                    <div class="flex items-center">
                        <i class="fas fa-user text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Username:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $user->name }}</span>
                    </div>

                    <!-- Email Section -->
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Email Address:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $user->email }}</span>
                    </div>

                    <!-- Role Section -->
                    <div class="flex items-center">
                        <i class="fas fa-user-tag text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Role:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ ucfirst($user->role) }}</span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="mt-6 border-t border-gray-300 dark:border-gray-700"></div>

                <!-- Back Button and Edit Button -->
                <div class="mt-8 flex justify-between space-x-4">
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-all">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Users
                    </a>

                    <a href="{{ route('admin.users.edit', $user->id) }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 transition-all">
                        <i class="fas fa-edit mr-2"></i> Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
