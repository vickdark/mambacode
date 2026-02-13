document.addEventListener('DOMContentLoaded', () => {
    // Force scroll to top on reload or initial access
    if (history.scrollRestoration) {
        history.scrollRestoration = 'manual';
    }
    window.scrollTo(0, 0);

    const counters = document.querySelectorAll('.stat-number');
    const duration = 3000; // Slower animation (3s)

    const animateCounters = () => {
        counters.forEach(counter => {
            // Cancel any previous animation to prevent overlap
            if (counter.dataset.animId) {
                cancelAnimationFrame(counter.dataset.animId);
            }

            const target = parseFloat(counter.getAttribute('data-target'));
            const suffix = counter.getAttribute('data-suffix') || '';
            const startTime = performance.now();

            const updateCount = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Easing function for smooth effect (easeOutCubic)
                const ease = 1 - Math.pow(1 - progress, 3);
                
                const current = target * ease;

                if (progress < 1) {
                    // Determine decimals based on target (if integer, 0 decimals window, else 1)
                    const decimals = Number.isInteger(target) ? 0 : 1;
                    counter.innerText = current.toFixed(decimals) + suffix;
                    counter.dataset.animId = requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target + suffix;
                }
            };
            
            counter.dataset.animId = requestAnimationFrame(updateCount);
        });
    };

    const resetCounters = () => {
        counters.forEach(counter => {
            if (counter.dataset.animId) {
                cancelAnimationFrame(counter.dataset.animId);
            }
            const suffix = counter.getAttribute('data-suffix') || '';
            counter.innerText = '0' + suffix;
        });
    };

    // Mobile Offcanvas Navigation Fix
    document.addEventListener('click', (e) => {
        const anchor = e.target.closest('a[href^="#"]');
        if (!anchor) return;

        const targetId = anchor.getAttribute('href');
        if (targetId === '#' || targetId.length < 2) return;

        // Si estamos en un elemento que tiene el offcanvas abierto, lo cerramos
        const offcanvasElement = document.getElementById('mobileSidebar');
        if (offcanvasElement && offcanvasElement.classList.contains('show')) {
            const bsOffcanvas = window.bootstrap.Offcanvas.getInstance(offcanvasElement);
            if (bsOffcanvas) {
                bsOffcanvas.hide();
                // No prevenimos el default, dejamos que el navegador navegue al ID
                // El scroll-behavior: smooth en CSS se encargará del resto
            }
        }
    });

    // Trigger animation when stats section is in view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
            } else {
                resetCounters(); // Reset when out of view to re-animate later
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }

    // Navbar Scroll Effect
    const nav = document.querySelector('.landing-nav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
        
        // Active link handling
        const sections = document.querySelectorAll('section, header, footer');
        const navLinks = document.querySelectorAll('.nav-link-item');
        
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.scrollY >= sectionTop - 150) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });
    

    // Magic Glow Follow Effect (No 3D Rotation)
    const setupMagicGlow = (card) => {
        let requestId = null;

        const updateGlow = (x, y) => {
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
            card.style.setProperty('--magic-opacity', '1');
        };

        const resetGlow = () => {
            if (requestId) cancelAnimationFrame(requestId);
            card.style.setProperty('--magic-opacity', '0');
        };

        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            if (requestId) cancelAnimationFrame(requestId);
            requestId = requestAnimationFrame(() => updateGlow(x, y));
        });

        card.addEventListener('mouseenter', () => {
             card.style.setProperty('--magic-opacity', '1');
        });

        card.addEventListener('mouseleave', resetGlow);
        
        // Initial state
        card.style.setProperty('--magic-opacity', '0');
    };

    document.querySelectorAll('.feature-card, .pricing-card').forEach(setupMagicGlow);

    // Back to Top Logic
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
    }

    // Randomize Feature Icon Colors
    const gradients = [
        'linear-gradient(135deg, #8257e5, #3b82f6)', // Purple Blue
        'linear-gradient(135deg, #ff005c, #8257e5)', // Pink Purple
        'linear-gradient(135deg, #3b82f6, #00d2ff)', // Blue Cyan
        'linear-gradient(135deg, #f59e0b, #fbbf24)', // Amber Yellow
        'linear-gradient(135deg, #10b981, #34d399)', // Green Emerald
        'linear-gradient(135deg, #6366f1, #a855f7)', // Indigo Purple
        'linear-gradient(135deg, #ff4d4d, #f9cb28)', // Red Orange
        'linear-gradient(135deg, #00c6ff, #0072ff)', // Bright Blue
        'linear-gradient(135deg, #d442f5, #f54291)', // Magenta Pink
        'linear-gradient(135deg, #42f5e3, #4287f5)', // Teal Blue
        'linear-gradient(135deg, #f5a442, #f54242)', // Orange Red
        'linear-gradient(135deg, #a8f542, #42f5a4)', // Lime Green
        'linear-gradient(135deg, #f542d4, #8257e5)', // Orchid Purple
        'linear-gradient(135deg, #42f566, #3b82f6)', // Mint Blue
        'linear-gradient(135deg, #f5d442, #f5a442)', // Gold Amber
        'linear-gradient(135deg, #42a8f5, #ff005c)', // Sky Pink
        'linear-gradient(135deg, #00f5ff, #8257e5)', // Electric Cyan
        'linear-gradient(135deg, #ff8a00, #da1b60)', // Sunset Orange
        'linear-gradient(135deg, #78ffd6, #007991)', // Seafoam Blue
        'linear-gradient(135deg, #4facfe, #00f2fe)'  // Ocean Blue
    ];

    // Fisher-Yates Shuffle for true randomness
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    const shuffledGradients = shuffle([...gradients]);

    document.querySelectorAll('.feature-icon').forEach((container, index) => {
        const icon = container.querySelector('i');
        const randomGradient = shuffledGradients[index % shuffledGradients.length];
        
        container.style.background = randomGradient;
        
        const mainColorMatch = randomGradient.match(/#[a-fA-F0-9]{6}/);
        const mainColor = mainColorMatch ? mainColorMatch[0] : '#8257e5';
        container.style.boxShadow = `0 10px 25px -5px rgba(0,0,0,0.6), 0 0 25px ${mainColor}66`;
        
        icon.style.backgroundImage = 'none';
        icon.style.webkitTextFillColor = '#fff';
        icon.style.color = '#fff';
    });

});
