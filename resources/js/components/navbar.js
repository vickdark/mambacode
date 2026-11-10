// Fixed navbar: scrolled state, reading progress, active section and mobile drawer.
export default () => ({
    scrolled: false,
    progress: 0,
    active: 'inicio',
    menuOpen: false,

    init() {
        this.onScroll();
    },

    onScroll() {
        const root = document.documentElement;
        const scrollable = root.scrollHeight - root.clientHeight;

        this.scrolled = window.scrollY > 50;
        this.progress = scrollable > 0 ? (window.scrollY / scrollable) * 100 : 0;

        for (const section of document.querySelectorAll('header[id], section[id], footer[id]')) {
            if (window.scrollY >= section.offsetTop - 150) {
                this.active = section.id;
            }
        }
    },

    isActive(...ids) {
        return ids.includes(this.active);
    },
});
