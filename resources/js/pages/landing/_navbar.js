export const initNavbar = () => {
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

    // Navbar Scroll Effect
    const nav = document.querySelector('.landing-nav');
    if (!nav) return;

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
};
