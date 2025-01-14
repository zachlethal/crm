<x-app-layout>

    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Dashboard</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Welcome to your dashboard! Here is where your content will go.
            </p>

            <!-- Placeholder Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-2 text-gray-800 dark:text-gray-100">Card Title 1</h2>
                    <p class="text-gray-600 dark:text-gray-400">This is some placeholder content for the first card.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-2 text-gray-800 dark:text-gray-100">Card Title 2</h2>
                    <p class="text-gray-600 dark:text-gray-400">This is some placeholder content for the second card.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-2 text-gray-800 dark:text-gray-100">Card Title 3</h2>
                    <p class="text-gray-600 dark:text-gray-400">This is some placeholder content for the third card.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dark Mode Toggle -->
    <x-dark-mode-toggle />
</x-app-layout>
