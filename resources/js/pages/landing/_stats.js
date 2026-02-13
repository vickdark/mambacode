export const initStats = () => {
    const counters = document.querySelectorAll('.stat-number');
    const duration = 3000; // Slower animation (3s)

    const animateCounters = () => {
        counters.forEach(counter => {
            // Cancel any previous animation to prevent overlap
            if (counter.dataset.animId) {
                cancelAnimationFrame(counter.dataset.animId);
            }

            const target = parseFloat(counter.getAttribute('data-target'));
            const suffix = counter.getAttribute('data-suffix') || '';
            const startTime = performance.now();

            const updateCount = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Easing function for smooth effect (easeOutCubic)
                const ease = 1 - Math.pow(1 - progress, 3);
                
                const current = target * ease;

                if (progress < 1) {
                    // Determine decimals based on target (if integer, 0 decimals window, else 1)
                    const decimals = Number.isInteger(target) ? 0 : 1;
                    counter.innerText = current.toFixed(decimals) + suffix;
                    counter.dataset.animId = requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target + suffix;
                }
            };
            
            counter.dataset.animId = requestAnimationFrame(updateCount);
        });
    };

    const resetCounters = () => {
        counters.forEach(counter => {
            if (counter.dataset.animId) {
                cancelAnimationFrame(counter.dataset.animId);
            }
            const suffix = counter.getAttribute('data-suffix') || '';
            counter.innerText = '0' + suffix;
        });
    };

    // Trigger animation when stats section is in view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
            } else {
                resetCounters(); // Reset when out of view to re-animate later
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
};
