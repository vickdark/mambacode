import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';

import registerTheme from './components/theme';
import glow from './components/glow';
import reveal from './components/reveal';
import gradientIcon from './components/gradient-icon';
import navbar from './components/navbar';
import counter from './components/counter';
import carousel from './components/carousel';
import heroNetwork from './components/hero-network';

Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.plugin(focus);

registerTheme(Alpine);

Alpine.directive('glow', glow);
Alpine.directive('reveal', reveal);
Alpine.directive('gradient-icon', gradientIcon);

Alpine.data('navbar', navbar);
Alpine.data('counter', counter);
Alpine.data('carousel', carousel);
Alpine.data('heroNetwork', heroNetwork);

window.Alpine = Alpine;
Alpine.start();
