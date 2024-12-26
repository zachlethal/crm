<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('superviseur.produits.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                            <input id="marque" name="marque" type="text" required
                                class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="type" required class="w-full mt-1 border-gray-300 rounded-md">
                                <option value="interieure">Interieure</option>
                                <option value="exterieur">Exterieur</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="categorie" class="block text-sm font-medium text-gray-700">Categorie</label>
                            <input id="categorie" name="categorie" type="text" required
                                class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="gamme" class="block text-sm font-medium text-gray-700">Gamme</label>
                            <input id="gamme" name="gamme" type="text" class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                            <input id="volume" name="volume" type="number" step="0.01"
                                class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="famille" class="block text-sm font-medium text-gray-700">Famille</label>
                            <input id="famille" name="famille" type="text" required
                                class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input id="photo" name="photo" type="file" class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>