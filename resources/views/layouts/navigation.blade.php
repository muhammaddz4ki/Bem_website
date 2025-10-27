<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-purple-700 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo Section -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                        @if ($logoPath)
                            <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo BEM Kampus" class="block h-12 w-auto rounded-lg shadow-md">
                        @else
                            <div class="block h-12 w-12 bg-white rounded-lg flex items-center justify-center shadow-md">
                                <span class="text-blue-600 font-bold text-lg">BEM</span>
                            </div>
                        @endif
                        <span class="ml-3 text-xl font-bold text-white hidden md:block">BEM Kampus</span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-12 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @can('isSuperAdmin')
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')"
                            class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                            <i class="fas fa-tags mr-2"></i>
                            {{ __('Kategori') }}
                        </x-nav-link>

                        <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.*')"
                            class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                            <i class="fas fa-images mr-2"></i>
                            {{ __('Galeri') }}
                        </x-nav-link>

                        <x-nav-link :href="route('ministries.index')" :active="request()->routeIs('ministries.*')"
                            class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                            <i class="fas fa-building mr-2"></i>
                            {{ __('Kementerian') }}
                        </x-nav-link>

                        <x-nav-link :href="route('partners.index')" :active="request()->routeIs('partners.*')"
                            class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                            <i class="fas fa-handshake mr-2"></i>
                            {{ __('Rekan') }}
                        </x-nav-link>

                        <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')"
                            class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                            <i class="fas fa-cog mr-2"></i>
                            {{ __('Pengaturan') }}
                        </x-nav-link>
                    @endcan
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.*')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                        <i class="fas fa-newspaper mr-2"></i>
                        {{ __('Berita') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Desktop User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-sm font-semibold rounded-xl text-white hover:bg-white/20 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 transition-all duration-300 transform hover:scale-105">
                            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                            <div class="truncate max-w-32">{{ Auth::user()->name }}</div>
                            <i class="fas fa-chevron-down ml-2 text-sm"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50">
                            <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-600 truncate">{{ Auth::user()->email }}</div>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')"
                            class="flex items-center text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
                            <i class="fas fa-user-edit mr-3 text-gray-400"></i>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                class="flex items-center text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-3 text-gray-400"></i>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Menu Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-3 rounded-xl text-white hover:bg-white/20 hover:shadow-md focus:outline-none focus:bg-white/20 transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gradient-to-b from-blue-700 to-purple-800 shadow-xl">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                <i class="fas fa-tachometer-alt mr-3 w-5 text-center"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @can('isSuperAdmin')
                <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')"
                    class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                    <i class="fas fa-tags mr-3 w-5 text-center"></i>
                    {{ __('Kategori') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.*')"
                    class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                    <i class="fas fa-images mr-3 w-5 text-center"></i>
                    {{ __('Galeri') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('ministries.index')" :active="request()->routeIs('ministries.*')"
                    class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                    <i class="fas fa-building mr-3 w-5 text-center"></i>
                    {{ __('Kementerian') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('partners.index')" :active="request()->routeIs('partners.*')"
                    class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                    <i class="fas fa-handshake mr-3 w-5 text-center"></i>
                    {{ __('Rekan') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')"
                    class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                    <i class="fas fa-cog mr-3 w-5 text-center"></i>
                    {{ __('Pengaturan') }}
                </x-responsive-nav-link>
            @endcan
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.*')"
                class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                <i class="fas fa-newspaper mr-3 w-5 text-center"></i>
                {{ __('Berita') }}
            </x-responsive-nav-link>
        </div>

        <!-- Mobile User Section -->
        <div class="pt-4 pb-3 border-t border-white/20 bg-white/10 backdrop-blur-sm">
            <div class="px-4 py-3">
                <div class="font-semibold text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white/80">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-2 space-y-1 px-3 pb-3">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-white/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-white/30">
                    <i class="fas fa-user-edit mr-3 w-5 text-center"></i>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        class="flex items-center rounded-xl px-4 py-3 text-white hover:bg-red-500/20 hover:shadow-md transition-all duration-300 border border-transparent hover:border-red-300"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Active state styling for navigation links */
    .bg-blue-600 .bg-blue-700 {
        background: rgba(255, 255, 255, 0.25) !important;
        backdrop-filter: blur(10px);
        border-color: rgba(255, 255, 255, 0.4) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
