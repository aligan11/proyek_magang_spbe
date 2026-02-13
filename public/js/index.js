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


    // Pastikan lucide dijalankan
    lucide.createIcons();

    function toggleSidebar() {
        const sidebar = document.getElementById('mobile-sidebar');
        const overlay = document.getElementById('mobile-sidebar-overlay');
        
        if (sidebar.classList.contains('-translate-x-full')) {
            // Buka Sidebar
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.add('opacity-100');
            }, 10);
            document.body.style.overflow = 'hidden'; // Lock scroll
        } else {
            // Tutup Sidebar
            sidebar.classList.add('-translate-x-full');
            overlay.classList.remove('opacity-100');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
            document.body.style.overflow = 'auto'; // Unlock scroll
        }
    }




    
