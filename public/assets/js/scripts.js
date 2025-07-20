function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('hidden');
}

function logout() {
        fetch('logout', {
            method: 'POST',
            headers: {

            }
        })
    .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Ելքը ձախողվեց: Խնդրում ենք փորձել կրկին:');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ինչ-որ սխալ տեղի ունեցավ:');
            });

}


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

    // Initialize AOS
    AOS.init({ duration: 1000, once: true });

    // Modal Control
    window.openModal = function(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    };

    window.closeModal = function(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    };

    window.showTab = function(tabId) {
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
        document.getElementById(tabId).classList.remove('hidden');
        document.querySelectorAll('.flex.border-b button').forEach(btn => btn.classList.remove('border-b-2', 'border-blue-500'));
        document.querySelector(`button[onclick="showTab('${tabId}')"]`).classList.add('border-b-2', 'border-blue-500');
    };

    // Mobile Nav Toggle
    document.getElementById('navToggle').addEventListener('click', function() {
        const mobileNav = document.getElementById('mobileNav');
        mobileNav.classList.toggle('hidden');
    });


    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }


    // Toast Notification Function
    function showToast(message, type = 'error') {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        toastMessage.textContent = message;
        toastMessage.className = `px-6 py-4 rounded-lg shadow-lg text-white text-lg font-semibold neon-border ${type}`;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3500); // Hide after 3.5 seconds
    }


    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value.trim();

        if (!validateEmail(email)) {
            showToast('Խնդրում ենք մուտքագրել վավեր էլ. փոստ', 'error');
            return;
        }
        if (password.length < 6) {
            showToast('Գաղտնաբառը պետք է լինի առնվազն 6 նիշ', 'error');
            return;
        }

        fetch('login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal('authModal');
                    showToast(data.message || 'Գործողությունը կատարված է', 'success');
                    window.location.reload();
                } else {
                    showToast(data.message || 'Սխալ էլ. փոստ կամ գաղտնաբառ', 'error');
                }
            })
            .catch(error => {
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
            });
    });

    // Signup Form
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('signupName').value.trim();
        const email = document.getElementById('signupEmail').value.trim();
        const password = document.getElementById('signupPassword').value.trim();
        const lastName = document.getElementById('signupLastName').value.trim();

        if (name.length < 2) {
            showToast('Անունը պետք է լինի առնվազն 2 նիշ', 'error');
            return;
        }
        if (!validateEmail(email)) {
            showToast('Խնդրում ենք մուտքագրել վավեր էլ. փոստ','error');
            return;
        }
        if (password.length < 6) {
            showToast('Գաղտնաբառը պետք է լինի առնվազն 6 նիշ','error');
            return;
        }

        fetch('signup', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify({ name, email, password,lastName })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal('authModal');
                    showToast(data.message || 'Գործողությունը կատարված է', 'success');
                    window.location.reload();
                } else {
                    showToast(data.message || 'Գրանցման սխալ','error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկի:','error');
            });
    });




});
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

    // Initialize AOS
    AOS.init({ duration: 1000, once: true });

    // Modal Control
    window.openModal = function(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    };

    window.closeModal = function(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    };

    window.showTab = function(tabId) {
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
        document.getElementById(tabId).classList.remove('hidden');
        document.querySelectorAll('.flex.border-b button').forEach(btn => btn.classList.remove('border-b-2', 'border-blue-500'));
        document.querySelector(`button[onclick="showTab('${tabId}')"]`).classList.add('border-b-2', 'border-blue-500');
    };

    // Mobile Nav Toggle
    document.getElementById('navToggle').addEventListener('click', function() {
        const mobileNav = document.getElementById('mobileNav');
        mobileNav.classList.toggle('hidden');
    });

    // Toast Notification Function
    function showToast(message, type = 'error') {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        toastMessage.textContent = message;
        toastMessage.className = `px-6 py-4 rounded-lg shadow-lg text-white text-lg font-semibold neon-border ${type}`;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3500); // Hide after 3.5 seconds
    }

    // Validate Email
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Login Form
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value.trim();

        if (!validateEmail(email)) {
            showToast('Խնդրում ենք մուտքագրել վավեր էլ. փոստ', 'error');
            return;
        }
        if (password.length < 6) {
            showToast('Գաղտնաբառը պետք է լինի առնվազն 6 նիշ', 'error');
            return;
        }

        fetch('login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Մուտքը հաջողվեց!', 'success');
                    closeModal('authModal');
                    window.location.reload();
                } else {
                    showToast(data.message || 'Սխալ էլ. փոստ կամ գաղտնաբառ', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
            });
    });

    // Signup Form
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('signupName').value.trim();
        const lastName = document.getElementById('signupLastName').value.trim();
        const email = document.getElementById('signupEmail').value.trim();
        const password = document.getElementById('signupPassword').value.trim();

        if (name.length < 2) {
            showToast('Անունը պետք է լինի առնվազն 2 նիշ', 'error');
            return;
        }
        if (lastName.length < 2) {
            showToast('Ազգանունը պետք է լինի առնվազն 2 նիշ', 'error');
            return;
        }
        if (!validateEmail(email)) {
            showToast('Խնդրում ենք մուտքագրել վավեր էլ. փոստ', 'error');
            return;
        }
        if (password.length < 6) {
            showToast('Գաղտնաբառը պետք է լինի առնվազն 6 նիշ', 'error');
            return;
        }

        fetch('/signup', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, lastName, email, password })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Գրանցումը հաջողվեց!', 'success');
                    closeModal('authModal');
                    window.location.reload();
                } else {
                    showToast(data.message || 'Գրանցման սխալ', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
            });
    });

    // Logout Function
    window.logout = function() {
        fetch('logout', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Ելքը հաջողվեց!', 'success');
                    window.location.reload();
                } else {
                    showToast(data.message || 'Ելքի սխալ', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
            });
    };

    // Join Project Function
    window.joinProject = function(projectId) {
        const isLoggedIn = document.body.getAttribute('data-is-logged-in') === 'true';
        if (!isLoggedIn) {
            showToast('Խնդրում ենք մուտք գործել նախագծին միանալու համար', 'error');
            openModal('authModal');
            return;
        }

        fetch('add-application', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ project_id: projectId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // showToast('Դուք հաջողությամբ միացաք նախագծին!', 'success');
                    window.location.reload();
                } else {
                    showToast(data.message || 'Նախագծին միանալու սխալ', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Հարցումը ձախողվեց: Խնդրում ենք փորձել կրկին:', 'error');
            });
    };


});
document.addEventListener('DOMContentLoaded', function() {
    // Toggle FAQ
    window.toggleFAQ = function(index) {
        const answer = document.getElementById(`faq-answer-${index}`);
        const arrow = document.getElementById(`faq-arrow-${index}`);
        answer.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    };
});