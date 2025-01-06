<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Edit Boutique') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form action="{{ route('superviseur.boutiques.update', $boutique) }}" method="POST" class="space-y-6 p-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $boutique->name) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required />
                    @error('name')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Location Field -->
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $boutique->location) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required />
                    @error('location')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Cart Field -->
                <div class="mb-4">
                    <label for="cart" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cart</label>
                    <input type="text" id="cart" name="cart" value="{{ old('cart', $boutique->cart) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required />
                    @error('cart')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Type Achat Field -->
                <div class="mb-4">
                    <label for="typeachat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type Achat</label>
                    <select id="typeachat" name="typeachat"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>
                        <option value="GRO" {{ old('typeachat', $boutique->typeachat) == 'GRO' ? 'selected' : '' }}>GRO</option>
                        <option value="DDS" {{ old('typeachat', $boutique->typeachat) == 'DDS' ? 'selected' : '' }}>DDS</option>
                        <option value="MIX" {{ old('typeachat', $boutique->typeachat) == 'MIX' ? 'selected' : '' }}>MIX</option>
                    </select>
                    @error('typeachat')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Type Boutique Field -->
                <div class="mb-4">
                    <label for="typeboutique" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type Boutique</label>
                    <select id="typeboutique" name="typeboutique"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>
                        <option value="GMS" {{ old('typeboutique', $boutique->typeboutique) == 'GMS' ? 'selected' : '' }}>GMS</option>
                        <option value="Taba cosmitique" {{ old('typeboutique', $boutique->typeboutique) == 'Taba cosmitique' ? 'selected' : '' }}>Taba cosmitique</option>
                        <option value="cosmitique" {{ old('typeboutique', $boutique->typeboutique) == 'cosmitique' ? 'selected' : '' }}>Cosmitique</option>
                        <option value="superete" {{ old('typeboutique', $boutique->typeboutique) == 'superete' ? 'selected' : '' }}>Superete</option>
                    </select>
                    @error('typeboutique')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons for Submit and Cancel -->
                <div class="flex justify-end space-x-4">
                    <!-- Cancel Button -->
                    <a href="{{ route('superviseur.boutiques.index') }}"
                        class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
