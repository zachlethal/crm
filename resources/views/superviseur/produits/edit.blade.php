<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('superviseur.produits.update', $produit) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <div class="mb-4">
                                <label for="marque" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Marque</label>
                                <input type="text" name="marque" id="marque" value="{{ old('marque', $produit->marque) }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                @error('marque')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                                <select name="type" id="type"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                    <option value="interieure" {{ $produit->type == 'interieure' ? 'selected' : '' }}>Intérieure</option>
                                    <option value="exterieur" {{ $produit->type == 'exterieur' ? 'selected' : '' }}>Extérieure</option>
                                </select>
                                @error('type')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="categorie" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catégorie</label>
                                <input type="text" name="categorie" id="categorie" value="{{ old('categorie', $produit->categorie) }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                @error('categorie')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="gamme" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gamme</label>
                                <input type="text" name="gamme" id="gamme" value="{{ old('gamme', $produit->gamme) }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                @error('gamme')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="volume" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Volume</label>
                                <input type="number" name="volume" id="volume" value="{{ old('volume', $produit->volume) }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                @error('volume')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="famille" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Famille</label>
                                <input type="text" name="famille" id="famille" value="{{ old('famille', $produit->famille) }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                @error('famille')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                                <input type="file" name="photo" id="photo"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-500">
                                @error('photo')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('superviseur.produits.index') }}"
                                    class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
