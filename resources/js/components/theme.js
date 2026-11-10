// The initial data-theme is set by an inline script in the layout to avoid a flash.
const storage = {
    get() {
        try {
            return localStorage.getItem('theme');
        } catch {
            return null;
        }
    },
    set(theme) {
        try {
            localStorage.setItem('theme', theme);
        } catch {
            // Private mode or blocked storage: the choice lasts for this page only.
        }
    },
};

export default function registerTheme(Alpine) {
    const prefersLight = window.matchMedia('(prefers-color-scheme: light)');

    Alpine.store('theme', {
        current: document.documentElement.dataset.theme || 'dark',
        askPreference: !storage.get(),

        get isLight() {
            return this.current === 'light';
        },

        apply(theme) {
            this.current = theme;
            document.documentElement.dataset.theme = theme;
        },

        choose(theme) {
            this.apply(theme);
            storage.set(theme);
            this.askPreference = false;
        },

        toggle() {
            this.choose(this.isLight ? 'dark' : 'light');
        },
    });

    prefersLight.addEventListener('change', (event) => {
        if (!storage.get()) {
            Alpine.store('theme').apply(event.matches ? 'light' : 'dark');
        }
    });
}
