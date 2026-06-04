import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const PARALLAX_SPEEDS = {
    'parallax-slow': 0.08,
    'parallax':      0.15,
    'parallax-fast': 0.25,
};

const REVEAL_DELAYS = {
    'reveal-delay-1': 0.1,
    'reveal-delay-2': 0.2,
    'reveal-delay-3': 0.3,
    'reveal-delay-4': 0.4,
    'reveal-delay-5': 0.5,
};

export default function initAnimations() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    // Scroll reveal — classe: reveal
    // Délai optionnel: reveal-delay-1 à reveal-delay-5
    document.querySelectorAll('.reveal').forEach(el => {
        const delayClass = Object.keys(REVEAL_DELAYS).find(c => el.classList.contains(c));
        const delay = delayClass ? REVEAL_DELAYS[delayClass] : 0;

        gsap.from(el, {
            opacity: 0,
            y: 40,
            duration: 0.9,
            delay,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 88%',
                end: 'bottom 12%',
                toggleActions: 'play reverse play reverse',
            },
        });
    });

    // Parallax — classes: parallax / parallax-slow / parallax-fast
    //
    // Cas 1 — image dans .parallax-wrap : anime l'image directement
    //   <div class="parallax-wrap"><img class="parallax"></div>
    //
    // Cas 2 — cover/group avec la classe : anime l'image de fond interne
    const parallaxSelectors = Object.keys(PARALLAX_SPEEDS).map(c => `.${c}`).join(', ');
    document.querySelectorAll(parallaxSelectors).forEach(el => {
        const speedClass = Object.keys(PARALLAX_SPEEDS).find(c => el.classList.contains(c));
        const speed = PARALLAX_SPEEDS[speedClass];

        const insideWrap = el.closest('.parallax-wrap') !== null;

        if (insideWrap) {
            const distance = el.parentElement.offsetHeight * speed;
            gsap.fromTo(el,
                { y: -distance },
                {
                    y: distance,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: el.closest('.parallax-wrap'),
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: true,
                    },
                }
            );
        } else {
            const bgImg = el.querySelector('.wp-block-cover__image-background, img');
            if (!bgImg) return;
            el.style.overflow = 'hidden';
            const distance = el.offsetHeight * speed;
            gsap.fromTo(bgImg,
                { y: -distance },
                {
                    y: distance,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: true,
                    },
                }
            );
        }
    });
}
