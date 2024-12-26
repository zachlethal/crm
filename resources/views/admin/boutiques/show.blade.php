<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ $boutique->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <p><strong>Location:</strong> {{ $boutique->location }}</p>
                <p><strong>Phone:</strong> {{ $boutique->phone_number ?? 'N/A' }}</p>
                <p><strong>Supply Source:</strong> {{ $boutique->supply_source ?? 'N/A' }}</p>
                <p><strong>Purchase Type:</strong> {{ $boutique->typeachat ?? 'N/A' }}</p>
                <p><strong>Store Type:</strong> {{ $boutique->typeboutique ?? 'N/A' }}</p>
                <a href="{{ route('admin.boutiques.index') }}" class="inline-block mt-4 text-indigo-600">Back to
                    list</a>
            </div>
        </div>
    </div>
</x-app-layout>