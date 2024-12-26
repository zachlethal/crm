<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Product Name
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                            class="w-full px-4 py-2 mt-1 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                            required>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Category
                        </label>
                        <input type="text" name="category" id="category"
                            value="{{ old('category', $product->category) }}"
                            class="w-full px-4 py-2 mt-1 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                            required>
                    </div>

                    <!-- Materials -->
                    <div>
                        <label for="material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Materials
                        </label>
                        <textarea name="material" id="material" rows="4"
                            class="w-full px-4 py-2 mt-1 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">{{ old('material', $product->material) }}</textarea>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Gender
                        </label>
                        <select name="gender" id="gender"
                            class="w-full px-4 py-2 mt-1 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                            <option value="homme" {{ old('gender', $product->gender) === 'homme' ? 'selected' : '' }}>
                                Homme
                            </option>
                            <option value="femme" {{ old('gender', $product->gender) === 'femme' ? 'selected' : '' }}>
                                Femme
                            </option>
                            <option value="unisexe" {{ old('gender', $product->gender) === 'unisexe' ? 'selected' : ''
                                }}>
                                Unisexe
                            </option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Price
                        </label>
                        <input type="number" name="price" id="price" step="0.01"
                            value="{{ old('price', $product->price) }}"
                            class="w-full px-4 py-2 mt-1 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                            required>
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.products.index') }}"
                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>