// Product screenshot carousel with autoplay, swipe and a fullscreen lightbox.
const INTERVAL = 5000;
const SWIPE_THRESHOLD = 40;

export default (images) => ({
    images,
    index: 0,
    lightbox: false,
    timer: null,
    touchStartX: null,

    init() {
        this.play();
        this.$watch('lightbox', (open) => {
            document.body.classList.toggle('overflow-hidden', open);
            open ? this.pause() : this.play();
        });
    },

    destroy() {
        this.pause();
    },

    get current() {
        return this.images[this.index] ?? {};
    },

    play() {
        this.pause();
        if (this.images.length > 1) {
            this.timer = setInterval(() => this.next(), INTERVAL);
        }
    },

    pause() {
        clearInterval(this.timer);
    },

    go(i) {
        this.index = (i + this.images.length) % this.images.length;
    },

    next() {
        this.go(this.index + 1);
    },

    prev() {
        this.go(this.index - 1);
    },

    open(i) {
        this.go(i);
        this.lightbox = true;
    },

    touchStart(event) {
        this.touchStartX = event.changedTouches[0].clientX;
    },

    touchEnd(event) {
        if (this.touchStartX === null) return;

        const delta = event.changedTouches[0].clientX - this.touchStartX;
        if (Math.abs(delta) > SWIPE_THRESHOLD) {
            delta < 0 ? this.next() : this.prev();
        }
        this.touchStartX = null;
    },
});
