// Function to initialize the QR code scanner
function initializeScanner() {
    // Check if the scanner is already initialized
    if (window.scannerInitialized) return;
    
    // Create a container for the scanner
    const scannerContainer = document.createElement('div');
    scannerContainer.id = 'qr-reader';
    scannerContainer.style.width = '500px';
    scannerContainer.style.margin = '0 auto';
    
    // Add the container to the body
    document.body.appendChild(scannerContainer);
    
    // Initialize the scanner
    const html5QrCode = new Html5Qrcode("qr-reader");
    
    // Function to start scanning
    const startScanning = () => {
        html5QrCode.start(
            { facingMode: "environment" }, // Use back camera by default
            {
                fps: 10,    // Optional, frame per second for scan
                qrbox: { width: 250, height: 250 } 
                 // Optional, if you want bounded box UI
                 supportedFormats: [
                    Html5QrcodeSupportedFormats.EAN_13,
                    Html5QrcodeSupportedFormats.EAN_8,
                    Html5QrcodeSupportedFormats.UPC_A,
                    Html5QrcodeSupportedFormats.UPC_E,
                    Html5QrcodeSupportedFormats.CODE_39,
                    Html5QrcodeSupportedFormats.CODE_128
                  ]
            },
           
            (decodedText, decodedResult) => {
                // Handle the scanned code
                console.log('Barcode detected:', decodedText);
                
                // Stop scanning after detection
                html5QrCode.stop().then(ignore => {
                    console.log('QR Code scanning stopped.');
                }).catch(err => {
                    console.log('Error stopping scanner', err);
                });
                
                // Optionally show the result to the user
                alert(`Scanned: ${decodedText}`);
            },
            (errorMessage) => {
                // Parse error, ignore if it's just not found error
                console.log('Scan error:', errorMessage);
            }
        ).catch(err => {
            console.error("Error starting scanner:", err);
        });
    };
    
    // Add click handler for the scan button
    document.getElementById('scanButton').addEventListener('click', function() {
        if (!html5QrCode.isScanning) {
            startScanning();
        }
    });
    
    window.scannerInitialized = true;
}

// Load the HTML5 QR Code library and initialize the scanner
function loadQRScanner() {
    // Check if the script is already loaded
    if (window.Html5Qrcode) {
        initializeScanner();
        return;
    }
    
    // Create and append the script tag
    const script = document.createElement('script');
    script.src = 'https://unpkg.com/html5-qrcode';
    script.onload = initializeScanner;
    document.head.appendChild(script);
}

// Initialize when the DOM is fully loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadQRScanner);
} else {
    loadQRScanner();
}