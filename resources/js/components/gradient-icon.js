// x-gradient-icon: gives each icon badge a different gradient from a shuffled palette.
const gradients = [
    ['#8257e5', '#3b82f6'],
    ['#ff005c', '#8257e5'],
    ['#3b82f6', '#00d2ff'],
    ['#f59e0b', '#fbbf24'],
    ['#10b981', '#34d399'],
    ['#6366f1', '#a855f7'],
    ['#ff4d4d', '#f9cb28'],
    ['#00c6ff', '#0072ff'],
    ['#d442f5', '#f54291'],
    ['#42f5e3', '#4287f5'],
    ['#f5a442', '#f54242'],
    ['#a8f542', '#42f5a4'],
    ['#f542d4', '#8257e5'],
    ['#42f566', '#3b82f6'],
    ['#f5d442', '#f5a442'],
    ['#42a8f5', '#ff005c'],
    ['#00f5ff', '#8257e5'],
    ['#ff8a00', '#da1b60'],
    ['#78ffd6', '#007991'],
    ['#4facfe', '#00f2fe'],
];

for (let i = gradients.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [gradients[i], gradients[j]] = [gradients[j], gradients[i]];
}

let next = 0;

export default function gradientIcon(el) {
    const [from, to] = gradients[next++ % gradients.length];

    el.style.background = `linear-gradient(135deg, ${from}, ${to})`;
    el.style.boxShadow = `0 10px 25px -5px rgba(0, 0, 0, 0.6), 0 0 25px ${from}66`;
}
