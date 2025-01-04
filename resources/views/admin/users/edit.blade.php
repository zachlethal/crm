<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifier l\'Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Champ Nom -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 transition-all duration-300 ease-in-out"
                                placeholder="Nom de l'utilisateur" aria-describedby="name-error">
                            @error('name')
                                <span id="name-error" class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Champ Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 transition-all duration-300 ease-in-out"
                                placeholder="Email de l'utilisateur" aria-describedby="email-error">
                            @error('email')
                                <span id="email-error" class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Champ Rôle -->
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rôle</label>
                            <select name="role" id="role"
                                class="w-full mt-2 p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 transition-all duration-300 ease-in-out"
                                aria-describedby="role-error">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superviseur" {{ old('role', $user->role) == 'superviseur' ? 'selected' : '' }}>Superviseur</option>
                            </select>
                            @error('role')
                                <span id="role-error" class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Boutons d'Action -->
                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('admin.users.index') }}"
                                class="px-6 py-3 text-white bg-gray-500 rounded-md hover:bg-gray-600 transition-all ease-in-out duration-300 transform hover:scale-105 focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Annuler
                            </a>
                            <button type="submit"
                                class="px-6 py-3 text-white bg-green-500 rounded-md hover:bg-green-600 transition-all ease-in-out duration-300 transform hover:scale-105 focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
