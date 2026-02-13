        // Initialize Lucide Icons

        // Password Toggle Logic
        const toggleBtn = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        toggleBtn.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';

            // Toggle Icon
            eyeIcon.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
            lucide.createIcons(); // Re-render icons
        });