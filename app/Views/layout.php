<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-name" content="<?= csrf_token() ?>">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title>AI4All - <?= isset($title) ? esc($title) : 'Հիմնական' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
</head>
<body class="bg-gray-900 text-white" data-is-logged-in="<?= session()->has('user') ? 'true' : 'false' ?>">
<!-- Navigation Bar -->
<nav class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg py-4">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <a class="flex items-center" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/images/aiforalllogo.png') ?>" alt="AI Կայք Լոգո" class="h-12 w-auto object-contain rounded-md transition-transform duration-300 hover:scale-110">
                <span class="ml-3 text-xl font-bold text-white">AI4All</span>
            </a>
            <button id="navToggle" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div id="navMenu" class="hidden md:flex md:items-center space-x-4">
                <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300 <?php echo uri_string() == '' ? 'border-b-2' : ''; ?>" href="<?php echo base_url(); ?>">Հիմնական</a>
                <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300 <?php echo uri_string() == 'projects' ? 'border-b-2' : ''; ?>" href="<?php echo base_url('projects'); ?>">Նախագծեր</a>
                <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?php echo base_url('discussion'); ?>">Քննարկում</a>
                <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?php echo base_url('ai-assistant'); ?>">AI Օգնական</a>
                <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?php echo base_url('faq-contact'); ?>">ՀՏՀ և Կապ</a>
                <?php if (session()->has('user')): ?>
                    <div class="relative">
                        <button onclick="toggleDropdown()" class="neon-button px-4 py-2 rounded-full text-white font-semibold" id="userDropdownButton">
                            <?php echo esc(session()->get('user')->first_name . ' ' . session()->get('user')->last_name[0] . '.'); ?>
                        </button>
                        <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-gray-900 bg-opacity-90 rounded-lg shadow-lg hidden neon-border z-50">
                            <a href="#" onclick="logout()" class="block px-4 py-2 text-white hover:bg-green-600 transition duration-300">Ելք</a>
                        </div>
                    </div>
                <?php else: ?>
                    <button onclick="openModal('authModal')" class="neon-button px-4 py-2 rounded-full text-white font-semibold">Մուտք</button>
                <?php endif; ?>
            </div>
        </div>
        <div id="mobileNav" class="md:hidden hidden flex-col space-y-2 mt-4">
            <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300 <?= uri_string() == '' ? 'border-b-2' : '' ?>" href="<?= base_url() ?>">Հիմնական</a>
            <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?= base_url('projects') ?>">Նախագծեր</a>
            <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?= base_url('discussion') ?>">Քննարկում</a>
            <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?= base_url('ai-assistant') ?>">AI Օգնական</a>
            <a class="text-white hover:text-gray-200 hover:border-b-2 border-gray-200 transition duration-300" href="<?= base_url('faq-contact') ?>">ՀՏՀ և Կապ</a>
            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full transition duration-300" onclick="openModal('authModal')">Մուտք</button>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    <?= $this->renderSection('content') ?>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-6">
    <p>© 2025. Բոլոր իրավունքները պաշտպանված են։</p>
</footer>

<!-- Auth Modal -->
<?= $this->include('auth_modal') ?>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>
</html>