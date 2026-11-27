// Bascule .is-scrolled sur le bloc au scroll (le module header-sticky de
// dc26-library fait suivre le crossfade au header à la place).

document.querySelectorAll('.dc26-scroll-image').forEach((el) => {
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
