/**
 * dc26/nav-drawer — gestion de l'état open/close.
 *
 * Écoute les événements 'dc26:nav:open', 'dc26:nav:close', 'dc26:nav:toggle'.
 * Dispatché par dc26/nav-trigger (et tout autre déclencheur custom).
 */
(function () {
    const DRAWER_SELECTOR  = '.dc26-nav-drawer';
    const OVERLAY_SELECTOR = '.dc26-nav-drawer__overlay';
    const TRIGGER_SELECTOR = '.dc26-nav-trigger__button';

    function openDrawer(drawer, overlay) {
        drawer.classList.add('is-open');
        drawer.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        if (overlay) {
            overlay.classList.add('is-visible');
        }

        // Sync trigger aria-expanded
        document.querySelectorAll(TRIGGER_SELECTOR).forEach(function (btn) {
            btn.setAttribute('aria-expanded', 'true');
        });

        // Focus le premier élément focusable dans le drawer
        const focusable = drawer.querySelector('a, button, [tabindex]');
        if (focusable) {
            focusable.focus();
        }
    }

    function closeDrawer(drawer, overlay) {
        drawer.classList.remove('is-open');
        drawer.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';

        if (overlay) {
            overlay.classList.remove('is-visible');
        }

        document.querySelectorAll(TRIGGER_SELECTOR).forEach(function (btn) {
            btn.setAttribute('aria-expanded', 'false');
        });
    }

    function initDrawer(drawer) {
        const overlay   = document.querySelector(OVERLAY_SELECTOR);
        const closeBtn  = drawer.querySelector('.dc26-nav-drawer__close');

        // Bouton close interne
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                closeDrawer(drawer, overlay);
                document.dispatchEvent(new CustomEvent('dc26:nav:closed'));
            });
        }

        // Overlay backdrop
        if (overlay) {
            overlay.addEventListener('click', function () {
                closeDrawer(drawer, overlay);
                document.dispatchEvent(new CustomEvent('dc26:nav:closed'));
            });
        }

        // Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
                closeDrawer(drawer, overlay);
                document.dispatchEvent(new CustomEvent('dc26:nav:closed'));
            }
        });

        // Événements entrants
        document.addEventListener('dc26:nav:open', function () {
            openDrawer(drawer, overlay);
        });

        document.addEventListener('dc26:nav:close', function () {
            closeDrawer(drawer, overlay);
        });

        document.addEventListener('dc26:nav:toggle', function () {
            if (drawer.classList.contains('is-open')) {
                closeDrawer(drawer, overlay);
                document.dispatchEvent(new CustomEvent('dc26:nav:closed'));
            } else {
                openDrawer(drawer, overlay);
                document.dispatchEvent(new CustomEvent('dc26:nav:opened'));
            }
        });
    }

    function init() {
        document.querySelectorAll(DRAWER_SELECTOR).forEach(initDrawer);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
