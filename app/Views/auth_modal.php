<div id="authModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div id="toastMessage" class="px-6 py-4 rounded-lg shadow-lg text-white text-lg font-semibold neon-border"></div>
    </div>
    <!-- Modal Content -->
    <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-full max-w-md relative neon-border">
        <button onclick="closeModal('authModal')" class="absolute top-2 right-2 text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="flex border-b border-gray-700 mb-4">
            <button class="flex-1 py-2 text-lg font-semibold text-white border-b-2 border-blue-500" onclick="showTab('login')">Մուտք</button>
            <button class="flex-1 py-2 text-lg font-semibold text-white" onclick="showTab('signup')">Գրանցվել</button>
        </div>
        <!-- Login Form -->
        <div id="login" class="tab-content">
            <form id="loginForm" method="post">
                <div class="mb-4">
                    <label for="loginEmail" class="block text-gray-300 mb-2">Էլ. փոստ</label>
                    <input type="email" id="loginEmail" name="email" class="w-full p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 neon-border" required>
                </div>
                <div class="mb-4">
                    <label for="loginPassword" class="block text-gray-300 mb-2">Գաղտնաբառ</label>
                    <input type="password" id="loginPassword" name="password" class="w-full p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 neon-border" required>
                </div>
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white p-3 rounded-lg font-semibold transition duration-300 neon-button">Մուտք գործել</button>
            </form>
        </div>
        <!-- Signup Form -->
        <div id="signup" class="tab-content hidden">
            <form id="signupForm" method="post">
                <div class="mb-4">
                    <label for="signupName" class="block text-gray-300 mb-2">Անուն</label>
                    <input type="text" id="signupName" name="name" class="w-full p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 neon-border" required>
                </div>
                <div class="mb-4">
                    <label for="signupLastName" class="block text-gray-300 mb-2">Ազգանուն</label>
                    <input type="text" id="signupLastName" name="lastName" class="w-full p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 neon-border" required>
                </div>
                <div class="mb-4">
                    <label for="signupEmail" class="block text-gray-300 mb-2">Էլ. փոստ</label>
                    <input type="email" id="signupEmail" name="email" class="w-full p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 neon-border" required>
                </div>
                <div class="mb-4">
                    <label for="signupPassword" class="block text-gray-300 mb-2">Գաղտնաբառ</label>
                    <input type="password" id="signupPassword" name="password" class="w-full p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 neon-border" required>
                </div>
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white p-3 rounded-lg font-semibold transition duration-300 neon-button">Գրանցվել</button>
            </form>
        </div>
    </div>
</div>