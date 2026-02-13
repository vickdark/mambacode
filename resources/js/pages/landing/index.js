/* Landing Page Scripts - Modular Architecture */
import { initScrollRestoration } from './_utils';
import { initStats } from './_stats';
import { initNavbar } from './_navbar';
import { initCards } from './_cards';
import { initBackToTop } from './_back-to-top';
import { initFeatures } from './_features';

document.addEventListener('DOMContentLoaded', () => {
    initScrollRestoration();
    initStats();
    initNavbar();
    initCards();
    initBackToTop();
    initFeatures();
});
