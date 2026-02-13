/* Landing Page Scripts - Modular Architecture */
import { initScrollRestoration } from './_utils';
import { initStats } from './_stats';
import { initNavbar } from './_navbar';
import { initCards } from './_cards';
import { initBackToTop } from './_back-to-top';
import { initFeatures } from '../products/_features';
import { initProducts } from './_products';


document.addEventListener('DOMContentLoaded', () => {
    initScrollRestoration();
    initStats();
    initNavbar();
    initCards();
    initBackToTop();
    initFeatures();
    initProducts(); // ¡Añadiendo esta línea para ejecutar la lógica de productos!
});
