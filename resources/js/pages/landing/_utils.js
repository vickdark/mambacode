export const initScrollRestoration = () => {
    // Force scroll to top on reload or initial access
    if (history.scrollRestoration) {
        history.scrollRestoration = 'manual';
    }
    window.scrollTo(0, 0);
};
