import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import '@fortawesome/fontawesome-free/js/all.js';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

// Global Assignments
window.Alpine = Alpine;
window.Swal = Swal;

// Initialize
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Basic initialization if needed
});
