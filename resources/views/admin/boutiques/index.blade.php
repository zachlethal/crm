<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Manage Boutiques') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Search and Filter Bar -->
            <div
                class="flex flex-col items-center justify-between p-4 mb-8 bg-white rounded-lg shadow-md sm:flex-row dark:bg-gray-800">
                <div class="flex items-center w-full space-x-4 sm:w-auto">
                    <input type="text" placeholder="Search by name or location..."
                        class="w-full px-4 py-2 border rounded-lg sm:w-64 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" />
                    <select
                        class="px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
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
            <!-- Boutiques Grid -->
            <div id="boutiquesGrid" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($boutiques as $boutique)
                <div
                    class="relative p-6 transition-transform transform bg-white rounded-lg shadow-md dark:bg-gray-800 hover:scale-105 hover:shadow-xl">
                    <!-- Boutique Info -->
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $boutique->nom }}</h3>
                        <p class="text-lg text-gray-700 dark:text-gray-400">{{ __('Téléphone') }}: {{
                            $boutique->telephone }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Adresse') }}: {{ $boutique->adresse
                            }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Type d\'Achat') }}: {{
                            $boutique->type_achat }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Type de Boutique') }}: {{
                            $boutique->type_boutique }}</p>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.boutiques.show', $boutique) }}"
                                class="inline-flex items-center px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                Voir
                            </a>
                            <a href="{{ route('admin.boutiques.edit', $boutique) }}"
                                class="inline-flex items-center px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                Modifier
                            </a>
                            <form action="{{ route('admin.boutiques.destroy', $boutique) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm text-red-600 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-800 dark:text-red-300 dark:hover:bg-red-700">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
