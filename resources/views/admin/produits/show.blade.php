<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Produit Détails') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Afficher les détails du produit -->
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $produit->marque }}</h3>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Type: {{ ucfirst($produit->type) }}</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Catégorie: {{ $produit->categorie }}</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Gamme: {{ $produit->gamme ?? 'N/A' }}</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Volume: {{ $produit->volume ?? 'N/A' }} L</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Famille: {{ $produit->famille }}</p>

                <!-- Afficher la photo si elle existe -->
                @if ($produit->photo)
                <div class="mt-4">
                    <strong>Photo:</strong>
                    <img src="{{ Storage::url($produit->photo) }}" alt="Photo du produit"
                        class="object-cover w-48 h-48 rounded-lg shadow-md">
                </div>
                @else
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Aucune photo disponible.</p>
                @endif

                <div class="mt-6">
                    <a href="{{ route('admin.produits.index') }}"
                        class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        Retour à la liste des produits
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>