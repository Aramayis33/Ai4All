<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <!-- Hero Section with Particles.js -->
    <section id="hero" class="relative h-screen flex items-center justify-center text-center bg-gradient-to-br from-blue-900 to-purple-600 overflow-hidden">
        <div id="particles-js" class="absolute inset-0 z-0"></div>
        <div class="relative z-10">
            <h1 class="text-5xl md:text-7xl font-bold mb-4 neon-text" data-aos="fade-up">Ապագան սկսվում է AI4all-ի հետ</h1>
            <p class="text-xl md:text-2xl mb-6 text-gray-200" data-aos="fade-up" data-aos-delay="200">Միացեք մեր ծրագրերին, սովորոք նոր հմտություններ, կառավարեք Ձեր ժամանակը։</p>
            <div class="space-x-4" data-aos="fade-up" data-aos-delay="400">
                <a  href="<?=base_url('projects')?>" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full text-lg font-semibold transition duration-300 neon-button">Տեսնել Ընթացիկ նախագծերը</a>
<!--                <button onclick="openModal('authModal')" class="inline-block bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 px-6 py-3 rounded-full text-lg font-semibold transition duration-300 neon-button">Միացիր հիմա</button>-->
                <a href="<?=base_url('ai-assistant')?>" class="inline-block bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 px-6 py-3 rounded-full text-lg font-semibold transition duration-300 neon-button">Դիմել օգնականին</a>


            </div>
        </div>
    </section>

    <!-- About AI Section -->
    <section id="about-ai" class="py-16 bg-gradient-to-br from-blue-900 to-purple-600">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8 neon-text" data-aos="fade-up">Արհեստական Բանականության մասին</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right">
                    <p class="text-lg text-gray-200 mb-4">Արհեստական բանականությունը (AI) վերափոխում է մեր աշխարհը՝ հնարավորություն տալով ստեղծել խելացի լուծումներ բիզնեսի, կրթության, առողջապահության և այլ ոլորտներում։ AI4ALL նախաձեռնության շրջանակներում մենք օգտագործում ենք AI-ի ներուժը՝ Ձեզ նորարարական ծրագրեր առաջարկելու և համայնք ստեղծելու համար։ Ժամանակը թանկ է, և տիրապետելով նորարարական գործիքներին դուք կարող եք ավելի արդյունավետ կառավարել Ձեր ժամանակը։</p>
                    <p class="text-lg text-gray-200">Մեր առաքելությունն է հզորացնել Ձեր գաղափարները AI-ի միջոցով՝ ստեղծելով ապագա, որտեղ տեխնոլոգիան ծառայում է մարդկությանը։</p>
                </div>
                <div data-aos="fade-left">
                    <img src=<?=base_url("assets/images/aiWithHuman")?> alt="AI Illustration" class="w-full h-auto rounded-lg neon-border">
                </div>
            </div>
        </div>
    </section>

    <!-- Goals Section -->
    <section id="goals" class="py-16 bg-gradient-to-br from-blue-900 to-purple-600">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8 neon-text" data-aos="fade-up">Մեր նպատակները</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative bg-gray-900 bg-opacity-50 rounded-lg p-6 neon-border group" data-aos="zoom-in" data-aos-delay="100">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 9.143m0 0a3 3 0 00-1.143 2.286M21 9.143H14.286M9 21l6-2.286L12.714 12M9 21H2.286m10.428-9.143L9 21" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white text-center">Խթանել AI-ի կիրառումը</h3>
                    <p class="text-gray-200 text-center mt-2">AI-ի ներուժի օգտագործում տարբեր ոլորտներում</p>
                </div>
                <div class="relative bg-gray-900 bg-opacity-50 rounded-lg p-6 neon-border group" data-aos="zoom-in" data-aos-delay="200">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white text-center">Հնարավորություն սովորելու</h3>
                    <p class="text-gray-200 text-center mt-2">Հարթակ օգտատերերին՝ սովորելու և համագործակցելու համար</p>
                </div>
                <div class="relative bg-gray-900 bg-opacity-50 rounded-lg p-6 neon-border group" data-aos="zoom-in" data-aos-delay="300">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white text-center">Համայնքի ստեղծում</h3>
                    <p class="text-gray-200 text-center mt-2">AI նորարարություններին տիրապետող համայնք</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Projects Section -->
    <section id="projects" class="py-16 bg-gradient-to-br from-blue-900 to-purple-600">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8 neon-text" data-aos="fade-up">Eif այլ ծրագրեր</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="relative overflow-hidden rounded-lg shadow-lg group" data-aos="fade-up">
                    <img src=<?=base_url("assets/images/codeBattle.png")?> alt="Նախագիծ 1" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <div>
                            <h3 class="text-xl font-bold text-white">AI Code Battle</h3>
                            <p class="text-gray-200">Արհեստական բանականության խթանող ծրագիր</p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg shadow-lg group" data-aos="fade-up" data-aos-delay="100">
                    <img src=<?=base_url("assets/images/keyImage.png")?> alt="Նախագիծ 2" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <div>
                            <h3 class="text-xl font-bold text-white">Քո աշխատանքի բանալին</h3>
                            <p class="text-gray-200">Արշավ՝ սկսնակ ծրագրավորողների համար</p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg shadow-lg group" data-aos="fade-up" data-aos-delay="200">
                    <img src=<?=base_url("assets/images/vibeCodeImage.png")?> alt="Նախագիծ 3" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <div>
                            <h3 class="text-xl font-bold text-white">Code with wibes</h3>
                            <p class="text-gray-200">Վեբկայքերի մշակում՝ արհետսական բանականության գործիքներով</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="300">
                <a href="<?= base_url('projects') ?>" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full text-lg font-semibold transition duration-300 neon-button">Տեսնել ընթացիկ նախագծերը</a>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section id="partners" class="py-16 bg-gradient-to-br from-blue-900 to-purple-600">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8 neon-text" data-aos="fade-up">Մեր Գործընկերները</h2>
            <div class="overflow-hidden">
                <div class="carousel flex">
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/startup.jpg")?> alt="Partner 1 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/sololearn.jpg")?> alt="Partner 2 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/eif.png")?> alt="Partner 3 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/engineer.png")?> alt="Partner 4 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/sololearn.jpg")?> alt="Partner 2 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/startup.jpg")?> alt="Partner 1 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/sololearn.jpg")?> alt="Partner 2 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/eif.png")?> alt="Partner 3 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/engineer.png")?> alt="Partner 4 Logo" class="h-16 object-contain neon-border">
                    </div>
                    <div class="carousel-item">
                        <img src=<?=base_url("assets/images/startup.jpg")?> alt="Partner 1 Logo" class="h-16 object-contain neon-border">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>