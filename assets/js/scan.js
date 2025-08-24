// Fixing the redeclaration error by checking if variables are already declared
if (typeof startScanBtn === 'undefined') {
    var startScanBtn = document.getElementById('start-scan-btn');
    var stopScanBtn = document.getElementById('stop-scan-btn');
    var cameraFeed = document.getElementById('camera-feed');
    var cameraPlaceholder = document.getElementById('camera-placeholder');
    var scanOverlay = document.getElementById('scan-overlay');
    var scanResult = document.getElementById('scan-result');
    var confirmRecycleBtn = document.getElementById('confirm-recycle-btn');
    var scanAnotherBtn = document.getElementById('scan-another-btn');
}

// Scanner state
let isScanning = false;
let stream = null;

// Sample bottle database (in real app, this would come from an API)
const bottleDatabase = {
    '123456789012': {
        name: 'Coca Cola 500ml',
        points: 15,
        cash: 3,
        co2: 0.5
    },
    '123456789013': {
        name: 'Pepsi 1L',
        points: 25,
        cash: 5,
        co2: 0.8
    },
    '123456789014': {
        name: 'Water Bottle 500ml',
        points: 10,
        cash: 2,
        co2: 0.3
    },
    '123456789015': {
        name: 'Sprite 600ml',
        points: 18,
        cash: 3.5,
        co2: 0.6
    }
};

// Initialize camera
async function startCamera() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: 'environment', // Use back camera on mobile
                width: {
                    ideal: 640
                },
                height: {
                    ideal: 480
                }
            }
        });

        cameraFeed.srcObject = stream;
        cameraPlaceholder.classList.add('hidden');
        scanOverlay.classList.remove('hidden');

        // Initialize QuaggaJS for barcode scanning
        initializeQuagga();

        return true;
    } catch (error) {
        console.error('Camera access denied:', error);
        alert('Camera access is required for barcode scanning. Please allow camera permissions and try again.');
        return false;
    }
}

// Stop camera
function stopCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }

    cameraPlaceholder.classList.remove('hidden');
    scanOverlay.classList.add('hidden');

    // Stop Quagga
    if (typeof Quagga !== 'undefined') {
        Quagga.stop();
    }
}

// Initialize QuaggaJS barcode scanner
function initializeQuagga() {
    if (typeof Quagga === 'undefined') {
        console.warn('QuaggaJS not loaded, using mock scanner');
        initializeMockScanner();
        return;
    }

    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#scanner-container'),
            constraints: {
                width: 640,
                height: 480,
                facingMode: "environment"
            }
        },
        decoder: {
            readers: [
                "code_128_reader",
                "ean_reader",
                "ean_8_reader",
                "code_39_reader",
                "code_39_vin_reader",
                "codabar_reader",
                "upc_reader",
                "upc_e_reader"
            ]
        }
    }, function(err) {
        if (err) {
            console.error('QuaggaJS initialization failed:', err);
            initializeMockScanner();
            return;
        }
        Quagga.start();
    });

    // Listen for successful scans
    Quagga.onDetected(function(result) {
        const barcode = result.codeResult.code;
        handleSuccessfulScan(barcode);
    });
}

// Mock scanner for demo purposes (when QuaggaJS is not available)
function initializeMockScanner() {
    console.log('Using mock scanner - will simulate scan after 3 seconds');

    setTimeout(() => {
        if (isScanning) {
            // Simulate finding a random barcode from our database
            const barcodes = Object.keys(bottleDatabase);
            const randomBarcode = barcodes[Math.floor(Math.random() * barcodes.length)];
            handleSuccessfulScan(randomBarcode);
        }
    }, 3000);
}

// Handle successful barcode scan
function handleSuccessfulScan(barcode) {
    console.log('Barcode detected:', barcode);

    // Look up bottle in database
    const bottle = bottleDatabase[barcode];

    if (bottle) {
        displayScanResult(barcode, bottle);
        stopScanning();
    } else {
        // Handle unknown barcode
        console.log('Unknown barcode, using default values');
        const defaultBottle = {
            name: 'Unknown Bottle',
            points: 5,
            cash: 1,
            co2: 0.2
        };
        displayScanResult(barcode, defaultBottle);
        stopScanning();
    }
}

// Display scan result
function displayScanResult(barcode, bottle) {
    // Update result card with bottle data
    document.getElementById('bottle-name').textContent = bottle.name;
    document.getElementById('bottle-barcode').textContent = `Barcode: ${barcode}`;
    document.getElementById('reward-points').textContent = `+${bottle.points}`;
    document.getElementById('cash-value').textContent = `₹${bottle.cash}`;
    document.getElementById('co2-saved').textContent = `${bottle.co2}kg`;

    // Show result card with animation
    scanResult.classList.remove('hidden');
    scanResult.classList.add('success-bounce');

    // Scroll to result
    scanResult.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
}

// Start scanning
function startScanning() {
    if (isScanning) return;

    startScanBtn.disabled = true;
    startScanBtn.innerHTML = `
        <svg class="animate-spin w-5 h-5 inline-block mr-2" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Initializing...
    `;

    startCamera().then(success => {
        if (success) {
            isScanning = true;
            startScanBtn.classList.add('hidden');
            stopScanBtn.classList.remove('hidden');

            // Hide previous results
            scanResult.classList.add('hidden');
        } else {
            startScanBtn.disabled = false;
            startScanBtn.innerHTML = `
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8m-10-9v12a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"></path>
                </svg>
                Start Scanning
            `;
        }
    });
}

// Stop scanning
function stopScanning() {
    if (!isScanning) return;

    isScanning = false;
    stopCamera();

    startScanBtn.classList.remove('hidden');
    stopScanBtn.classList.add('hidden');

    startScanBtn.disabled = false;
    startScanBtn.innerHTML = `
        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8m-10-9v12a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"></path>
        </svg>
        Start Scanning
    `;
}

// Event Listeners
if (startScanBtn) {
    startScanBtn.addEventListener('click', startScanning);
}
if (stopScanBtn) {
    stopScanBtn.addEventListener('click', stopScanning);
}

// Confirm recycle button
if (confirmRecycleBtn) {
    confirmRecycleBtn.addEventListener('click', () => {
        // In a real app, this would send data to the server
        alert('Recycling confirmed! Points added to your account.');

        // Reset for next scan
        scanResult.classList.add('hidden');
        scanResult.classList.remove('success-bounce');
    });
}

// Scan another button
if (scanAnotherBtn) {
    scanAnotherBtn.addEventListener('click', () => {
        scanResult.classList.add('hidden');
        scanResult.classList.remove('success-bounce');
        startScanning();
    });
}

// Clean up on page unload
window.addEventListener('beforeunload', () => {
    if (isScanning) {
        stopScanning();
    }
});

// Page entrance animation
document.addEventListener('DOMContentLoaded', () => {
    // Add loading animation
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);

    // Add entrance animations to cards
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';

        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});

// Mobile optimizations
if ('ontouchstart' in window) {
    // Add touch-specific styles
    document.body.classList.add('touch-device');

    // Prevent zoom on double tap
    let lastTouchEnd = 0;
    document.addEventListener('touchend', function(event) {
        const now = (new Date()).getTime();
        if (now - lastTouchEnd <= 300) {
            event.preventDefault();
        }
        lastTouchEnd = now;
    }, false);
}

// Handle device orientation changes
window.addEventListener('orientationchange', () => {
    if (isScanning) {
        // Restart camera with new orientation
        setTimeout(() => {
            stopScanning();
            setTimeout(startScanning, 500);
        }, 100);
    }
});

// Add vibration feedback on successful scan (if supported)
function vibrateFeedback() {
    if (navigator.vibrate) {
        navigator.vibrate([200, 100, 200]);
    }
}

// Enhanced scan success handler with vibration
const originalHandleSuccessfulScan = handleSuccessfulScan;
handleSuccessfulScan = function(barcode) {
    vibrateFeedback();
    originalHandleSuccessfulScan(barcode);
};

// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    // Space bar to start/stop scanning
    if (e.code === 'Space' && !e.target.matches('input, textarea, button')) {
        e.preventDefault();
        if (isScanning) {
            stopScanning();
        } else {
            startScanning();
        }
    }

    // Escape to stop scanning
    if (e.code === 'Escape' && isScanning) {
        stopScanning();
    }
});

// Error handling for camera access
function handleCameraError(error) {
    let message = 'Camera access failed. ';

    switch (error.name) {
        case 'NotAllowedError':
            message += 'Please allow camera permissions and try again.';
            break;
        case 'NotFoundError':
            message += 'No camera found on this device.';
            break;
        case 'NotReadableError':
            message += 'Camera is being used by another application.';
            break;
        default:
            message += 'Please check your camera and try again.';
    }

    alert(message);
}

// Enhanced camera initialization with better error handling
const originalStartCamera = startCamera;
startCamera = async function() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: 'environment',
                width: {
                    ideal: 640
                },
                height: {
                    ideal: 480
                }
            }
        });

        cameraFeed.srcObject = stream;
        cameraPlaceholder.classList.add('hidden');
        scanOverlay.classList.remove('hidden');

        initializeQuagga();

        return true;
    } catch (error) {
        console.error('Camera access error:', error);
        handleCameraError(error);
        return false;
    }
};