import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';

import registerTheme from './components/theme';
import reveal from './components/reveal';
import navbar from './components/navbar';
import counter from './components/counter';
import carousel from './components/carousel';

Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.plugin(focus);

registerTheme(Alpine);

Alpine.directive('reveal', reveal);

Alpine.data('navbar', navbar);
Alpine.data('counter', counter);
Alpine.data('carousel', carousel);

window.Alpine = Alpine;
Alpine.start();
