export const initWhatsappButton = () => {
    const heroSection = document.getElementById('inicio');
    const whatsappButton = document.querySelector('.whatsapp-button');

    if (heroSection && whatsappButton) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    whatsappButton.classList.add('whatsapp-button-large');
                } else {
                    whatsappButton.classList.remove('whatsapp-button-large');
                }
            });
        }, { threshold: 0.5 }); // Ajusta este valor según cuánto de la sección debe estar visible

        observer.observe(heroSection);
    }
};
