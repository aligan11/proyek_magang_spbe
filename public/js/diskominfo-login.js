/**
 * DISKOMINFO LOGIN - INTERACTIVE SCRIPTS
 */

document.addEventListener('DOMContentLoaded', function() {
    ParticleBackground.init();
    FormInteractions.init();
    ButtonEffects.init();
    Card3DEffect.init();
});

/**
 * Particle Background Animation
 */
const ParticleBackground = {
    canvas: null,
    ctx: null,
    particles: [],
    mouseX: 0,
    mouseY: 0,
    isActive: true,

    init() {
        this.canvas = document.getElementById('particles-canvas');
        if (!this.canvas) return;

        this.ctx = this.canvas.getContext('2d');
        this.resize();
        this.createParticles();
        this.bindEvents();
        this.animate();
    },

    resize() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    },

    createParticles() {
        const particleCount = window.innerWidth < 768 ? 25 : 50;
        this.particles = [];

        for (let i = 0; i < particleCount; i++) {
            this.particles.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5,
                radius: Math.random() * 3 + 1,
                opacity: Math.random() * 0.3 + 0.1,
                pulse: Math.random() * Math.PI * 2
            });
        }
    },

    bindEvents() {
        window.addEventListener('resize', () => {
            this.resize();
            this.createParticles();
        });

        document.addEventListener('mousemove', (e) => {
            this.mouseX = e.clientX;
            this.mouseY = e.clientY;
        });

        document.addEventListener('visibilitychange', () => {
            this.isActive = document.visibilityState === 'visible';
        });
    },

    animate() {
        if (!this.isActive) {
            requestAnimationFrame(() => this.animate());
            return;
        }

        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        this.particles.forEach((particle, i) => {
            particle.x += particle.vx;
            particle.y += particle.vy;
            particle.pulse += 0.02;

            // Mouse interaction
            const dx = particle.x - this.mouseX;
            const dy = particle.y - this.mouseY;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < 100) {
                const force = (100 - distance) / 100;
                particle.x += (dx / distance) * force * 2;
                particle.y += (dy / distance) * force * 2;
            }

            // Wrap around edges
            if (particle.x < 0) particle.x = this.canvas.width;
            if (particle.x > this.canvas.width) particle.x = 0;
            if (particle.y < 0) particle.y = this.canvas.height;
            if (particle.y > this.canvas.height) particle.y = 0;

            // Draw particle
            const pulseRadius = particle.radius + Math.sin(particle.pulse) * 0.5;
            const opacity = particle.opacity + Math.sin(particle.pulse) * 0.1;

            this.ctx.beginPath();
            this.ctx.arc(particle.x, particle.y, pulseRadius, 0, Math.PI * 2);
            this.ctx.fillStyle = `rgba(0, 87, 174, ${opacity})`;
            this.ctx.fill();

            // Draw connections
            this.particles.slice(i + 1).forEach(other => {
                const dx2 = particle.x - other.x;
                const dy2 = particle.y - other.y;
                const dist = Math.sqrt(dx2 * dx2 + dy2 * dy2);

                if (dist < 120) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(particle.x, particle.y);
                    this.ctx.lineTo(other.x, other.y);
                    this.ctx.strokeStyle = `rgba(0, 87, 174, ${0.1 * (1 - dist / 120)})`;
                    this.ctx.lineWidth = 0.5;
                    this.ctx.stroke();
                }
            });
        });

        requestAnimationFrame(() => this.animate());
    }
};

/**
 * Form Interactions
 */
const FormInteractions = {
    init() {
        this.form = document.getElementById('login-form');
        this.passwordToggle = document.getElementById('password-toggle');
        this.passwordInput = document.getElementById('password');
        this.rememberCheckbox = document.getElementById('remember');

        this.bindEvents();
    },

    bindEvents() {
        // Password toggle
        if (this.passwordToggle && this.passwordInput) {
            this.passwordToggle.addEventListener('click', () => {
                const isPassword = this.passwordInput.type === 'password';
                this.passwordInput.type = isPassword ? 'text' : 'password';
                this.updatePasswordIcon(isPassword);
                
                this.passwordToggle.style.transform = 'translateY(-50%) scale(0.9)';
                setTimeout(() => {
                    this.passwordToggle.style.transform = 'translateY(-50%) scale(1)';
                }, 150);
            });
        }

        // Form submission
        if (this.form) {
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSubmit();
            });
        }

        // Remember me
        if (this.rememberCheckbox) {
            this.rememberCheckbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                    this.showToast('Sesi akan diingat di perangkat ini');
                }
            });
        }
    },

    updatePasswordIcon(showing) {
        const icon = this.passwordToggle.querySelector('svg');
        if (showing) {
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
        } else {
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    },

    handleSubmit() {
        const submitBtn = this.form.querySelector('button[type="submit"]');
        const originalContent = submitBtn.innerHTML;

        submitBtn.classList.add('btn-loading');
        submitBtn.innerHTML = `
            <span class="btn-spinner"></span>
            <span>Memuat...</span>
        `;
        submitBtn.disabled = true;

        setTimeout(() => {
            submitBtn.innerHTML = originalContent;
            submitBtn.classList.remove('btn-loading');
            submitBtn.disabled = false;
            
            this.showSuccessModal();
        }, 2000);
    },

    showSuccessModal() {
        const modal = document.getElementById('success-modal');
        if (modal) {
            modal.classList.add('active');
            
            setTimeout(() => {
                modal.classList.remove('active');
            }, 2000);
        }
    },

    showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-slate-800 text-white px-4 py-3 rounded-lg shadow-lg text-sm font-medium z-50 transform translate-y-20 opacity-0 transition-all duration-300';
        toast.textContent = message;
        document.body.appendChild(toast);

        requestAnimationFrame(() => {
            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';
        });

        setTimeout(() => {
            toast.style.transform = 'translateY(20px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
};

/**
 * Button Effects
 */
const ButtonEffects = {
    init() {
        this.buttons = document.querySelectorAll('.btn-ripple-effect');
        this.bindEvents();
    },

    bindEvents() {
        this.buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                this.createRipple(e, button);
            });
        });
    },

    createRipple(e, button) {
        const rect = button.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const ripple = document.createElement('span');
        ripple.className = 'btn-ripple';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';

        button.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }
};

/**
 * 3D Card Effect
 */
const Card3DEffect = {
    init() {
        this.card = document.querySelector('.login-card');
        this.wrapper = document.querySelector('.login-card-wrapper');
        
        if (!this.card || !this.wrapper) return;

        this.bindEvents();
    },

    bindEvents() {
        this.wrapper.addEventListener('mousemove', (e) => {
            this.handleMouseMove(e);
        });

        this.wrapper.addEventListener('mouseleave', () => {
            this.resetCard();
        });
    },

    handleMouseMove(e) {
        const rect = this.wrapper.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = (y - centerY) / 20;
        const rotateY = (centerX - x) / 20;

        this.card.style.transform = `
            perspective(1000px)
            rotateX(${rotateX}deg)
            rotateY(${rotateY}deg)
            translateY(-5px)
        `;
    },

    resetCard() {
        this.card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
    }
};

/**
 * SSO Toast
 */
function showSSOComingSoon() {
    const toast = document.createElement('div');
    toast.className = 'fixed bottom-4 right-4 bg-primary text-white px-4 py-3 rounded-lg shadow-lg text-sm font-medium z-50 transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2';
    toast.style.background = '#0057ae';
    toast.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Fitur SSO akan segera hadir!</span>
    `;
    document.body.appendChild(toast);
    
    requestAnimationFrame(() => {
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';
    });
    
    setTimeout(() => {
        toast.style.transform = 'translateY(20px)';
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}