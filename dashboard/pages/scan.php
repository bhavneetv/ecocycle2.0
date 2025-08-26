

    <!-- Main Content -->
    <main class="pt-16 lg:pl-64 min-h-screen">
        <div class="p-6 max-w-4xl mx-auto">
            <!-- Page Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-4">
                    Scan Your Bottle
                    <svg class="w-8 h-8 inline-block ml-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V6a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1z"></path>
                    </svg>
                </h1>
                <p class="text-gray-300 text-lg">Position the barcode in front of your camera to earn rewards!</p>
            </div>

            <!-- Camera Scanner Section -->
            <div class="p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Scan QR Code</h2>
            
            <!-- Scanner container will be inserted here by JavaScript -->
            <div id="scanner-container" class="mb-6">
                <div id="qr-reader" class="mb-4"></div>
                <button id="scanButton" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center w-full sm:w-auto mx-auto">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V6a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1z"></path>
                    </svg>
                    Start Scanning
                </button>
            </div>
            
            <!-- Results will be displayed here -->
            <div id="scan-results" class="mt-6 p-4 bg-gray-100 rounded-lg hidden">
                <h3 class="font-semibold text-lg mb-2">Scan Result:</h3>
                <p id="scan-result-text" class="break-words"></p>
            </div>
            
            <!-- Hidden form for form submission (if needed) -->
            <form id="scan-form" method="post" class="hidden">
                <input type="hidden" name="barcode" id="barcode-input">
            </form>
        </div>
    </div>
</div>


            <!-- Scan Result Section (Hidden by default) -->
            <div id="scan-result" class="glass rounded-2xl p-6 mb-6 card-hover hidden">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-white mb-2">Scan Successful!</h3>
                    <p class="text-gray-400">Bottle details retrieved successfully</p>
                </div>

                <!-- Bottle Details Card -->
                <div class="bg-white/10 rounded-xl p-6 max-w-md mx-auto">
                    <div class="text-center mb-4">
                        <div class="w-20 h-20 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <h4 id="bottle-name" class="text-xl font-semibold text-white mb-2">Coca Cola 500ml</h4>
                        <p id="bottle-barcode" class="text-gray-400 text-sm font-mono">Barcode: 123456789012</p>
                    </div>

                    <div class="border-t border-white/20 pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-400">Reward Points:</span>
                            <span id="reward-points" class="text-2xl font-bold text-green-400">+15</span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-400">Cash Value:</span>
                            <span id="cash-value" class="text-xl font-semibold text-blue-400">₹3</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">CO₂ Saved:</span>
                            <span id="co2-saved" class="text-lg font-medium text-green-400">0.5kg</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-6">
                        <button id="confirm-recycle-btn"
                            class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300">
                            Confirm Recycle
                        </button>
                        <button id="scan-another-btn"
                            class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300">
                            Scan Another
                        </button>
                    </div>
                </div>
            </div>

            <!-- Instructions Card -->
            <div class="glass rounded-2xl p-6 card-hover">
                <h3 class="text-xl font-semibold text-white mb-4">Scanning Tips</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-medium mb-2">Good Lighting</h4>
                            <p class="text-gray-400 text-sm">Ensure the barcode is well-lit and clearly visible</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-medium mb-2">Steady Hold</h4>
                            <p class="text-gray-400 text-sm">Keep the bottle steady within the scanning area</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-medium mb-2">Clean Surface</h4>
                            <p class="text-gray-400 text-sm">Make sure the barcode is clean and undamaged</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-medium mb-2">Be Patient</h4>
                            <p class="text-gray-400 text-sm">Allow a few seconds for the scanner to read the code</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/scan.js"></script>

    
</body>

</html>