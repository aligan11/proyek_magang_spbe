    lucide.createIcons();

    function toggleLogoutModal() {
        const modal = document.getElementById('logoutModal');
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Kunci scroll layar
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Buka scroll layar
        }
    }

    // Menutup modal jika user klik di luar kotak modal
    window.onclick = function(event) {
        const modal = document.getElementById('logoutModal');
        if (event.target == modal.firstElementChild) {
            toggleLogoutModal();
        }
    }
