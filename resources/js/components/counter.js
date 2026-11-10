// Animated stat counter: x-data="counter(99.9, '%')" with x-intersect start/reset.
const DURATION = 3000;

export default (target, suffix = '') => ({
    display: `0${suffix}`,
    frame: null,

    start() {
        const decimals = Number.isInteger(target) ? 0 : 1;
        const startedAt = performance.now();

        const step = (now) => {
            const progress = Math.min((now - startedAt) / DURATION, 1);
            const eased = 1 - Math.pow(1 - progress, 3);

            this.display = (progress < 1 ? (target * eased).toFixed(decimals) : target) + suffix;

            if (progress < 1) {
                this.frame = requestAnimationFrame(step);
            }
        };

        cancelAnimationFrame(this.frame);
        this.frame = requestAnimationFrame(step);
    },

    reset() {
        cancelAnimationFrame(this.frame);
        this.display = `0${suffix}`;
    },
});
