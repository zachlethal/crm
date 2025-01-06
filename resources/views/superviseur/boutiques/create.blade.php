<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Add New Boutique') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form action="{{ route('superviseur.boutiques.store') }}" method="POST"
                class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                <div class="mb-4">
                    <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" id="nom" name="nom"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                        required />
                </div>
                <div class="mb-4">
                    <label for="adresse"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                    <input type="text" id="adresse" name="adresse"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                        required />
                </div>
                <div class="mb-4">
                    <label for="telephone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone
                        Number</label>
                    <input type="text" id="telephone" name="telephone"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" />
                </div>
                <div class="mb-4">
                    <label for="cart" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cart</label>
                    <input type="text" id="cart" name="cart"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" />
                </div>
                <div class="mb-4">
                    <label for="typeachat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Purchase
                        Type</label>
                    <select id="typeachat" name="typeachat"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                        <option value="GRO">GRO</option>
                        <option value="DDS">DDS</option>
                        <option value="MIX">MIX</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="typeboutique" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Store
                        Type</label>
                    <select id="typeboutique" name="typeboutique"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                        <option value="GMS">GMS</option>
                        <option value="Taba cosmitique">Taba Cosmetique</option>
                        <option value="cosmitique">Cosmetique</option>
                        <option value="superete">Superette</option>
                    </select>
                </div>
                <button type="submit"
                    class="px-6 py-3 text-white bg-indigo-600 rounded-full hover:bg-indigo-700">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
