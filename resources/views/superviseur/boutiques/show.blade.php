<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">
            {{ __('Boutique Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Store Details Card -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md ring-1 ring-gray-200 dark:ring-gray-700">
                <div class="space-y-6">
                    <!-- Store Name Section -->
                    <div class="flex items-center">
                        <i class="fas fa-store text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Store Name:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $boutique->nom }}</span>
                    </div>

                    <!-- Address Section -->
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Address:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $boutique->adresse ?? 'N/A' }}</span>
                    </div>

                    <!-- Phone Section -->
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Phone:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $boutique->telephone ?? 'N/A' }}</span>
                    </div>

                    <!-- Cart Section -->
                    <div class="flex items-center">
                        <i class="fas fa-shopping-cart text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Cart:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $boutique->cart ?? 'N/A' }}</span>
                    </div>

                    <!-- Purchase Type Section -->
                    <div class="flex items-center">
                        <i class="fas fa-credit-card text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Purchase Type:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $boutique->typeachat ?? 'N/A' }}</span>
                    </div>

                    <!-- Store Type Section -->
                    <div class="flex items-center">
                        <i class="fas fa-store text-indigo-600 mr-3"></i>
                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Store Type:</span>
                        <span class="ml-2 text-lg text-gray-700 dark:text-gray-400">{{ $boutique->typeboutique ?? 'N/A' }}</span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="mt-6 border-t border-gray-300 dark:border-gray-700"></div>

                <!-- Back to List Button -->
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('superviseur.boutiques.index') }}" class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition duration-300 transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m7-7l-7 7 7 7" />
                        </svg>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
