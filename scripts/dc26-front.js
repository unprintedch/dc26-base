import "./dc26-offcanvas.js";
import scrollBehavior from './scroll-behavior.js';

// Initialiser le comportement du header (shrink + hide/show au scroll)
// et les animations d'apparition au scroll
scrollBehavior({
  headerSelector: '#menu-container',
  shrinkAt: 50,
  hideThreshold: 100,
  scrollUpThreshold: 10,
  animatedSelector: '[data-animate-on-scroll]',
  animationClass: 'is-animated',
  rootMargin: '0px 0px -100px 0px',
  animationThreshold: 0.1,
  respectsReducedMotion: true,
});

