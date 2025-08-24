<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 glass-nav navbar-scroll">
        <div class="flex items-center justify-between px-4 py-3">
            <!-- Left: Logo & Brand -->
            <div class="flex items-center space-x-3">
                <button id="sidebarToggle" class="p-2 rounded-lg hover:bg-white/10 transition-colors lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white hidden sm:block">EcoCycle</span>
                </div>
            </div>

            <!-- Center: Page Title -->
            <h1 class="text-lg font-semibold text-white capitalize" id="pageTitle" >Dashboard</h1>

            <!-- Right: User Actions -->
            <div class="flex items-center space-x-3">
                <!-- Notifications -->
                <button class="relative p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-5 5v-5zM7 7v10l5-5V7H7z"></path>
                    </svg>
                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                </button>

                <!-- Theme Toggle -->
                <button id="themeToggle" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                </button>

                <!-- User Profile -->
                <div class="relative">
                    <button id="profileToggle"
                        class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/10 transition-colors">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 32 32'%3E%3Ccircle cx='16' cy='16' r='16' fill='%2310b981'/%3E%3Ctext x='16' y='21' text-anchor='middle' fill='white' font-size='12' font-weight='bold'%3EJD%3C/text%3E%3C/svg%3E"
                            alt="User Avatar" class="w-8 h-8 rounded-full">
                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown" class="absolute right-0 mt-2 w-48 glass rounded-lg shadow-lg hidden">
                        <div class="py-2">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 transition-colors">Profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 transition-colors">Wallet</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 transition-colors">Settings</a>
                            <hr class="my-2 border-gray-600">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-red-400 hover:bg-white/10 transition-colors">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>