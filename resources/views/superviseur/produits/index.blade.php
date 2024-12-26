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
                        <option value="interieure">Interieure</option>
                        <option value="exterieur">Exterieur</option>
                    </select>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('superviseur.produits.create') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Product
                    </a>
                </div>
            </div>

            <!-- Product Grid -->
            <div id="productGrid" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($produits as $produit)
                <div class="relative p-6 transition-transform transform bg-white rounded-lg shadow-md dark:bg-gray-800 hover:scale-105 hover:shadow-xl product-card"
                    data-name="{{ strtolower($produit->name) }}" data-category="{{ strtolower($produit->category) }}"
                    data-type="{{ strtolower($produit->type) }}">
                    <!-- Product Info -->
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $produit->marque }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $produit->category }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs font-medium text-white rounded-full
                                   {{ $produit->type === 'interieure' ? 'bg-blue-500' : 'bg-green-500' }}">
                            {{ ucfirst($produit->type) }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-6 space-x-4">
                        <a href="{{ route('produits.edit', $produit) }}"
                            class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l-4-4m0 0l-4 4m4-4v12" />
                            </svg>
                            Edit
                        </a>
                        <button type="button" onclick="openDeleteModal({{ $produit->id }}, '{{ $produit->marque }}')"
                            class="inline-flex items-center px-4 py-2 text-sm text-red-600 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-800 dark:text-red-300 dark:hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 ,flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Confirm Delete</h3>
            <p id="deleteModalText" class="mt-4 text-sm text-gray-600 dark:text-gray-400"></p>
            <div class="flex justify-end mt-6 space-x-4">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Inline Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const typeFilter = document.getElementById('typeFilter');
            const productCards = document.querySelectorAll('.product-card');

            const filterProducts = () => {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedType = typeFilter.value.toLowerCase();

                productCards.forEach(card => {
                    const name = card.dataset.name;
                    const category = card.dataset.category;
                    const type = card.dataset.type;

                    const matchesSearch = name.includes(searchTerm) || category.includes(searchTerm);
                    const matchesType = !selectedType || type === selectedType;

                    if (matchesSearch && matchesType) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            searchInput.addEventListener('input', filterProducts);
            typeFilter.addEventListener('change', filterProducts);
        });

        function openDeleteModal(productId, productMarque) {
            const modal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const modalText = document.getElementById('deleteModalText');

            deleteForm.action = `/produits/${productId}`;
            modalText.textContent = `Are you sure you want to delete "${productMarque}"?`;
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>