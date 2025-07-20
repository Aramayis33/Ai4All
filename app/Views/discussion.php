<?php $this->extend('layout') ?>
<?php $this->section('content') ?>
    <!-- Discussion Page -->
    <section id="discussion-page" class="relative py-16 bg-gray-900 min-h-screen overflow-hidden">
        <!-- Particles.js Background -->
        <div id="particles-js" class="absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-4xl font-bold text-center text-white mb-12 neon-text animate-pulse" data-aos="zoom-in" data-aos-duration="800">Քննարկում</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- User Projects Sidebar -->
                <div class="lg:w-1/4 bg-gray-800 bg-opacity-90 rounded-xl p-6 neon-border shadow-md" data-aos="fade-right" data-aos-duration="800">
                    <h3 class="text-2xl font-semibold text-white neon-text mb-4">Իմ Նախագծերը</h3>
                    <?php if (empty($userProjects)): ?>
                        <p class="text-gray-300 text-center text-lg neon-text">Դուք դեռ միացած չեք որևէ նախագծի։</p>
                    <?php else: ?>
                        <ul id="projectList" class="space-y-3">
                            <?php foreach ($userProjects as $project): ?>
                                <li class="flex items-center gap-2">
                                    <button onclick="loadDiscussion(<?php echo esc($project['project_id']); ?>, '<?php echo esc($project['title']); ?>')" class="flex-1 text-left text-white bg-gray-800 hover:bg-gradient-to-r hover:from-green-500 hover:to-teal-500 p-3 rounded-lg transition duration-300 neon-border shadow-sm hover:shadow-lg <?php echo isset($selected_project_id) && $selected_project_id == $project['project_id'] ? 'bg-gradient-to-r from-green-500 to-teal-500' : ''; ?>">
                                        <?php echo esc($project['title']); ?>
                                    </button>
                                    <button onclick="leaveProject(<?php echo esc($project['project_id']); ?>)" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-2 py-1 rounded-lg text-sm transition duration-300 neon-button shadow-sm hover:shadow-lg">Լքել</button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- Discussion Area -->
                <div class="lg:w-3/4 bg-gray-800 bg-opacity-90 rounded-xl p-6 neon-border shadow-md flex flex-col max-h-[80vh] overflow-y-auto sm:max-h-[70vh]" data-aos="fade-left" data-aos-duration="800">
                    <h3 id="discussionTitle" class="text-2xl font-semibold text-white neon-text mb-4">Ընտրեք նախագիծ՝ քննարկումը սկսելու համար</h3>
                    <div id="discussionArea" class="flex-1 space-y-4 p-4 bg-gray-900 bg-opacity-95 rounded-lg neon-border">
                        <!-- Messages will be loaded here dynamically -->
                    </div>
                    <div id="messageInputArea" class="mt-6 hidden">
                        <div class="flex items-end gap-2">
                            <textarea id="messageInput" class="flex-1 p-3 bg-gray-900 rounded-lg text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-400 neon-border transition duration-300" rows="3" placeholder="Գրեք Ձեր հաղորդագրությունը..."></textarea>
                            <button onclick="sendMessage()" class="bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 text-white px-4 py-2 rounded-lg font-semibold transition duration-300 neon-button shadow-sm hover:shadow-lg">Ուղարկել</button>
                        </div>
                    </div>
                    <div id="noProjectSelected" class="mt-6 flex flex-col items-center justify-center text-center text-gray-300 flex-1">
                        <svg class="w-16 h-16 text-cyan-400 mb-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z"></path>
                        </svg>
                        <p class="text-lg neon-text animate-pulse">Ընտրեք նախագիծ՝ զրույցը սկսելու համար</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript for Discussion Functionality -->
    <script>
        let currentProjectId = null;
        let discussionInterval = null;

        function loadDiscussion(projectId, projectTitle) {
            currentProjectId = projectId;
            document.getElementById('discussionTitle').textContent = `Քննարկում - ${projectTitle}`;
            document.getElementById('messageInputArea').classList.remove('hidden');
            document.getElementById('noProjectSelected').classList.add('hidden');
            fetchDiscussion();

            // Clear previous interval and set new one
            if (discussionInterval) clearInterval(discussionInterval);
            discussionInterval = setInterval(fetchDiscussion, 5000);

            // Highlight selected project
            document.querySelectorAll('.lg\\:w-1\\/4 button:not(.from-red-500)').forEach(btn => {
                btn.classList.remove('bg-gradient-to-r', 'from-green-500', 'to-teal-500');
                if (parseInt(btn.getAttribute('onclick').match(/\d+/)[0]) === projectId) {
                    btn.classList.add('bg-gradient-to-r', 'from-green-500', 'to-teal-500');
                }
            });
        }

        function fetchDiscussion() {
            if (!currentProjectId) return;

            fetch('discussion', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ projectId: currentProjectId })
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        showToast(data.message || 'Չհաջողվեց բեռնել քննարկումը', 'error');
                        return;
                    }

                    const discussionArea = document.getElementById('discussionArea');
                    discussionArea.innerHTML = '';
                    const userId = document.body.getAttribute('data-is-logged-in') === 'true' ? <?php echo session()->has('user') ? esc(session()->get('user')->id) : 0; ?> : 0;
                    const discussionContainer = document.querySelector('.lg\\:w-3\\/4');

                    for (const date in data.discussion) {
                        const dateHeader = document.createElement('div');
                        dateHeader.className = 'text-center text-gray-300 my-6 text-sm font-semibold relative';
                        dateHeader.innerHTML = `
                            <span class="inline-block bg-gray-900 bg-opacity-80 px-4 py-1 rounded-full neon-border border-t-2 border-cyan-400">${new Date(date).toLocaleDateString('hy-AM', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
                        `;
                        discussionArea.appendChild(dateHeader);

                        data.discussion[date].forEach(message => {
                            const messageDiv = document.createElement('div');
                            const isOwnMessage = message.user_id == userId;
                            messageDiv.className = `flex ${isOwnMessage ? 'justify-end' : 'justify-start'} mb-4`;
                            messageDiv.innerHTML = `
                                <div class="${isOwnMessage ? 'bg-gradient-to-r from-green-500 to-teal-500' : 'bg-gradient-to-r from-gray-700 to-gray-600'} bg-opacity-90 p-4 rounded-2xl max-w-xs md:max-w-md neon-border shadow-md transition-all duration-300 hover:scale-105">
                                    <p class="text-cyan-300 font-bold text-sm">${message.first_name}</p>
                                    <p class="text-white text-sm mt-1">${message.message_title}</p>
                                    <p class="text-xs text-gray-300 mt-2 text-right">${new Date(message.action_date).toLocaleTimeString('hy-AM', { hour: '2-digit', minute: '2-digit' })}</p>
                                </div>
                            `;
                            discussionArea.appendChild(messageDiv);
                        });
                    }

                    // Scroll to the bottom of the discussion container
                    discussionContainer.scrollTop = discussionContainer.scrollHeight;
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Չհաջողվեց բեռնել քննարկումը: Խնդրում ենք փորձել կրկին:', 'error');
                });
        }

        function sendMessage() {
            const isLoggedIn = document.body.getAttribute('data-is-logged-in') === 'true';
            if (!isLoggedIn) {
                showToast('Խնդրում ենք մուտք գործել՝ հաղորդագրություն ուղարկելու համար', 'error');
                openModal('authModal');
                return;
            }

            if (!currentProjectId) {
                showToast('Խնդրում ենք ընտրել նախագիծ՝ հաղորդագրություն ուղարկելու համար', 'error');
                return;
            }

            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value.trim();
            if (!message) {
                showToast('Հաղորդագրությունը չի կարող դատարկ լինել', 'error');
                return;
            }

            fetch('send-message', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ project_id: currentProjectId, message_title: message })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Հաղորդագրությունն ուղարկվեց!', 'success');
                        messageInput.value = ''; // Clear the input field
                        fetchDiscussion(); // Immediately refresh messages
                    } else {
                        showToast(data.message || 'Հաղորդագրություն ուղարկելու սխալ', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
                });
        }

        function leaveProject(projectId) {
            const isLoggedIn = document.body.getAttribute('data-is-logged-in') === 'true';
            if (!isLoggedIn) {
                showToast('Խնդրում ենք մուտք գործել՝ նախագիծը լքելու համար', 'error');
                openModal('authModal');
                return;
            }

            if (confirm('Հաստատո՞ւմ եք, որ ցանկանում եք լքել այս նախագիծը։')) {
                fetch('leave-project', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ project_id: projectId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast('Դուք լքեցիք նախագիծը!', 'success');
                            // If the current project is being left, reset discussion
                            if (currentProjectId === projectId) {
                                currentProjectId = null;
                                document.getElementById('discussionTitle').textContent = 'Ընտրեք նախագիծ՝ քննարկումը սկսելու համար';
                                document.getElementById('discussionArea').innerHTML = '';
                                document.getElementById('messageInputArea').classList.add('hidden');
                                document.getElementById('noProjectSelected').classList.remove('hidden');
                                if (discussionInterval) clearInterval(discussionInterval);
                            }
                            // Refresh project list
                            fetchUserProjects();
                        } else {
                            showToast(data.message || 'Նախագիծը լքելու սխալ', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
                    });
            }
        }

        function fetchUserProjects() {
            fetch('get_user_projects', {
                method: 'GET',
                headers: { 'Content-Type': 'application/json' }
            })
                .then(response => response.json())
                .then(data => {
                    const projectList = document.getElementById('projectList');
                    projectList.innerHTML = '';
                    if (data.length === 0) {
                        projectList.parentElement.innerHTML = '<p class="text-gray-300 text-center text-lg neon-text">Դուք դեռ միացած չեք որևէ նախագծի։</p>';
                        return;
                    }
                    data.forEach(project => {
                        const li = document.createElement('li');
                        li.className = 'flex items-center gap-2';
                        li.innerHTML = `
                            <button onclick="loadDiscussion(${project.project_id}, '${project.title}')" class="flex-1 text-left text-white bg-gray-800 hover:bg-gradient-to-r hover:from-green-500 hover:to-teal-500 p-3 rounded-lg transition duration-300 neon-border shadow-sm hover:shadow-lg ${currentProjectId === project.project_id ? 'bg-gradient-to-r from-green-500 to-teal-500' : ''}">
                                ${project.title}
                            </button>
                            <button onclick="leaveProject(${project.project_id})" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-2 py-1 rounded-lg text-sm transition duration-300 neon-button shadow-sm hover:shadow-lg">Լքել</button>
                        `;
                        projectList.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Չհաջողվեց բեռնել նախագծերի ցանկը', 'error');
                });
        }
    </script>
<?php $this->endSection() ?>