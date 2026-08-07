export function initContactForm(){
    const container = document.querySelector('.contact-form');
    if(!container) return;

    const steps = Array.from(container.querySelectorAll('[data-step]'));
    if(!steps.length) return;

    let current = 0;
    function showStep(i){
        steps.forEach((s, idx) => {
            s.classList.toggle('active', idx === i);
        });
        current = i;
        // update progress indicator if present
        const progressBar = container.querySelector('.wizard-progress > i');
        if(progressBar){
            const pct = Math.round(((i+1)/steps.length)*100);
            progressBar.style.width = pct + '%';
        }
    }

    container.addEventListener('click', (e)=>{
        if(e.target.closest('.btn-wizard-next')){
            e.preventDefault();
            const next = Math.min(current+1, steps.length-1);
            showStep(next);
            return;
        }
        if(e.target.closest('.btn-wizard-prev')){
            e.preventDefault();
            const prev = Math.max(current-1, 0);
            showStep(prev);
            return;
        }
    });

    // initialize
    showStep(0);
}
