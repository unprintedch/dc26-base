/**
 * dc26/nav — sous-menus au clic ou au survol selon data-trigger.
 */
(function () {
    function closeAllSubmenus(nav) {
        nav.querySelectorAll('.dc26-nav__item--has-children.is-open').forEach(function (item) {
            item.classList.remove('is-open');
            const toggle = item.querySelector('.dc26-nav__submenu-toggle');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
            const submenu = item.querySelector('.dc26-nav__submenu');
            if (submenu) submenu.hidden = true;
        });
    }

    function toggleSubmenu(item) {
        const isOpen   = item.classList.contains('is-open');
        const nav      = item.closest('.dc26-nav');
        const trigger  = nav ? nav.dataset.trigger : 'click';

        // Sur clic : fermer les autres au même niveau
        if (trigger === 'click') {
            const siblings = item.parentElement.querySelectorAll(':scope > .dc26-nav__item--has-children');
            siblings.forEach(function (sib) {
                if (sib !== item) {
                    sib.classList.remove('is-open');
                    const t = sib.querySelector('.dc26-nav__submenu-toggle');
                    if (t) t.setAttribute('aria-expanded', 'false');
                    const s = sib.querySelector('.dc26-nav__submenu');
                    if (s) s.hidden = true;
                }
            });
        }

        const toggle  = item.querySelector('.dc26-nav__submenu-toggle');
        const submenu = item.querySelector('.dc26-nav__submenu');

        if (isOpen) {
            item.classList.remove('is-open');
            if (toggle)  toggle.setAttribute('aria-expanded', 'false');
            if (submenu) submenu.hidden = true;
        } else {
            item.classList.add('is-open');
            if (toggle)  toggle.setAttribute('aria-expanded', 'true');
            if (submenu) submenu.hidden = false;
        }
    }

    function initNav(nav) {
        const trigger = nav.dataset.trigger || 'click';

        nav.querySelectorAll('.dc26-nav__item--has-children').forEach(function (item) {
            const submenu = item.querySelector('.dc26-nav__submenu');
            if (submenu) submenu.hidden = true;

            if (trigger === 'hover') {
                item.addEventListener('mouseenter', function () {
                    item.classList.add('is-open');
                    const t = item.querySelector('.dc26-nav__submenu-toggle');
                    if (t) t.setAttribute('aria-expanded', 'true');
                    if (submenu) submenu.hidden = false;
                });
                item.addEventListener('mouseleave', function () {
                    item.classList.remove('is-open');
                    const t = item.querySelector('.dc26-nav__submenu-toggle');
                    if (t) t.setAttribute('aria-expanded', 'false');
                    if (submenu) submenu.hidden = true;
                });
                // Accessibilité clavier
                const toggleBtn = item.querySelector('.dc26-nav__submenu-toggle');
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', function () {
                        toggleSubmenu(item);
                    });
                }
            } else {
                const toggleBtn = item.querySelector('.dc26-nav__submenu-toggle');
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', function () {
                        toggleSubmenu(item);
                    });
                }
            }
        });

        // Fermer au clic en dehors
        document.addEventListener('click', function (e) {
            if (!nav.contains(e.target)) {
                closeAllSubmenus(nav);
            }
        });
    }

    function init() {
        document.querySelectorAll('.dc26-nav').forEach(initNav);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
