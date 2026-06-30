import { gsap } from 'gsap';

function animate(defaultImg, scrollImg, toScrolled, currentTl) {
    if (currentTl) currentTl.kill();
    const tl = gsap.timeline();
    if (toScrolled) {
        tl.to(defaultImg, { opacity: 0, duration: 0.2, ease: 'power2.in' })
          .to(scrollImg,   { opacity: 1, duration: 0.3, ease: 'power2.out' });
    } else {
        tl.to(scrollImg,  { opacity: 0, duration: 0.2, ease: 'power2.in' })
          .to(defaultImg,  { opacity: 1, duration: 0.3, ease: 'power2.out' });
    }
    return tl;
}

export default function initScrollImage() {
    document.querySelectorAll('.dc26-scroll-image').forEach((el) => {
        const defaultImg = el.querySelector('.dc26-scroll-image__default');
        const scrollImg  = el.querySelector('.dc26-scroll-image__on-scroll');
        if (!defaultImg || !scrollImg) return;

        gsap.set(scrollImg,  { opacity: 0 });
        gsap.set(defaultImg, { opacity: 1 });

        let tl   = null;
        let last = false; // page loads au top, pas d'animation initiale

        const trigger = (isScrolled) => {
            if (isScrolled === last) return;
            last = isScrolled;
            tl = animate(defaultImg, scrollImg, isScrolled, tl);
        };

        // Cas 1 : dans un sticky header
        const stickyWrapper = el.closest('.wp-block-template-part.is-style-sticky-header');
        if (stickyWrapper) {
            new MutationObserver(() => trigger(stickyWrapper.classList.contains('is-scrolled')))
                .observe(stickyWrapper, { attributes: true, attributeFilter: ['class'] });
            trigger(stickyWrapper.classList.contains('is-scrolled'));
            return;
        }

        // Cas 2 : standalone — écoute le scroll
        const threshold = parseInt(el.dataset.scrollThreshold, 10) || 64;
        window.addEventListener('scroll', () => trigger(window.scrollY >= threshold), { passive: true });
        trigger(window.scrollY >= threshold);
    });
}
