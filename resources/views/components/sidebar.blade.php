<aside x-data="{ isOpen: true, darkMode: document.documentElement.classList.contains('dark') }" :class="{
    'w-64': isOpen,
    'w-16': !isOpen,
    'bg-gray-900 text-white': darkMode,
    'bg-white text-gray-900': !darkMode
}" class="h-screen transition-all duration-300">
    <div class="p-4">
        <!-- Sidebar Toggle Button -->
        <button @click="isOpen = !isOpen" class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{'hidden': isOpen, 'block': !isOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                <path :class="{'hidden': !isOpen, 'block': isOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6-6-6" />
            </svg>
        </button>

        <!-- Sidebar Header -->
        <h2 class="text-2xl font-semibold flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h6m-6 0a3 3 0 110 6m0-6a3 3 0 110-6m0 12a9 9 0 100-18m0 18a9 9 0 100-18m0 18v2m0-18v2m0 14a7 7 0 100-14 7 7 0 000 14z" />
            </svg>
            <span :class="{'opacity-0': !isOpen, 'opacity-100': isOpen}" class="transition-opacity duration-300">crm</span>
        </h2>
    </div>

    <nav class="mt-6">
        <ul>
            <!-- Dashboard Link -->
            <li>
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('superviseur.dashboard') }}"
                   :class="{'bg-gray-800 bg-opacity-100': request().routeIs(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'superviseur.dashboard'), 'hover:bg-gray-800 bg-opacity-80': true}"
                   class="block py-2 px-4 rounded flex items-center space-x-4 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V7a2 2 0 00-2-2H7a2 2 0 00-2 2v14" />
                    </svg>
                    <span :class="{'hidden': !isOpen, 'block': isOpen}" class="transition-opacity duration-300">Dashboard</span>
                </a>
            </li>

            <!-- Manage Users Link (Admin Role Only) -->
            @if(Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('admin.users.index') }}"
                   :class="{'bg-gray-800 bg-opacity-100': request().routeIs('admin.users.index'), 'hover:bg-gray-800 bg-opacity-80': true}"
                   class="block py-2 px-4 rounded flex items-center space-x-4 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12a8 8 0 10-16 0 8 8 0 0016 0z" />
                    </svg>
                    <span :class="{'hidden': !isOpen, 'block': isOpen}" class="transition-opacity duration-300">Manage Users</span>
                </a>
            </li>
            @endif

            <!-- Manage Products Link -->
            <li>
                <a href="{{ route(Auth::user()->role === 'admin' ? 'admin.produits.index' : 'superviseur.produits.index') }}"
                   :class="{'bg-gray-800 bg-opacity-100': request().routeIs(Auth::user()->role === 'admin' ? 'admin.produits.index' : 'superviseur.produits.index'), 'hover:bg-gray-800 bg-opacity-80': true}"
                   class="block py-2 px-4 rounded flex items-center space-x-4 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h6m-6 0a3 3 0 110 6m0-6a3 3 0 110-6m0 12a9 9 0 100-18m0 18a9 9 0 100-18m0 18v2m0-18v2m0 14a7 7 0 100-14 7 7 0 000 14z" />
                    </svg>
                    <span :class="{'hidden': !isOpen, 'block': isOpen}" class="transition-opacity duration-300">Manage Products</span>
                </a>
            </li>

            <!-- Manage Boutiques Link -->
            <li>
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.boutiques.index') : route('superviseur.boutiques.index') }}"
                   :class="{'bg-gray-800 bg-opacity-100': request().routeIs(Auth::user()->role === 'admin' ? 'admin.boutiques.index' : 'superviseur.boutiques.index'), 'hover:bg-gray-800 bg-opacity-80': true}"
                   class="block py-2 px-4 rounded flex items-center space-x-4 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8M8 6h8M5 12h14m-3-8h-8m8 8v8H5v-8h14z" />
                    </svg>
                    <span :class="{'hidden': !isOpen, 'block': isOpen}" class="transition-opacity duration-300">Manage Boutiques</span>
                </a>
            </li>

            <!-- Logout Link -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block py-2 px-4 rounded flex items-center space-x-4 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H9" />
                        </svg>
                        <span :class="{'hidden': !isOpen, 'block': isOpen}" class="transition-opacity duration-300">{{ __('Log Out') }}</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
