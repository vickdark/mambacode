export const gradients = [
    'linear-gradient(135deg, #8257e5, #3b82f6)', // Purple Blue
    'linear-gradient(135deg, #ff005c, #8257e5)', // Pink Purple
    'linear-gradient(135deg, #3b82f6, #00d2ff)', // Blue Cyan
    'linear-gradient(135deg, #f59e0b, #fbbf24)', // Amber Yellow
    'linear-gradient(135deg, #10b981, #34d399)', // Green Emerald
    'linear-gradient(135deg, #6366f1, #a855f7)', // Indigo Purple
    'linear-gradient(135deg, #ff4d4d, #f9cb28)', // Red Orange
    'linear-gradient(135deg, #00c6ff, #0072ff)', // Bright Blue
    'linear-gradient(135deg, #d442f5, #f54291)', // Magenta Pink
    'linear-gradient(135deg, #42f5e3, #4287f5)', // Teal Blue
    'linear-gradient(135deg, #f5a442, #f54242)', // Orange Red
    'linear-gradient(135deg, #a8f542, #42f5a4)', // Lime Green
    'linear-gradient(135deg, #f542d4, #8257e5)', // Orchid Purple
    'linear-gradient(135deg, #42f566, #3b82f6)', // Mint Blue
    'linear-gradient(135deg, #f5d442, #f5a442)', // Gold Amber
    'linear-gradient(135deg, #42a8f5, #ff005c)', // Sky Pink
    'linear-gradient(135deg, #00f5ff, #8257e5)', // Electric Cyan
    'linear-gradient(135deg, #ff8a00, #da1b60)', // Sunset Orange
    'linear-gradient(135deg, #78ffd6, #007991)', // Seafoam Blue
    'linear-gradient(135deg, #4facfe, #00f2fe)'  // Ocean Blue
];

export function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

export const applyGradientsToElements = (selector) => {
    const shuffledGradients = shuffle([...gradients]);

    document.querySelectorAll(selector).forEach((container, index) => {
        const icon = container.querySelector('i, svg');
        const randomGradient = shuffledGradients[index % shuffledGradients.length];
        
        container.style.background = randomGradient;
        
        const mainColorMatch = randomGradient.match(/#[a-fA-F0-9]{6}/);
        const mainColor = mainColorMatch ? mainColorMatch[0] : '#8257e5';
        container.style.boxShadow = `0 10px 25px -5px rgba(0,0,0,0.6), 0 0 25px ${mainColor}66`;
        
        if (icon) {
            icon.style.backgroundImage = 'none';
            icon.style.webkitTextFillColor = '#fff';
            icon.style.color = '#fff';
        }
    });
};
