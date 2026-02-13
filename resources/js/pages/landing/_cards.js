export const initCards = () => {
    // Magic Glow Follow Effect (No 3D Rotation)
    const setupMagicGlow = (card) => {
        let requestId = null;

        const updateGlow = (x, y) => {
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        };

        const resetGlow = () => {
            if (requestId) cancelAnimationFrame(requestId);
            card.style.setProperty('--magic-opacity', '0');
        };

        const onMouseMove = (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            if (requestId) cancelAnimationFrame(requestId);
            requestId = requestAnimationFrame(() => updateGlow(x, y));
            
            // Ensure opacity is 1 while moving inside
            card.style.setProperty('--magic-opacity', '1');
        };

        card.addEventListener('mousemove', onMouseMove);

        card.addEventListener('mouseenter', () => {
             card.style.setProperty('--magic-opacity', '1');
        });

        card.addEventListener('mouseleave', resetGlow);
        
        // Initial state
        card.style.setProperty('--magic-opacity', '0');
    };

    document.querySelectorAll('.feature-card, .pricing-card, .hero-feature-card, .product-card').forEach(setupMagicGlow);
};
