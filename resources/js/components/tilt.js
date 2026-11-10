// Tilts the element toward the mouse while it moves over `area` (the closest section by default).
// Sets --tilt-x / --tilt-y (deg) and --shift-x / --shift-y (px) for the element's own transform.
const MAX_TILT = 10;
const MAX_SHIFT = 12;

export default () => ({
    frame: null,

    init() {
        const fine = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
        const calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (!fine || calm) return;

        this.area = this.$el.closest('section') ?? document.body;
        this.onMove = (event) => this.move(event);
        this.onLeave = () => this.set(0, 0);

        this.area.addEventListener('pointermove', this.onMove);
        this.area.addEventListener('pointerleave', this.onLeave);
    },

    destroy() {
        this.area?.removeEventListener('pointermove', this.onMove);
        this.area?.removeEventListener('pointerleave', this.onLeave);
        cancelAnimationFrame(this.frame);
    },

    move(event) {
        const rect = this.$el.getBoundingClientRect();
        // -1..1 relative to the element's center, clamped so far-away pointers don't over-rotate
        const clamp = (value) => Math.max(-1, Math.min(1, value));
        const x = clamp((event.clientX - (rect.left + rect.width / 2)) / (window.innerWidth / 2));
        const y = clamp((event.clientY - (rect.top + rect.height / 2)) / (window.innerHeight / 2));

        this.set(x, y);
    },

    set(x, y) {
        cancelAnimationFrame(this.frame);
        this.frame = requestAnimationFrame(() => {
            const style = this.$el.style;
            style.setProperty('--tilt-x', `${(-y * MAX_TILT).toFixed(2)}deg`);
            style.setProperty('--tilt-y', `${(x * MAX_TILT).toFixed(2)}deg`);
            style.setProperty('--shift-x', `${(x * MAX_SHIFT).toFixed(1)}px`);
            style.setProperty('--shift-y', `${(y * MAX_SHIFT).toFixed(1)}px`);
        });
    },
});
