```php
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- AI Assistant Section -->
<section id="ai-assistant" class="py-16 bg-gradient-to-br from-blue-900 to-purple-600 relative overflow-hidden">
    <div id="particles-js" class="absolute inset-0 z-0"></div>
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-8 neon-text" data-aos="fade-up">AI Օգնական</h1>
        <div class="chat-container max-w-3xl mx-auto bg-gray-900 bg-opacity-80 rounded-lg p-6 neon-border" data-aos="fade-up" data-aos-delay="200">
            <div id="chatBox" class="chat-box h-96 overflow-y-auto p-4 bg-gray-800 rounded-md mb-4 flex flex-col gap-4"></div>
            <div class="input-container flex gap-2">
                <input type="text" id="chatInput" placeholder="Հարցրեք Ձեր հարցը..." class="flex-grow p-3 rounded-md bg-gray-700 text-white focus:outline-none transition duration-300 focus:ring-2 focus:ring-teal-500" />
                <button id="sendButton" class="neon-button px-6 py-3 rounded-md text-white font-semibold hover:scale-105 transition duration-300">Ուղարկել</button>
            </div>
        </div>
    </div>
</section>

<style>
    .chat-container {
        box-shadow: 0 0 20px rgba(0, 255, 204, 0.5);
    }
    .chat-box {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 255, 204, 0.5) transparent;
    }
    .chat-box::-webkit-scrollbar {
        width: 8px;
    }
    .chat-box::-webkit-scrollbar-track {
        background: transparent;
    }
    .chat-box::-webkit-scrollbar-thumb {
        background-color: rgba(0, 255, 204, 0.5);
        border-radius: 4px;
    }
    .message {
        max-width: 80%;
        padding: 1rem;
        border-radius: 0.75rem;
        line-height: 1.5;
        word-break: break-word;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    .user-message {
        align-self: flex-end;
        background: linear-gradient(135deg, #28a745, #00ffcc);
        color: white;
        border-top-right-radius: 0;
    }
    .bot-message {
        align-self: flex-start;
        background: linear-gradient(135deg, #007bff, #00ffcc);
        color: white;
        border-top-left-radius: 0;
    }
    .message-timestamp {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 0.25rem;
        text-align: right;
    }
    .bot-message .message-timestamp {
        text-align: left;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 100, density: { enable: true, value_area: 800 } },
                color: { value: ['#00ffcc', '#ff00cc', '#00ccff'] },
                shape: { type: 'circle' },
                opacity: { value: 0.7, random: true },
                size: { value: 4, random: true },
                line_linked: { enable: true, distance: 120, color: '#ffffff', opacity: 0.5, width: 1 },
                move: { enable: true, speed: 3, direction: 'none', random: true }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' } },
                modes: { repulse: { distance: 100 }, push: { particles_nb: 4 } }
            }
        });

        // Chatbot functionality
        const chatBox = document.getElementById('chatBox');
        const chatInput = document.getElementById('chatInput');
        const sendButton = document.getElementById('sendButton');
        const apiKey = 'AIzaSyDWeq3uuJcski4pC2GyjOqQ93EWUXVjwpM';

        function formatTimestamp() {
            const now = new Date();
            return now.toLocaleTimeString('hy-AM', { hour: '2-digit', minute: '2-digit' });
        }

        function addMessage(content, isUser) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
            messageDiv.innerHTML = `
                <div>${content}</div>
                <div class="message-timestamp">${formatTimestamp()}</div>
            `;
            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        async function sendToGemini(message) {
            try {
                const response = await fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${apiKey}`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        contents: [{ parts: [{ text: message }] }]
                    })
                });

                const data = await response.json();
                if (data.candidates && data.candidates[0].content.parts[0].text) {
                    return data.candidates[0].content.parts[0].text;
                } else {
                    throw new Error('Պատասխանը դատարկ է կամ սխալ ձևաչափով:');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
                return 'Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:';
            }
        }

        sendButton.addEventListener('click', async () => {
            const message = chatInput.value.trim();
            if (!message) {
                showToast('Խնդրում ենք մուտքագրել հարց:', 'error');
                return;
            }

            addMessage(message, true);
            chatInput.value = '';

            const botResponse = await sendToGemini(message);
            addMessage(botResponse, false);
        });

        chatInput.addEventListener('keypress', async (e) => {
            if (e.key === 'Enter') {
                sendButton.click();
            }
        });
    });
</script>

<?= $this->endSection() ?>
```