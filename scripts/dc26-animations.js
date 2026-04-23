/**
 * DC26 — Scroll animations
 * Observe tous les éléments [class*="dc26-anim-"] et ajoute .is-visible
 * quand ils entrent dans le viewport.
 */
export default function initAnimations() {
    const els = document.querySelectorAll('[class*="dc26-anim-"]');
    if (!els.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 }
    );

    els.forEach((el) => observer.observe(el));
}
