/* Landing Page Scripts - Modular Architecture */
import { initScrollRestoration } from './_utils';
import { initStats } from './_stats';
import { initNavbar } from './_navbar';
import { initCards } from './_cards';
import { initBackToTop } from './_back-to-top';
import { initFeatures } from '../products/_features';
import { initProducts } from './_products';
import { initWhatsappButton } from './_button_whastapp';
import { initHeroAnimation } from './_hero';
import { initTheme } from './_theme';


document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initScrollRestoration();
    initStats();
    initNavbar();
    initCards();
    initBackToTop();
    initFeatures();
    initProducts(); 
    initWhatsappButton();
    initHeroAnimation();
});
