import { applyGradientsToElements } from './_gradient_utils';

export const initProducts = () => {
    // Logic for product card clicks
    const productCards = document.querySelectorAll('.product-card');

    productCards.forEach(card => {
        const route = card.dataset.route;
        // Solo añadir el listener de clic si una ruta está definida y no es la tarjeta "próximamente"
        if (route && !card.classList.contains('product-card-coming-soon')) {
            card.style.cursor = 'pointer'; // Asegurar que el cursor sea pointer para tarjetas clicables
            card.addEventListener('click', () => {
                window.location.href = route;
            });
        } else {
            card.style.cursor = 'default'; // Establecer el cursor a default para tarjetas no clicables
        }
    });

    // Logic for product icon gradients
    applyGradientsToElements('.product-icon');
};


