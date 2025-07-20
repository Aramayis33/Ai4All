<?php $this->extend('layout') ?>
<?php $this->section('content') ?>
    <!-- Projects Page -->
    <section id="projects-page" class="relative py-16 bg-gray-900 min-h-screen overflow-hidden">
        <!-- Particles.js Background -->
        <div id="particles-js" class="absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-4xl font-bold text-center text-white mb-12 neon-text" data-aos="fade-up" data-aos-duration="800">Ընթացիկ Նախագծեր</h2>
            <?php if (empty($projects)): ?>
                <div class="text-center py-16" data-aos="zoom-in" data-aos-duration="800">
                    <h3 class="text-2xl font-semibold text-white neon-text mb-4">Ակտիվ նախագծեր դեռ չկան</h3>
                    <p class="text-gray-300 text-lg">Շուտով կավելացնենք նոր և հետաքրքիր նախագծեր։ Հետևե՛ք մեզ։</p>
                    <div class="mt-6">
                        <svg class="w-24 h-24 mx-auto text-green-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($projects as $index => $project): ?>
                        <div class="relative bg-gray-800 bg-opacity-80 rounded-lg p-6 neon-border group" data-aos="fade-up" data-aos-delay="<?php echo esc($index * 100); ?>">
                            <img src="<?php echo esc(base_url('assets/images/'.$project['image'])); ?>" alt="<?php echo esc($project['title']); ?>" class="w-full h-48 object-cover rounded-lg mb-4 transition-transform duration-300 group-hover:scale-105">
                            <h3 class="text-xl font-bold text-white mb-2"><?php echo esc($project['title']); ?></h3>
                            <p class="text-gray-200 mb-4 line-clamp-3"><?php echo esc($project['description']); ?></p>
                            <button onclick="openJoinModal(<?php echo esc($project['id']); ?>, '<?php echo esc($project['title']); ?>')" class="w-full bg-green-500 hover:bg-green-600 text-white p-3 rounded-lg font-semibold transition duration-300 neon-button">Միանալ</button>                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Join Confirmation Modal -->
        <div id="joinModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="bg-gray-900 bg-opacity-90 rounded-lg p-6 w-full max-w-md neon-border" data-aos="zoom-in" data-aos-duration="500">
                <h3 id="joinModalTitle" class="text-xl font-bold text-white neon-text mb-4">Հաստատեք մասնակցությունը</h3>
                <p class="text-gray-200 mb-6">Համոզվա՞ծ եք, որ ցանկանում եք միանալ այս նախագծին:</p>
                <div class="flex justify-end space-x-4">
                    <button onclick="closeModal('joinModal')" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-300">Ոչ</button>
                    <button onclick="joinProject(currentProjectId); closeModal('joinModal')" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition duration-300 neon-button">Այո</button>
                </div>
            </div>
        </div>
    </section>
<script>
    let currentProjectId = null;

    function openJoinModal(projectId, projectTitle) {
        currentProjectId = projectId;
        document.getElementById('joinModalTitle').textContent = `Հաստատեք մասնակցությունը - ${projectTitle}`;
        openModal('joinModal');
    }
</script>
<?php $this->endSection() ?>


