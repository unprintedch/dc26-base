// Fallback scroll listener quand le bloc n'est pas dans un sticky-header géré
// par header-sticky.js. Dans le header sticky, c'est .is-scrolled sur l'ancêtre
// qui déclenche le crossfade via CSS — aucun listener supplémentaire nécessaire.

document.querySelectorAll('.dc26-scroll-image').forEach((el) => {
    if (el.closest('.is-style-sticky-header')) return;

    const threshold = parseInt(el.dataset.scrollThreshold, 10) || 64;
    let last = null;

    const update = () => {
        const scrolled = window.scrollY >= threshold;
        if (scrolled === last) return;
        last = scrolled;
        el.classList.toggle('is-scrolled', scrolled);
    };

    window.addEventListener('scroll', update, { passive: true });
    update();
});
