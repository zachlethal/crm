<x-app-layout>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-sidebar />

        <div class="flex-grow py-12">
            <div class="mx-auto w-full max-w-7xl sm:px-6 lg:px-8">
                <!-- Search and Filter Bar -->
                <div class="flex flex-col items-center justify-between p-4 mb-8 bg-white rounded-lg shadow-md sm:flex-row dark:bg-gray-800">
                    <div class="flex items-center w-full space-x-4 sm:w-auto">
                        <input type="text" placeholder="Search by name or address..."
                            class="w-full px-4 py-2 border rounded-lg sm:w-64 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" />
                        <select class="px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                            <option value="">All Types</option>
                            <option value="grossiste">Grossiste</option>
                            <option value="entreprise">Entreprise</option>
                        </select>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('admin.boutiques.create') }}"
                            class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Boutique
                        </a>
                    </div>
                </div>

                <br>

                <!-- Boutiques List -->
                <div id="boutiquesList" class="space-y-6">
                    @foreach($boutiques as $boutique)
                    <div class="relative p-6 transition-transform transform bg-white rounded-lg shadow-md dark:bg-gray-800 hover:scale-105 hover:shadow-xl">
                        <!-- Boutique Info -->
                        <div class="flex items-center justify-between">
                            <!-- Boutique Details -->
                            <div class="space-y-2">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $boutique->nom }}</h3>
                                <p class="text-lg text-gray-700 dark:text-gray-400">{{ __('Téléphone') }}: {{ $boutique->telephone ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Adresse') }}: {{ $boutique->adresse ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Type d\'Achat') }}: {{ $boutique->typeachat ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Type de Boutique') }}: {{ $boutique->typeboutique ?? 'N/A' }}</p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <!-- Voir Button -->
                                <a href="{{ route('admin.boutiques.show', $boutique) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.732 5 12 5c4.268 0 8.268 2.943 9.542 7-1.274 4.057-5.274 7-9.542 7-4.268 0-8.268-2.943-9.542-7zm9.542-3c-.989 0-1.788.791-1.788 1.762S11.013 12 12 12s1.788-.791 1.788-1.762S12.989 9 12 9z" />
                                    </svg>
                                    Voir
                                </a>
                                <!-- Modifier Button -->
                                <a href="{{ route('admin.boutiques.edit', $boutique) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 3l4 4m0 0l-12 12H3v-4L15 3h2z" />
                                    </svg>
                                    Modifier
                                </a>
                                <!-- Supprimer Button -->
                                <button onclick="openModal('{{ route('admin.boutiques.destroy', $boutique) }}')"
                                    class="inline-flex items-center px-4 py-2 text-sm text-red-600 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-800 dark:text-red-300 dark:hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Themed Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-700 dark:text-gray-100 rounded-lg p-8 w-1/3">
            <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Are you sure you want to delete this boutique?</h3>
            <div class="flex justify-end space-x-4">
                <button id="cancelBtn"
                    class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 bg-gray-300 dark:bg-gray-600 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-red-600 dark:bg-red-700 rounded-lg hover:bg-red-700 dark:hover:bg-red-600 focus:outline-none">
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(deleteUrl) {
            const modal = document.getElementById('confirmationModal');
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = deleteUrl;
            modal.classList.remove('hidden');

            document.getElementById('cancelBtn').addEventListener('click', function() {
                modal.classList.add('hidden');
            });
        }
    </script>
</x-app-layout>
