<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Cycle | Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* //  @import url('assets/css/common.css'); */
        .gradient-bg {

            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #533483);
            background-size: 400% 400%;
            /* animation: gradientShift 15s ease infinite; */
        }
    </style>
    <script src="assets/js/common.js"></script>


</head>

<body>


    <?php include "./includes/navbar.php"; ?>
    <!-- <?php include "./includes/sidebar.php"; ?> -->


    <main class="min-h-screen flex items-center justify-center p-4 gradient-bg">
        <!-- Auth Container -->
        <div class="w-full max-w-md" style="margin-top: 9vh;">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">EcoCycle</h1>
                <p class="text-gray-400">Recycle & Earn rewards while saving the planet!</p>
            </div>

            <!-- Auth Card -->
            <div class="glass rounded-2xl p-8">
                <!-- Tab Navigation -->
                <div class="flex bg-white/5 rounded-lg p-1 mb-8">
                    <button id="loginTab" class="flex-1 py-3 px-4 text-center rounded-lg transition-all duration-300 text-white bg-gradient-to-r from-green-500 to-blue-500 font-medium">
                        Login
                    </button>
                    <button id="signupTab" class="flex-1 py-3 px-4 text-center rounded-lg transition-all duration-300 text-gray-400 hover:text-white font-medium">
                        Sign Up
                    </button>
                </div>

                <!-- Login Form -->
                <form action="includes/login.php" method="post">
                    <div id="loginForm" class="space-y-6">


                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                            <input type="email" name="email" id="loginEmail" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" placeholder="Enter your email">
                            <div id="loginEmailError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <div>
                            <label class="block text-sm  font-medium text-gray-300 mb-2">Password</label>
                            <div class="relative">
                                <input type="password" id="loginPassword" name="password" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 pr-12" placeholder="Enter your password">
                                <button type="button" id="toggleLoginPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="loginPasswordError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center text-sm text-gray-300">
                                <input type="checkbox" id="rememberMe" name="remember" class="w-4 h-4 text-green-500 bg-white/10 border-white/20 rounded focus:ring-green-500 focus:ring-2">
                                <span class="ml-2">Remember me</span>
                            </label>
                            <a href="#" class="text-sm text-green-400 hover:text-green-300 transition-colors">Forgot password?</a>
                        </div>

                        <div class="space-y-3">
                            <button id="loginBtn" class="w-full bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 btn-glow">
                                Sign In
                            </button>

                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-600"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-transparent text-gray-400">or</span>
                                </div>
                            </div>
                        </form>

                           <a href="dashboard/index.php">
                           <button id="guestBtn" type="button" class="w-full bg-white/10 hover:bg-white/20 text-gray-300 hover:text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 border border-white/20 hover:border-white/40">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Try as Guest
                            </button> 
                           </a>
                        </div>
                    </div>
                <!-- Signup Form -->
                <form action="includes/signup.php" method="post">
                    <div id="signupForm" class="space-y-6 hidden">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">User Type</label>
                            <div class="relative">
                                <select name="userType" id="signupUserType" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 appearance-none">
                                    <option value="user" class="bg-gray-800 text-white">User</option>
                                    <option value="recycler" class="bg-gray-800 text-white">Recycler</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                            <input type="text" name="name" id="signupName" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" placeholder="Enter your full name">
                            <div id="signupNameError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                            <input type="email" name="email" id="signupEmail" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" placeholder="Enter your email">
                            <div id="signupEmailError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Address</label>
                            <input type="text" name="address" id="signupAddress" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" placeholder="Enter your address">
                            <div id="signupAddressError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="signupPassword" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 pr-12" placeholder="Create a password">
                                <button type="button" id="toggleSignupPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="signupPasswordError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="confirmPassword" id="confirmPassword" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 pr-12" placeholder="Confirm your password">
                                <button type="button" id="toggleConfirmPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="confirmPasswordError" class="text-red-400 text-sm mt-1 hidden"></div>
                        </div>

                        <button id="signupBtn" type="submit" class="w-full bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 btn-glow">
                            Create Account
                        </button>
                    </div>
            </div>
            </form>

            <!-- Footer Text -->



            <!-- Footer Text -->
            <p class="text-center text-gray-400 text-sm mt-6">
                By continuing, you agree to our Terms of Service and Privacy Policy
            </p>
        </div>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

            * {
                font-family: 'Inter', sans-serif;
            }

            .glass {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(15px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }





            .btn-glow:hover {
                box-shadow: 0 0 30px rgba(16, 185, 129, 0.4), 0 0 60px rgba(59, 130, 246, 0.2);
            }

            .tab-transition {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .slide-in {
                animation: slideIn 0.4s ease-out;
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(20px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .error-shake {
                animation: shake 0.5s ease-in-out;
            }

            @keyframes shake {

                0%,
                100% {
                    transform: translateX(0);
                }

                25% {
                    transform: translateX(-5px);
                }

                75% {
                    transform: translateX(5px);
                }
            }
        </style>

    </main>
    <?php include "./includes/footer.php"; ?>

</body>
<script src="assets/js/loginPage.js"></script>

</html>