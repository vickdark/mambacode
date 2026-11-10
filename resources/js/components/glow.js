// x-glow: border glow and spotlight that follow the mouse (styles in .glow-card).
export default function glow(el, _directive, { cleanup }) {
    let frame = null;

    el.classList.add('glow-card');

    const onMove = (event) => {
        if (event.pointerType !== 'mouse') return;

        const rect = el.getBoundingClientRect();
        cancelAnimationFrame(frame);
        frame = requestAnimationFrame(() => {
            el.style.setProperty('--mouse-x', `${event.clientX - rect.left}px`);
            el.style.setProperty('--mouse-y', `${event.clientY - rect.top}px`);
            el.style.setProperty('--magic-opacity', '1');
        });
    };

    const onLeave = () => {
        cancelAnimationFrame(frame);
        el.style.setProperty('--magic-opacity', '0');
    };

    el.addEventListener('pointermove', onMove);
    el.addEventListener('pointerleave', onLeave);

    cleanup(() => {
        el.removeEventListener('pointermove', onMove);
        el.removeEventListener('pointerleave', onLeave);
    });
}
