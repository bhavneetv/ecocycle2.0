<main class="pt-16 lg:pl-64 min-h-screen">
        <div class="p-6">
            <!-- Welcome Card -->
            <div class="glass rounded-2xl p-6 mb-6 card-hover">
                <h2 class="text-2xl font-bold text-white mb-2">Hi, John Doe 👋</h2>
                <p class="text-gray-300">Recycle & Earn rewards while saving the planet!</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Bottles Recycled</p>
                            <p class="text-3xl font-bold text-white">247</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Reward Points</p>
                            <p class="text-3xl font-bold text-white">1,247</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Wallet Balance</p>
                            <p class="text-3xl font-bold text-white">₹847</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">CO₂ Saved</p>
                            <p class="text-3xl font-bold text-white">12.4kg</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scan Bottle Section -->
            <div class="glass rounded-2xl p-6 mb-8 card-hover">
                <h3 class="text-xl font-semibold text-white mb-4">Scan a Bottle</h3>
                <p class="text-gray-300 mb-6">Ready to recycle? Scan your bottle barcode to earn points!</p>
                <button id="startScanBtn" class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105">
                    Start Scanning
                </button>
            </div>

            <!-- Recycling History -->
            <div class="glass rounded-2xl p-6 card-hover">
                <h3 class="text-xl font-semibold text-white mb-4">Recent Activity</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-600">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Date</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Bottle Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Quantity</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Points</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-700/50 hover:bg-white/5 transition-colors">
                                <td class="py-3 px-4 text-gray-300">Aug 24, 2025</td>
                                <td class="py-3 px-4 text-white">Coca Cola 500ml</td>
                                <td class="py-3 px-4 text-gray-300">2</td>
                                <td class="py-3 px-4 text-green-400">+20</td>
                                <td class="py-3 px-4"><span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-sm">Completed</span></td>
                            </tr>
                            <tr class="border-b border-gray-700/50 hover:bg-white/5 transition-colors">
                                <td class="py-3 px-4 text-gray-300">Aug 23, 2025</td>
                                <td class="py-3 px-4 text-white">Pepsi 1L</td>
                                <td class="py-3 px-4 text-gray-300">1</td>
                                <td class="py-3 px-4 text-green-400">+15</td>
                                <td class="py-3 px-4"><span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-sm">Completed</span></td>
                            </tr>
                            <tr class="border-b border-gray-700/50 hover:bg-white/5 transition-colors">
                                <td class="py-3 px-4 text-gray-300">Aug 22, 2025</td>
                                <td class="py-3 px-4 text-white">Water Bottle 500ml</td>
                                <td class="py-3 px-4 text-gray-300">3</td>
                                <td class="py-3 px-4 text-green-400">+15</td>
                                <td class="py-3 px-4"><span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-sm">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>