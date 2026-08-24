export const initTheme = () => {
    const themeToggle = document.getElementById('themeToggle');
    const themeToggleMobile = document.getElementById('themeToggleMobile');
    const html = document.documentElement;
    const body = document.body;

    const getStoredTheme = () => localStorage.getItem('theme');
    const setStoredTheme = (theme) => localStorage.setItem('theme', theme);

    const getPreferredTheme = () => {
        const stored = getStoredTheme();
        if (stored) return stored;
        return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
    };

    const applyTheme = (theme) => {
        html.setAttribute('data-theme', theme);
        body.classList.toggle('theme-light', theme === 'light');
        body.classList.toggle('theme-dark', theme === 'dark');
        updateIcons(theme);
    };

    const updateIcons = (theme) => {
        const isLight = theme === 'light';
        const icons = {
            sun: document.querySelectorAll('.theme-icon-light'),
            moon: document.querySelectorAll('.theme-icon-dark'),
        };
        
        icons.sun.forEach(icon => {
            icon.style.display = isLight ? 'inline-block' : 'none';
        });
        icons.moon.forEach(icon => {
            icon.style.display = isLight ? 'none' : 'inline-block';
        });
    };

    const showThemePreferenceModal = () => {
        if (typeof Swal === 'undefined') return;
        
        Swal.fire({
            title: '¿Cómo prefieres ver la web?',
            html: `
                <div class="theme-preference-options">
                    <button class="theme-option-btn" data-theme="dark" style="
                        background: #0a0a0c; 
                        color: #f0f0f5; 
                        border: 2px solid #3b82f6; 
                        border-radius: 12px; 
                        padding: 1rem 2rem; 
                        margin: 0.5rem; 
                        cursor: pointer; 
                        font-weight: 600;
                        transition: all 0.2s;
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                    ">
                        <i class="fa-solid fa-moon" style="font-size: 1.5rem;"></i>
                        <span>Modo Oscuro</span>
                    </button>
                    <button class="theme-option-btn" data-theme="light" style="
                        background: #f8fafc; 
                        color: #0f172a; 
                        border: 2px solid #2563eb; 
                        border-radius: 12px; 
                        padding: 1rem 2rem; 
                        margin: 0.5rem; 
                        cursor: pointer; 
                        font-weight: 600;
                        transition: all 0.2s;
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                    ">
                        <i class="fa-solid fa-sun" style="font-size: 1.5rem;"></i>
                        <span>Modo Claro</span>
                    </button>
                </div>
                <p style="margin-top: 1rem; color: var(--mamba-text-muted); font-size: 0.9rem;">
                    Puedes cambiarlo después en el menú de navegación
                </p>
            `,
            showConfirmButton: false,
            showCloseButton: true,
            background: 'var(--mamba-surface)',
            color: 'var(--mamba-text)',
            backdrop: 'rgba(10, 10, 12, 0.8)',
            didOpen: () => {
                const buttons = Swal.getPopup().querySelectorAll('.theme-option-btn');
                buttons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const theme = btn.dataset.theme;
                        setStoredTheme(theme);
                        applyTheme(theme);
                        Swal.close();
                    });
                    btn.addEventListener('mouseenter', () => {
                        btn.style.transform = 'scale(1.02)';
                        btn.style.boxShadow = '0 8px 25px rgba(59, 130, 246, 0.3)';
                    });
                    btn.addEventListener('mouseleave', () => {
                        btn.style.transform = 'scale(1)';
                        btn.style.boxShadow = 'none';
                    });
                });
            }
        });
    };

    const toggleTheme = () => {
        const current = getStoredTheme() || (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
        const newTheme = current === 'light' ? 'dark' : 'light';
        setStoredTheme(newTheme);
        applyTheme(newTheme);
    };

    const init = () => {
        const stored = getStoredTheme();
        const theme = getPreferredTheme();
        applyTheme(theme);

        if (!stored) {
            setTimeout(() => showThemePreferenceModal(), 500);
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', toggleTheme);
        }
        if (themeToggleMobile) {
            themeToggleMobile.addEventListener('click', toggleTheme);
        }

        window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', (e) => {
            if (!getStoredTheme()) {
                applyTheme(e.matches ? 'light' : 'dark');
            }
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
};