<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <!-- FAQ and Contact Page -->
    <section id="faq-contact" class="py-16 bg-gradient-to-br from-blue-900 to-purple-600 relative overflow-hidden">
        <div id="particles-js" class="absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 relative z-10">
            <!-- FAQ Section -->
            <div class="mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-center mb-6 neon-text">Հաճախ Տրվող Հարցեր</h2>
                <div class="space-y-3 max-w-2xl mx-auto">
                    <?php $faqs = [
                        ['question' => 'Ի՞նչ է AI4All-ը:', 'answer' => 'AI4All-ը նախաձեռնություն է, որը նպաստում է արհեստական բանականության նորարարական նախագծերին, իրականացնում է ուսուցման տարբեր ծրագրեր՝ հասարակությանն ու արհեստական բանականությանն ավելի մոտեցնելու նպատակով։:'],
                        ['question' => 'Ինչպե՞ս կարող եմ միանալ նախագծերին:', 'answer' => 'Մուտք գործեք Ձեր հաշիվ և սեղմեք «Միանալ» կոճակը նախագծերի էջում:'],
                        ['question' => 'Հնարավոր է՞ լքել նախագիծը։', 'answer' => 'Նախագծից դուրս գալու համար անհրաժեշտ է «քննարկում» բաժնում սեղմել «լքել» կոճակը համապատասխան նախագծի մոտ ու հաստատել որոշումը։'],
                        ['question' => 'Կան նախաձեռնություններ ուսուցիչների համար', 'answer' => 'Այո, ուսուցիչները մշտապես մեր ուշադրության կենտրոնում են և նրանց համար իրականցվում են մի շարք ծրագրեր, որոնց մասնակցելուց հետո դասավանդումը ավելի հեշտ կլինի՝ ի շնորհվի ԱԲ գործիքների։'],

                    ]; ?>
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="bg-gray-800 bg-opacity-90 rounded-lg p-4 neon-border" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                            <button onclick="toggleFAQ(<?= $index ?>)" class="w-full text-left text-lg font-semibold text-white flex justify-between items-center">
                                <span><?= esc($faq['question']) ?></span>
                                <svg id="faq-arrow-<?= $index ?>" class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="faq-answer-<?= $index ?>" class="hidden mt-2 text-gray-200 text-sm">
                                <p><?= esc($faq['answer']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="mb-12" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-3xl font-bold text-center mb-6 neon-text">Կապի Տվյալներ</h2>
                <div class="max-w-md mx-auto bg-gray-800 bg-opacity-90 p-6 rounded-lg neon-border">
                    <div class="space-y-4">
<!--                        <div class="flex items-center">-->
<!--                            <svg class="w-6 h-6 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">-->
<!--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />-->
<!--                            </svg>-->
<!--                            <a href="mailto:info@ai4all.am" class="text-white hover:text-green-400 transition duration-300">info@ai4all.am</a>-->
<!--                        </div>-->
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:wave@eif.am" class="text-white hover:text-green-400 transition duration-300">support@ai4all.am</a>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:+374(11) 219797" class="text-white hover:text-green-400 transition duration-300">+374 12 345 678</a>
                        </div>
<!--                        <div class="flex items-center">-->
<!--                            <svg class="w-6 h-6 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">-->
<!--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />-->
<!--                            </svg>-->
<!--                            <a href="tel:+37498765432" class="text-white hover:text-green-400 transition duration-300">+374 98 765 432</a>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>