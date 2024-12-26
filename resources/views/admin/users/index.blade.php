<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Manage Users') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Search and Filter Bar -->
            <div
                class="flex flex-col items-center justify-between p-4 mb-8 bg-white rounded-lg shadow-md sm:flex-row dark:bg-gray-800">
                <div class="flex items-center w-full space-x-4 sm:w-auto">
                    <input type="text" id="searchInput" placeholder="Search by name or email..."
                        class="w-full px-4 py-2 border rounded-lg sm:w-64 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" />
                    <select id="roleFilter"
                        class="px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                        <option value="">All Roles</option>
                        <option value="admin">Admin</option>
                        <option value="Superviseur">Superviseur</option>

                    </select>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('admin.users.create') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New User
                    </a>
                </div>
            </div>
<br>
            <!-- User Grid -->
            <div id="userGrid" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($users as $user)
                <div class="relative p-6 transition-transform transform bg-white rounded-lg shadow-md dark:bg-gray-800 hover:scale-105 hover:shadow-xl user-card"
                    data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}"
                    data-role="{{ strtolower($user->role) }}">
                    <!-- User Info -->
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                        <span
                            class="inline-block px-3 py-1 mt-2 text-xs font-medium text-white rounded-full
                                {{ $user->role === 'admin' ? 'bg-red-500' : ($user->role === 'superviseur' ? 'bg-yellow-500' : 'bg-green-500') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-6 space-x-4">
                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l-4-4m0 0l-4 4m4-4v12" />
                            </svg>
                            Edit
                        </a>
                        <button type="button" onclick="openDeleteModal({{ $user->id }}, '{{ $user->name }}')"
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
            const roleFilter = document.getElementById('roleFilter');
            const userCards = document.querySelectorAll('.user-card');

            const filterUsers = () => {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedRole = roleFilter.value.toLowerCase();

                userCards.forEach(card => {
                    const name = card.dataset.name;
                    const email = card.dataset.email;
                    const role = card.dataset.role;

                    const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
                    const matchesRole = !selectedRole || role === selectedRole;

                    if (matchesSearch && matchesRole) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            searchInput.addEventListener('input', filterUsers);
            roleFilter.addEventListener('change', filterUsers);
        });

        function openDeleteModal(userId, userName) {
            const modal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const modalText = document.getElementById('deleteModalText');

            deleteForm.action = `/admin/users/${userId}`;
            modalText.textContent = `Are you sure you want to delete "${userName}"?`;
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>
