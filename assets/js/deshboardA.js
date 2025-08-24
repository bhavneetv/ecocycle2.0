    // DOM Elements
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const profileToggle = document.getElementById('profileToggle');
    const profileDropdown = document.getElementById('profileDropdown');
    const themeToggle = document.getElementById('themeToggle');
    const startScanBtnDesh = document.getElementById('startScanBtnDesh');
    const scanModal = document.getElementById('scanModal');
    const closeScanModal = document.getElementById('closeScanModal');
    const navbar = document.getElementById('navbar');

    // Sidebar Toggle
    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Profile Dropdown
        profileToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', () => {
            profileDropdown.classList.add('hidden');
        });

        // Theme Toggle (Dark/Light mode)
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');

            // Update icon based on theme
            const icon = themeToggle.querySelector('svg');
            if (isDark) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>';
            }
        });

        // Scan Modal Functions
        startScanBtnDesh.addEventListener('click', () => {
            scanModal.classList.remove('hidden');
            // Here you would typically initialize camera/barcode scanning
            initializeScannerPlaceholder();
        });

        closeScanModal.addEventListener('click', () => {
            scanModal.classList.add('hidden');
            // Stop camera/scanner
            stopScannerPlaceholder();
        });

        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !scanModal.classList.contains('hidden')) {
                scanModal.classList.add('hidden');
                stopScannerPlaceholder();
            }
        });

        // Scanner Placeholder Functions
        function initializeScannerPlaceholder() {
            console.log('Scanner initialized - Ready to scan barcodes');
            // This is where you would integrate with a barcode scanning library
            // Example: QuaggaJS, ZXing, or a mobile camera API
        }

        function stopScannerPlaceholder() {
            console.log('Scanner stopped');
            // Stop camera stream and cleanup
        }

        // Navbar Scroll Effect
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down
                navbar.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up
                navbar.style.transform = 'translateY(0)';
            }

            // Add shadow when scrolled
            if (scrollTop > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }

            lastScrollTop = scrollTop;
        });

        // Simulate real-time updates (optional)
        function simulateUpdates() {
            const stats = {
                bottles: document.querySelector('.glass:nth-child(1) .text-3xl'),
                points: document.querySelector('.glass:nth-child(2) .text-3xl'),
                wallet: document.querySelector('.glass:nth-child(3) .text-3xl'),
                co2: document.querySelector('.glass:nth-child(4) .text-3xl')
            };

            // Simulate periodic updates every 30 seconds
            setInterval(() => {
                // Randomly increment values
                if (Math.random() > 0.7) {
                    const currentBottles = parseInt(stats.bottles.textContent);
                    stats.bottles.textContent = currentBottles + 1;

                    const currentPoints = parseInt(stats.points.textContent.replace(',', ''));
                    stats.points.textContent = (currentPoints + 5).toLocaleString();

                    const currentWallet = parseInt(stats.wallet.textContent.replace('₹', ''));
                    stats.wallet.textContent = '₹' + (currentWallet + 2);

                    const currentCO2 = parseFloat(stats.co2.textContent.replace('kg', ''));
                    stats.co2.textContent = (currentCO2 + 0.1).toFixed(1) + 'kg';
                }
            }, 30000);
        }

        // Initialize app
        document.addEventListener('DOMContentLoaded', () => {
            // Add loading animation
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease';
                document.body.style.opacity = '1';
            }, 100);

            // Start simulated updates
            simulateUpdates();

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

        // Mobile-specific optimizations
        if ('ontouchstart' in window) {
            // Add touch-specific styles
            document.body.classList.add('touch-device');

            // Prevent zoom on double tap
            let lastTouchEnd = 0;
            document.addEventListener('touchend', function (event) {
                const now = (new Date()).getTime();
                if (now - lastTouchEnd <= 300) {
                    event.preventDefault();
                }
                lastTouchEnd = now;
            }, false);
        }

        // Service Worker for PWA capabilities (optional)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                // Register service worker here if needed
                console.log('PWA capabilities available');
            });
        }
        classList.toggle('hidden');
    });


    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
    });

   let navLink = document.getElementsByClassName('nav-link');
   navLink.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    sidebarOverlay.classList.add('hidden');
   })
