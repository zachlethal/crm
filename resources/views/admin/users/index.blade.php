<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-extrabold text-gray-800 dark:text-gray-100">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Search and Filter Bar -->
            <div class="flex flex-col items-center justify-between p-4 mb-8 bg-white rounded-lg shadow-md sm:flex-row dark:bg-gray-800">
                <div class="flex items-center w-full space-x-4 sm:w-auto">
                    <input type="text" id="searchInput" placeholder="Search by name or email..."
                        class="w-full px-4 py-2 border rounded-lg sm:w-64 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-300 transition-all" />
                    <select id="roleFilter"
                        class="px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-300 transition-all">
                        <option value="">All Roles</option>
                        <option value="admin">Admin</option>
                        <option value="Superviseur">Superviseur</option>
                    </select>
                    <button id="clearSearch" type="button"
                        class="ml-2 text-sm text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('admin.users.create') }}"
                        class="inline-flex items-center px-6 py-3 text-white bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New User
                    </a>
                </div>
            </div>
            <br>
            <!-- User List (One by one, not grid) -->
            <div id="userGrid" class="space-y-6">
                @foreach ($users as $user)
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
                        <div class="flex items-center justify-end mt-6 space-x-4">
                            <!-- View Button (Blue) -->
                            <a href="{{ route('admin.users.show', $user) }}"
                                class="inline-flex items-center px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.732 5 12 5c4.268 0 8.268 2.943 9.542 7-1.274 4.057-5.274 7-9.542 7-4.268 0-8.268-2.943-9.542-7zm9.542-3c-.989 0-1.788.791-1.788 1.762S11.013 12 12 12s1.788-.791 1.788-1.762S12.989 9 12 9z" />
                                </svg>
                                View
                            </a>
                            <!-- Edit Button (Green) -->
                            <a href="{{ route('admin.users.edit', $user) }}"
                                class="inline-flex items-center px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600 focus:outline-none transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 4l4 4-8 8H8v-4l8-8z" />
                                </svg>
                                Edit
                            </a>
                            <!-- Delete Button (Red) -->
                            <button type="button"
                                onclick="openDeleteModal({{ $user->id }}, '{{ $user->name }}')"
                                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-800 dark:text-red-300 dark:hover:bg-red-700 focus:outline-none transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
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
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Confirm Delete</h3>
            <p id="deleteModalText" class="mt-4 text-sm text-gray-600 dark:text-gray-400"></p>
            <div class="flex justify-end mt-6 space-x-4">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 focus:outline-none transition-all">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition-all">
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
            const clearSearchBtn = document.getElementById('clearSearch');

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
            clearSearchBtn.addEventListener('click', () => {
                searchInput.value = '';
                filterUsers();
            });
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
