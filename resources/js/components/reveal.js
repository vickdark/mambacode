// x-reveal="0.2" animates the element in when it scrolls into view.
// Modifiers: .left, .down (default fades up). Content stays visible without JS.
const animations = {
    left: 'animate-fade-left',
    down: 'animate-fade-down',
    up: 'animate-fade-up',
};

export default function reveal(el, { modifiers, expression }, { cleanup }) {
    const direction = modifiers.find((modifier) => modifier in animations) ?? 'up';
    const delay = parseFloat(expression) || 0;

    el.dataset.reveal = 'pending';

    const observer = new IntersectionObserver(([entry]) => {
        if (!entry.isIntersecting) return;

        el.style.animationDelay = `${delay}s`;
        el.classList.add(animations[direction]);
        delete el.dataset.reveal;
        observer.disconnect();
    }, { threshold: 0.1 });

    observer.observe(el);
    cleanup(() => observer.disconnect());
}
