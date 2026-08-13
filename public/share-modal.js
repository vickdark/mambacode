(function(){
  // Stub seguro para evitar errores si alguna página intenta cargar /share-modal.js
  // No asume la existencia de elementos; comprueba antes de usar addEventListener.
  try {
    // Si en el futuro se desea soporte, añadir selectores conocidos aquí.
    const trigger = document.querySelector('.share-modal-trigger') || document.getElementById('shareBtn');
    if (!trigger) return;
    // Ejemplo seguro: abrir un modal Bootstrap si tiene atributos data-bs-toggle
    if (trigger.dataset && trigger.dataset.bsToggle === 'modal') {
      // No hace nada explícito: Bootstrap gestionará el toggle mediante atributos.
      return;
    }
    // Si no usa data-bs, añadir listener seguro
    trigger.addEventListener('click', function(e){
      e.preventDefault();
      // intentar abrir el modal por id si existe
      const targetId = trigger.dataset.target || trigger.getAttribute('data-target') || '#shareModal';
      const modalEl = document.querySelector(targetId);
      if (modalEl && window.bootstrap && window.bootstrap.Modal) {
        try { new window.bootstrap.Modal(modalEl).show(); } catch(_) {}
      }
    });
  } catch (err) {
    // No interrumpir la carga si hay errores
    console.error('share-modal stub error:', err);
  }
})();
