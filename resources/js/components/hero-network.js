// Loads the three.js particle network lazily, so other pages never download three.
export default () => ({
    stop: null,

    init() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        this.start();
        this.$watch('$store.theme.current', () => this.start());
    },

    async start() {
        const { startNetwork } = await import('./hero-network-scene');

        this.destroy();
        this.stop = startNetwork(this.$el, this.$store.theme.isLight);
    },

    destroy() {
        this.stop?.();
        this.stop = null;
    },
});
