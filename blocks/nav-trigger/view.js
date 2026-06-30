/**
 * dc26/nav-trigger — dispatche dc26:nav:toggle au clic.
 */
(function () {
    function initTrigger(button) {
        button.addEventListener('click', function () {
            document.dispatchEvent(new CustomEvent('dc26:nav:toggle'));
        });

        // Sync état si le drawer s'ouvre/ferme depuis ailleurs
        document.addEventListener('dc26:nav:opened', function () {
            button.setAttribute('aria-expanded', 'true');
        });

        document.addEventListener('dc26:nav:closed', function () {
            button.setAttribute('aria-expanded', 'false');
        });
    }

    function init() {
        document.querySelectorAll('.dc26-nav-trigger__button').forEach(initTrigger);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
