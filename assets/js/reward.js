const rewardData = {
    totalPoints: 2847,
    redeemedPoints: 1600,
    availablePoints: 1247,
    redeemedValue: 800,
    weeklyProgress: 72, // percentage
    recentActivity: [
        {
            date: "Aug 24, 2025",
            activity: "Bottle Scanned",
            bottle: "Coca Cola 500ml",
            points: "+20",
            status: "earned"
        },
        {
            date: "Aug 24, 2025",
            activity: "Reward Redeemed",
            bottle: "Gift Voucher",
            points: "-100",
            status: "redeemed"
        },
        {
            date: "Aug 23, 2025",
            activity: "Bottle Scanned",
            bottle: "Pepsi 1L",
            points: "+15",
            status: "earned"
        },
        {
            date: "Aug 23, 2025",
            activity: "Bottle Scanned",
            bottle: "Water Bottle 500ml",
            points: "+10",
            status: "pending"
        },
        {
            date: "Aug 22, 2025",
            activity: "Weekly Bonus",
            bottle: "Achievement Bonus",
            points: "+50",
            status: "earned"
        }
    ]
};

// Counter animation function
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const startTime = Date.now();

    function updateCounter() {
        const elapsed = Date.now() - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = Math.floor(start + (target - start) * easeOutQuart);
        
        element.textContent = current.toLocaleString();
        
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = target.toLocaleString();
        }
    }
    
    updateCounter();
}

// Populate activity table
function populateActivityTable() {
    const tableBody = document.getElementById('activityTable');
    
    rewardData.recentActivity.forEach(activity => {
        const row = document.createElement('tr');
        row.className = 'border-b border-gray-700/50 hover:bg-white/5 transition-colors';
        
        const statusClass = activity.status === 'earned' ? 'status-earned' :
                          activity.status === 'redeemed' ? 'status-redeemed' : 'status-pending';
        
        const statusText = activity.status.charAt(0).toUpperCase() + activity.status.slice(1);
        
        row.innerHTML = `
            <td class="py-3 px-4 text-gray-300">${activity.date}</td>
            <td class="py-3 px-4 text-white">${activity.activity}</td>
            <td class="py-3 px-4 text-gray-300">${activity.bottle}</td>
            <td class="py-3 px-4 ${activity.points.startsWith('+') ? 'text-green-400' : 'text-blue-400'}">${activity.points}</td>
            <td class="py-3 px-4">
                <span class="${statusClass} px-3 py-1 rounded-full text-sm">${statusText}</span>
            </td>
        `;
        
        tableBody.appendChild(row);
    });
}

// Progress bar animation
function animateProgressBar() {
    const progressBar = document.getElementById('progressBar');
    setTimeout(() => {
        progressBar.style.width = rewardData.weeklyProgress + '%';
    }, 1000);
}

// Initialize page
function initializeRewardsPage() {
    // Animate counters
    animateCounter(document.getElementById('totalPoints'), rewardData.totalPoints);
    animateCounter(document.getElementById('redeemedPoints'), rewardData.redeemedPoints);
    animateCounter(document.getElementById('availablePoints'), rewardData.availablePoints);
    animateCounter(document.getElementById('redeemedValue'), rewardData.redeemedValue);
    
    // Animate progress bar
    animateProgressBar();
    
    // Populate activity table
    populateActivityTable();
    
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
}

// Simulate real-time updates
function simulateRealTimeUpdates() {
    setInterval(() => {
        // Randomly add new activity (simulate real user activity)
        if (Math.random() > 0.95) { // 5% chance every interval
            const newActivity = {
                date: new Date().toLocaleDateString('en-US', { 
                    month: 'short', 
                    day: 'numeric', 
                    year: 'numeric' 
                }),
                activity: "Bottle Scanned",
                bottle: "New Bottle",
                points: "+10",
                status: "earned"
            };
            
            // Update totals
            rewardData.totalPoints += 10;
            rewardData.availablePoints += 10;
            
            // Update display
            document.getElementById('totalPoints').textContent = rewardData.totalPoints.toLocaleString();
            document.getElementById('availablePoints').textContent = rewardData.availablePoints.toLocaleString();
            
            console.log('New bottle scanned! +10 points');
        }
    }, 5000); // Check every 5 seconds
}

// API simulation function
async function fetchRewardData() {
    // This would be replaced with actual API call
    // Example: const response = await fetch('/api/rewards');
    // const data = await response.json();
    
    // For now, return simulated data
    return new Promise(resolve => {
        setTimeout(() => resolve(rewardData), 500);
    });
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', async () => {
    try {
        // In a real app, you would fetch data from API
        // const data = await fetchRewardData();
        
        initializeRewardsPage();
        simulateRealTimeUpdates();
        
    } catch (error) {
        console.error('Error loading rewards data:', error);
        // Handle error state
    }
});

// Add click handlers for interactive elements
document.addEventListener('click', (e) => {
    if (e.target.textContent === 'Redeem Now') {
        // Handle redeem action
        alert('Redeem functionality would open here!');
    }
});