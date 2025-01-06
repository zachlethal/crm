<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Détails du Produit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <!-- Product Details -->
                <h3 class="text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $produit->marque }}</h3>
                <div class="mt-6 flex flex-col sm:flex-row space-y-6 sm:space-y-0 sm:space-x-8">
                    <!-- Text Section -->
                    <div class="flex-1 space-y-4">
                        <p class="text-lg text-gray-600 dark:text-gray-400">Type:
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ ucfirst($produit->type) }}</span>
                        </p>
                        <p class="text-lg text-gray-600 dark:text-gray-400">Catégorie:
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $produit->categorie }}</span>
                        </p>
                        <p class="text-lg text-gray-600 dark:text-gray-400">Gamme:
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $produit->gamme ?? 'N/A' }}</span>
                        </p>
                        <p class="text-lg text-gray-600 dark:text-gray-400">Volume:
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $produit->volume ?? 'N/A' }} ml</span>
                        </p>
                        <p class="text-lg text-gray-600 dark:text-gray-400">Famille:
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $produit->famille }}</span>
                        </p>
                    </div>

                    <!-- Image Section -->
                    @if ($produit->photo)
                        <div class="flex-shrink-0 w-full sm:w-48 h-48 relative">
                            <strong class="text-lg text-gray-900 dark:text-gray-100">Photo:</strong>
                            <img src="{{ Storage::url($produit->photo) }}" alt="Photo du produit"
                                class="object-contain w-full h-full rounded-lg shadow-md">
                        </div>
                    @else
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Aucune photo disponible.</p>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="mt-8">
                    <a href="{{ route('superviseur.produits.index') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-lg shadow-md focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        Retour à la liste des produits
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
