<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('superviseur.produits.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="marque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Marque</label>
                            <input id="marque" name="marque" type="text" required
                                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                            <select id="type" name="type" required class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                                <option value="interieure">Interieure</option>
                                <option value="exterieur">Exterieur</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="categorie" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categorie</label>
                            <input id="categorie" name="categorie" type="text" required
                                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="gamme" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gamme</label>
                            <input id="gamme" name="gamme" type="text"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="volume" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Volume</label>
                            <input id="volume" name="volume" type="number" step="0.01"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="famille" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Famille</label>
                            <input id="famille" name="famille" type="text" required
                                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                            <input id="photo" name="photo" type="file"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-blue-400">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
