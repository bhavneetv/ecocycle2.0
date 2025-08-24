<!-- Main Content -->
<main class="pt-16 lg:pl-64 min-h-screen">
    <div class="p-6">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent mb-2">
                My Rewards
            </h1>
            <p class="text-gray-300">Track your recycling rewards and achievements</p>
        </div>

        <!-- Rewards Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Rewards Card -->
            <div class="glass rounded-2xl p-6 card-hover pulse-glow">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-400 text-sm">Total Rewards Earned</p>
                        <p id="totalPoints" class="text-4xl font-bold text-white counter-animation">0</p>
                        <p class="text-green-400 text-sm mt-1">+127 this week</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500/20 to-blue-500/20 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-full bg-gray-700/30 rounded-full h-2">
                    <div class="bg-gradient-to-r from-green-500 to-blue-500 h-2 rounded-full transition-all duration-1000" style="width: 0%" id="progressBar"></div>
                </div>
            </div>

            <!-- Redeemed Rewards Card -->
            <div class="glass rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Redeemed</p>
                        <p id="redeemedPoints" class="text-3xl font-bold text-white counter-animation">0</p>
                        <p class="text-blue-400 text-sm mt-1">₹<span id="redeemedValue">0</span> value</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Available Balance Card -->
            <div class="glass rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-400 text-sm">Available Balance</p>
                        <p id="availablePoints" class="text-3xl font-bold text-white counter-animation">0</p>
                        <p class="text-yellow-400 text-sm mt-1">Ready to redeem</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
                <button class="w-full bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    Redeem Now
                </button>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="glass rounded-2xl p-6 mb-8 card-hover">
            <h3 class="text-xl font-semibold text-white mb-6">Recent Activity</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-600">
                            <th class="text-left py-3 px-4 text-gray-300 font-medium">Date</th>
                            <th class="text-left py-3 px-4 text-gray-300 font-medium">Activity</th>
                            <th class="text-left py-3 px-4 text-gray-300 font-medium">Bottle</th>
                            <th class="text-left py-3 px-4 text-gray-300 font-medium">Points</th>
                            <th class="text-left py-3 px-4 text-gray-300 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody id="activityTable">
                        <!-- Activity rows will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="glass rounded-2xl p-6 card-hover">
            <h3 class="text-xl font-semibold text-white mb-6">Achievements</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Plastic Saver Badge -->
                <div class="glass rounded-xl p-4 text-center card-hover badge-glow">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold mb-1">Plastic Saver</h4>
                    <p class="text-gray-400 text-sm mb-2">Recycle 100+ bottles</p>
                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs">Earned</span>
                </div>

                <!-- Eco Hero Badge -->
                <div class="glass rounded-xl p-4 text-center card-hover badge-glow">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold mb-1">Eco Hero</h4>
                    <p class="text-gray-400 text-sm mb-2">Save 10kg+ CO₂</p>
                    <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-xs">Earned</span>
                </div>

                <!-- Top Recycler Badge -->
                <div class="glass rounded-xl p-4 text-center card-hover achievement-locked">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold mb-1">Top Recycler</h4>
                    <p class="text-gray-400 text-sm mb-2">Recycle 500+ bottles</p>
                    <span class="bg-gray-600/40 text-gray-400 px-3 py-1 rounded-full text-xs">247/500</span>
                </div>

                <!-- Weekly Champion Badge -->
                <div class="glass rounded-xl p-4 text-center card-hover badge-glow">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold mb-1">Weekly Champion</h4>
                    <p class="text-gray-400 text-sm mb-2">Top recycler this week</p>
                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-xs">Earned</span>
                </div>

                <!-- Streak Master Badge -->
                <div class="glass rounded-xl p-4 text-center card-hover achievement-locked">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-500/20 to-pink-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold mb-1">Streak Master</h4>
                    <p class="text-gray-400 text-sm mb-2">30-day recycle streak</p>
                    <span class="bg-gray-600/40 text-gray-400 px-3 py-1 rounded-full text-xs">7/30 days</span>
                </div>

                <!-- Community Leader Badge -->
                <div class="glass rounded-xl p-4 text-center card-hover achievement-locked">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold mb-1">Community Leader</h4>
                    <p class="text-gray-400 text-sm mb-2">Refer 10+ friends</p>
                    <span class="bg-gray-600/40 text-gray-400 px-3 py-1 rounded-full text-xs">3/10 friends</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample reward data - replace with actual API call
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
    </script>
</main>