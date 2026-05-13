(function ($) {
    'use strict';

    function ready(fn) {
        if (document.readyState !== 'loading') { fn(); }
        else { document.addEventListener('DOMContentLoaded', fn); }
    }

    ready(function () {
        // Header search toggle
        var searchToggle = document.querySelector('.header-search-toggle');
        var searchPanel = document.getElementById('header-search');
        if (searchToggle && searchPanel) {
            searchToggle.addEventListener('click', function () {
                var isHidden = searchPanel.hasAttribute('hidden');
                if (isHidden) {
                    searchPanel.removeAttribute('hidden');
                    searchToggle.setAttribute('aria-expanded', 'true');
                    var input = searchPanel.querySelector('input[type="search"]');
                    if (input) input.focus();
                } else {
                    searchPanel.setAttribute('hidden', '');
                    searchToggle.setAttribute('aria-expanded', 'false');
                }
            });
            document.addEventListener('click', function (e) {
                if (!searchPanel.contains(e.target) && e.target !== searchToggle && !searchToggle.contains(e.target)) {
                    if (!searchPanel.hasAttribute('hidden')) {
                        searchPanel.setAttribute('hidden', '');
                        searchToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });
        }

        // Testimonials slider
        document.querySelectorAll('[data-testimonials-slider]').forEach(function (slider) {
            var track = slider.querySelector('.testimonials-track');
            var prev = slider.querySelector('.testi-prev');
            var next = slider.querySelector('.testi-next');
            if (!track) return;
            var cards = track.children;
            if (cards.length < 2) return;
            var index = 0;

            function visibleCount() {
                if (window.innerWidth < 600) return 1;
                if (window.innerWidth < 900) return 2;
                return Math.min(3, cards.length);
            }
            function update() {
                var n = visibleCount();
                var maxIndex = Math.max(0, cards.length - n);
                if (index > maxIndex) index = maxIndex;
                if (index < 0) index = 0;
                var cardWidth = cards[0].getBoundingClientRect().width + 24; // gap
                track.style.transform = 'translateX(' + (-index * cardWidth) + 'px)';
            }
            if (prev) prev.addEventListener('click', function () { index--; update(); });
            if (next) next.addEventListener('click', function () { index++; update(); });
            window.addEventListener('resize', update);
            update();

            // Auto-rotate
            var auto = setInterval(function () {
                var n = visibleCount();
                if (index >= cards.length - n) { index = 0; } else { index++; }
                update();
            }, 6500);
            slider.addEventListener('mouseenter', function () { clearInterval(auto); });
        });

        // Back to top
        var btt = document.querySelector('.back-to-top');
        if (btt) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 400) { btt.classList.add('is-visible'); }
                else { btt.classList.remove('is-visible'); }
            }, { passive: true });
            btt.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Gallery lightbox (simple)
        var lightbox = null;
        document.querySelectorAll('.gallery-item[data-lightbox]').forEach(function (item) {
            item.addEventListener('click', function (e) {
                var href = item.getAttribute('href');
                if (!href || !/\.(jpe?g|png|gif|webp|avif)$/i.test(href)) return;
                e.preventDefault();
                if (!lightbox) {
                    lightbox = document.createElement('div');
                    lightbox.className = 'st-lightbox';
                    lightbox.style.cssText = 'position:fixed;inset:0;background:rgba(10,15,30,.92);display:flex;align-items:center;justify-content:center;z-index:1000;cursor:zoom-out;padding:2rem;';
                    lightbox.addEventListener('click', function () { lightbox.remove(); lightbox = null; });
                    document.body.appendChild(lightbox);
                }
                lightbox.innerHTML = '<img src="' + href + '" alt="" style="max-width:95%;max-height:95%;border-radius:8px;box-shadow:0 20px 60px rgba(0,0,0,.6);">';
            });
        });
    });
})(window.jQuery);
