(function () {
    'use strict';

    var nav = document.getElementById('site-navigation');
    if (!nav) return;
    var toggle = nav.querySelector('.menu-toggle');
    var menu = nav.querySelector('#primary-menu');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', function () {
        var isOpen = nav.classList.toggle('toggled');
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Submenu keyboard accessibility
    var parents = nav.querySelectorAll('.menu-item-has-children > a');
    parents.forEach(function (a) {
        a.addEventListener('focus', function () {
            a.parentNode.classList.add('focus');
        });
        a.addEventListener('blur', function () {
            a.parentNode.classList.remove('focus');
        });
    });
})();
