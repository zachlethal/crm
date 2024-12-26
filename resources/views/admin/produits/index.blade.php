<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Search and Filter Bar -->
            <div
                class="flex flex-col items-center justify-between p-4 mb-8 bg-white rounded-lg shadow-md sm:flex-row dark:bg-gray-800">
                <div class="flex items-center w-full space-x-4 sm:w-auto">
                    <input type="text" id="searchInput" placeholder="Search by name or category..."
                        class="w-full px-4 py-2 border rounded-lg sm:w-64 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" />
                    <select id="typeFilter"
                        class="px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                        <option value="">All Types</option>
                        <option value="interieure">interieure</option>
                        <option value="exterieur">Exterieur</option>
                    </select>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('admin.produits.create') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Product
                    </a>
                </div>
            </div>
<br>
            <!-- Product Grid -->
            <div id="productGrid" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($produits as $produit)
                <div class="relative p-6 transition-transform transform bg-white rounded-lg shadow-md dark:bg-gray-800 hover:scale-105 hover:shadow-xl product-card"
                    data-name="{{ strtolower($produit->marque) }}" data-category="{{ strtolower($produit->categorie) }}"
                    data-type="{{ strtolower($produit->type) }}">

                    <!-- Product Info -->
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $produit->marque }}</h3>
                        <h4 class="text-lg text-gray-700 dark:text-gray-400">Category: {{ $produit->categorie }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Famille: {{ $produit->famille }}</p>

                        <!-- Voir Button -->
                        <a href="{{ route('admin.produits.show', $produit) }}"
                            class="inline-flex items-center px-4 py-2 mt-4 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12H9m0 0l-3 3m3-3l3-3m6 9a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Voir
                        </a>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.produits.edit', $produit) }}"
                            class="inline-flex items-center px-4 py-2 mt-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 3l4 4m0 0l-12 12H3v-4L15 3h2z" />
                            </svg>
                            Edit
                        </a>
                        <!-- Delete Form -->
                        <form action="{{ route('admin.produits.destroy', $produit) }}" method="POST"
                            class="inline-flex justify-end w-full">
                            @csrf
                            @method('DELETE')
                            <!-- This is the method for the delete action -->
                            <button type="submit"
                                class="inline-flex items-center justify-end w-full px-4 py-2 text-sm text-red-600 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-800 dark:text-red-300 dark:hover:bg-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>



</x-app-layout>
