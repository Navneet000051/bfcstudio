/* =========================================================================
   BFC Studio — front-end interactions
   All features are guarded so each page only runs what it has.
   ========================================================================= */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initHeroSlider();
        initStudioVibesCarousel();
        initPricingTabs();
        initBookingPage();
        initScrollReveal();
        initStatsCountUp();
        initSmoothAnchors();
        initGuestTestimonials();
    });

    /* ---- Hero banner slider ----------------------------------------- */
    function initHeroSlider() {
        var slider = document.querySelector('[data-hero-slider]');
        if (!slider) return;
        var slides = Array.prototype.slice.call(slider.querySelectorAll('[data-hero-slide]'));
        var dots = Array.prototype.slice.call(slider.querySelectorAll('[data-hero-dot]'));
        if (slides.length < 2) return;

        var current = 0, timer = null, interval = 4500;
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function go(n) {
            n = (n + slides.length) % slides.length;
            if (n === current) return;
            slides[current].classList.remove('is-active');
            slides[current].setAttribute('aria-hidden', 'true');
            if (dots[current]) {
                dots[current].classList.remove('is-active');
                dots[current].setAttribute('aria-selected', 'false');
            }
            current = n;
            slides[current].classList.add('is-active');
            slides[current].removeAttribute('aria-hidden');
            if (dots[current]) {
                dots[current].classList.add('is-active');
                dots[current].setAttribute('aria-selected', 'true');
            }
        }
        function next() { go(current + 1); }
        function prev() { go(current - 1); }
        function start() { if (reduce) return; stop(); timer = setInterval(next, interval); }
        function stop() { if (timer) { clearInterval(timer); timer = null; } }

        var nextBtn = slider.querySelector('[data-hero-next]');
        var prevBtn = slider.querySelector('[data-hero-prev]');
        if (nextBtn) nextBtn.addEventListener('click', function () { next(); start(); });
        if (prevBtn) prevBtn.addEventListener('click', function () { prev(); start(); });
        dots.forEach(function (dot, i) {
            dot.addEventListener('click', function () { go(i); start(); });
        });

        slider.addEventListener('mouseenter', stop);
        slider.addEventListener('mouseleave', start);
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) stop(); else start();
        });

        // basic touch swipe
        var startX = null;
        slider.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; stop(); }, { passive: true });
        slider.addEventListener('touchend', function (e) {
            if (startX === null) return;
            var dx = e.changedTouches[0].clientX - startX;
            if (Math.abs(dx) > 40) { dx < 0 ? next() : prev(); }
            startX = null;
            start();
        });

        start();
    }

    /* ---- Studio sets carousel --------------------------------------- */
    function initStudioVibesCarousel() {
        var $ = window.jQuery;
        var $carousel = $ && $('[data-vibes-carousel]');
        if (!$carousel || !$carousel.length || !$.fn.owlCarousel) return;

        var $dots = $('[data-vibes-dot]');
        function setActiveDot(index) {
            $dots.each(function (i) {
                var active = i === index;
                $(this).toggleClass('is-active', active).attr('aria-pressed', active ? 'true' : 'false');
            });
        }
        function updateActiveDot(event) {
            var carousel = event.relatedTarget;
            if (!carousel) return;
            var maxIndex = Math.max(0, carousel.items().length - carousel.settings.items);
            var current = carousel.relative(carousel.current());
            var page = maxIndex ? Math.round(current / maxIndex * ($dots.length - 1)) : 0;
            setActiveDot(page);
        }

        $carousel.on('translated.owl.carousel', updateActiveDot).owlCarousel({
            items: 3,
            margin: 18,
            loop: false,
            autoplay: true,
            rewind: true,
            nav: false,
            dots: false,
            smartSpeed: 350,
            responsive: {
                0: { items: 1, margin: 14 },
                576: { items: 2, margin: 16 },
                992: { items: 3, margin: 18 }
            }
        });

        $('[data-vibes-prev]').on('click', function () { $carousel.trigger('prev.owl.carousel'); });
        $('[data-vibes-next]').on('click', function () { $carousel.trigger('next.owl.carousel'); });
        $dots.on('click', function () {
            var carousel = $carousel.data('owl.carousel');
            if (!carousel) return;
            var maxIndex = Math.max(0, carousel.items().length - carousel.settings.items);
            var dotIndex = Number(this.getAttribute('data-vibes-dot'));
            setActiveDot(dotIndex);
            $carousel.trigger('to.owl.carousel', [Math.round(maxIndex * dotIndex / ($dots.length - 1)), 350]);
        });
    }

    /* ---- Pricing tabs ------------------------------------------------ */
    function initPricingTabs() {
        var tabs = document.querySelectorAll('[data-pricing-tab]');
        if (!tabs.length) return;

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var target = tab.getAttribute('data-pricing-tab');
                tabs.forEach(function (t) { t.classList.toggle('active', t === tab); });
                document.querySelectorAll('[data-pricing-panel]').forEach(function (panel) {
                    var show = panel.getAttribute('data-pricing-panel') === target;
                    panel.classList.toggle('d-none', !show);
                    if (show) {
                        panel.classList.remove('bfc-anim-in');
                        void panel.offsetWidth; // restart animation
                        panel.classList.add('bfc-anim-in');
                    }
                });
                var caption = document.querySelector('[data-pricing-caption]');
                if (caption) {
                    caption.textContent = target === 'editing'
                        ? 'Editing packages cover colour, audio and final cuts to make your content ready to publish.'
                        : 'All packages include location rental, lights, and camera/mic setup for your podcast recording.';
                }
            });
        });
    }

    /* ---- Booking page ------------------------------------------------ */
    function initBookingPage() {
        var form = document.querySelector('.bfc-booking-form');
        if (!form) return;

        var state = {
            mode: 'single',          // 'single' | 'multiple'
            start: null,             // Date
            end: null,               // Date
            from: null,              // string time
            to: null,                // string time
            rate: 4000,              // ₹ per hour
            viewYear: null,
            viewMonth: null,
        };

        initModeToggle(state);
        initCalendar(state);
        initSlots(state);
        initSetPicker();
        initSubmit(form);
    }

    function initModeToggle(state) {
        var btns = document.querySelectorAll('[data-book-mode]');
        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                state.mode = btn.getAttribute('data-book-mode');
                btns.forEach(function (b) { b.classList.toggle('active', b === btn); });
                // reset selection when switching modes
                state.start = null;
                state.end = null;
                var hint = document.querySelector('[data-book-multiple-only]');
                if (hint) hint.classList.toggle('d-none', state.mode !== 'multiple');
                renderCalendar(state);
                updateSummary(state);
            });
        });
    }

    /* ---- Calendar ---------------------------------------------------- */
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'];
    var DOW = ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'];

    function initCalendar(state) {
        var cal = document.querySelector('[data-calendar]');
        if (!cal) return;
        var now = new Date();
        state.viewYear = now.getFullYear();
        state.viewMonth = now.getMonth();

        cal.querySelector('[data-cal-prev]').addEventListener('click', function () {
            state.viewMonth--;
            if (state.viewMonth < 0) { state.viewMonth = 11; state.viewYear--; }
            renderCalendar(state);
        });
        cal.querySelector('[data-cal-next]').addEventListener('click', function () {
            state.viewMonth++;
            if (state.viewMonth > 11) { state.viewMonth = 0; state.viewYear++; }
            renderCalendar(state);
        });
        renderCalendar(state);
    }

    function renderCalendar(state) {
        var grid = document.querySelector('[data-cal-grid]');
        var title = document.querySelector('[data-cal-title]');
        if (!grid || !title) return;

        title.textContent = MONTHS[state.viewMonth] + ' ' + state.viewYear;
        grid.innerHTML = '';

        DOW.forEach(function (d) {
            var el = document.createElement('div');
            el.className = 'bfc-cal-dow';
            el.textContent = d;
            grid.appendChild(el);
        });

        var first = new Date(state.viewYear, state.viewMonth, 1);
        var startOffset = (first.getDay() + 6) % 7; // Monday-first
        var daysInMonth = new Date(state.viewYear, state.viewMonth + 1, 0).getDate();
        var today = new Date(); today.setHours(0, 0, 0, 0);

        for (var i = 0; i < startOffset; i++) {
            grid.appendChild(document.createElement('div'));
        }

        for (var day = 1; day <= daysInMonth; day++) {
            (function (day) {
                var date = new Date(state.viewYear, state.viewMonth, day);
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'bfc-cal-day';
                btn.textContent = day;

                if (date < today) btn.classList.add('muted');
                if (sameDay(date, state.start) || sameDay(date, state.end)) btn.classList.add('selected');
                if (state.mode === 'multiple' && inRange(date, state.start, state.end)) btn.classList.add('in-range');

                btn.addEventListener('click', function () {
                    pickDate(state, date);
                });
                grid.appendChild(btn);
            })(day);
        }
    }

    function pickDate(state, date) {
        if (state.mode === 'single') {
            state.start = date;
            state.end = null;
        } else {
            if (!state.start || (state.start && state.end)) {
                state.start = date;
                state.end = null;
            } else if (date < state.start) {
                state.start = date;
            } else {
                state.end = date;
            }
        }
        renderCalendar(state);
        updateSummary(state);
    }

    function sameDay(a, b) {
        return a && b && a.getFullYear() === b.getFullYear() &&
            a.getMonth() === b.getMonth() && a.getDate() === b.getDate();
    }
    function inRange(d, s, e) {
        return s && e && d > s && d < e;
    }

    /* ---- Time slots -------------------------------------------------- */
    function buildTimes() {
        // 9:30 AM -> 6:30 PM in 30-min steps
        var times = [];
        for (var m = 9 * 60 + 30; m <= 18 * 60 + 30; m += 30) {
            var h = Math.floor(m / 60), min = m % 60;
            var ampm = h >= 12 ? 'PM' : 'AM';
            var hh = h % 12; if (hh === 0) hh = 12;
            times.push(hh + ':' + (min === 0 ? '00' : min) + ' ' + ampm);
        }
        return times;
    }

    function initSlots(state) {
        var fromList = document.querySelector('[data-slot-list="from"]');
        var toList = document.querySelector('[data-slot-list="to"]');
        if (!fromList || !toList) return;

        var times = buildTimes();
        fillSlots(fromList, times, function (t) {
            state.from = t;
            // keep "to" after "from"
            if (state.to && times.indexOf(state.to) <= times.indexOf(t)) state.to = null;
            markSelected(fromList, t);
            refreshToList(toList, times, state);
            updateSummary(state);
        });
        refreshToList(toList, times, state);
    }

    function refreshToList(toList, times, state) {
        toList.innerHTML = '';
        var startIdx = state.from ? times.indexOf(state.from) + 1 : 1;
        for (var i = startIdx; i < times.length; i++) {
            (function (t) {
                var btn = slotButton(t, function () {
                    state.to = t;
                    markSelected(toList, t);
                    updateSummary(state);
                });
                if (t === state.to) btn.classList.add('selected');
                toList.appendChild(btn);
            })(times[i]);
        }
    }

    function fillSlots(list, times, onPick) {
        list.innerHTML = '';
        times.slice(0, times.length - 1).forEach(function (t) {
            list.appendChild(slotButton(t, function () { onPick(t); }));
        });
    }

    function slotButton(label, onClick) {
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'bfc-slot';
        btn.textContent = label;
        btn.addEventListener('click', onClick);
        return btn;
    }

    function markSelected(list, value) {
        list.querySelectorAll('.bfc-slot').forEach(function (b) {
            b.classList.toggle('selected', b.textContent === value);
        });
    }

    /* ---- Booking summary -------------------------------------------- */
    function updateSummary(state) {
        var totalEl = document.querySelector('[data-summary-total]');
        if (!totalEl) return;

        var hours = hoursBetween(state.from, state.to) || 1;
        var days = 1;
        if (state.mode === 'multiple' && state.start && state.end) {
            days = Math.round((state.end - state.start) / 86400000) + 1;
        }
        var total = state.rate * hours * days;
        var advance = total / 2;

        document.querySelector('[data-summary-advance]').textContent = money(advance);
        document.querySelector('[data-summary-remaining]').textContent = money(total - advance);
        totalEl.textContent = money(total) + '/-';
    }

    function hoursBetween(from, to) {
        if (!from || !to) return 0;
        var times = buildTimes();
        var a = times.indexOf(from), b = times.indexOf(to);
        if (a < 0 || b < 0 || b <= a) return 0;
        return (b - a) * 0.5;
    }

    function money(n) {
        return '₹' + n.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    /* ---- Studio set picker ------------------------------------------ */
    function initSetPicker() {
        var chips = document.querySelectorAll('[data-set-chip]');
        var preview = document.querySelector('[data-set-preview]');
        if (!chips.length || !preview) return;

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                if (chip.classList.contains('active')) return;
                chips.forEach(function (c) { c.classList.toggle('active', c === chip); });
                var src = chip.getAttribute('data-set-image');
                var name = chip.getAttribute('data-set-name');
                // fade out, swap, fade in
                preview.classList.add('bfc-swapping');
                var swap = function () {
                    preview.src = src;
                    preview.alt = name;
                    requestAnimationFrame(function () { preview.classList.remove('bfc-swapping'); });
                    preview.removeEventListener('transitionend', swap);
                };
                preview.addEventListener('transitionend', swap);
                // fallback if transitionend doesn't fire
                setTimeout(swap, 260);
            });
        });
    }

    /* ---- Scroll reveal ---------------------------------------------- */
    function initScrollReveal() {
        var selectors = [
            '.bfc-heading', '.bfc-subheading', '.bfc-lead',
            '.bfc-facility',
            '.bfc-price-card', '.bfc-stats-card',
            '.bfc-accordion .accordion-item',
            '.bfc-card', '.bfc-summary', '.bfc-cal', '.bfc-slots',
            '.bfc-footer-card', '.bfc-hero-title',
            '.bfc-hero-text', '.bfc-hero .btn',
            '.bfc-terms', '.bfc-check'
        ];
        var nodes = [];
        selectors.forEach(function (sel) {
            document.querySelectorAll(sel).forEach(function (el) {
                if (!el.classList.contains('bfc-reveal')) nodes.push(el);
            });
        });
        if (!nodes.length) return;

        var reveal = function (el) {
            if (el.classList.contains('is-visible')) return;
            var sibs = Array.prototype.slice.call(el.parentNode.children)
                .filter(function (c) { return c.classList.contains('bfc-reveal'); });
            var idx = sibs.indexOf(el);
            el.style.setProperty('--reveal-delay', Math.min(idx, 6) * 0.08 + 's');
            el.classList.add('is-visible');
        };

        nodes.forEach(function (el) { el.classList.add('bfc-reveal'); });

        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce) {
            nodes.forEach(reveal);
            return;
        }

        // Reveal-on-scroll via a throttled, vertical-only position check. This is
        // robust where IntersectionObserver can misbehave, and because it gates
        // only on vertical position it also reveals carousel cards that start
        // off-screen horizontally once their row scrolls into view.
        var pending = nodes.slice();
        var last = 0, trailing = null;

        function check() {
            last = Date.now();
            var vh = window.innerHeight || document.documentElement.clientHeight || 0;
            if (!vh) { pending.forEach(reveal); pending = []; }
            pending = pending.filter(function (el) {
                if (el.getBoundingClientRect().top < vh * 0.92) { reveal(el); return false; }
                return true;
            });
            if (!pending.length) {
                window.removeEventListener('scroll', onScroll);
                window.removeEventListener('resize', onScroll);
            }
        }
        // Timestamp throttle (no requestAnimationFrame, which can be throttled
        // when the tab isn't actively painting).
        function onScroll() {
            var now = Date.now();
            if (now - last >= 90) { check(); }
            else { clearTimeout(trailing); trailing = setTimeout(check, 100); }
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        window.addEventListener('load', onScroll);
        check(); // reveal whatever is already in view

        // Re-check after late layout shifts (web fonts / images loading) so the
        // initial in-view batch is always revealed, without forcing below-fold
        // content to appear early.
        setTimeout(onScroll, 300);
        setTimeout(onScroll, 1200);
    }

    /* ---- Stats count-up --------------------------------------------- */
    function initGuestTestimonials() {
        var carousel = document.querySelector('[data-testimonial-carousel]');
        if (!carousel) return;

        var track = carousel.querySelector('[data-testimonial-track]');
        var viewport = carousel.querySelector('[data-testimonial-viewport]');
        var originals = Array.prototype.slice.call(track.children);
        var dotsHost = document.querySelector('[data-testimonial-dots]');
        if (originals.length < 2) return;

        originals.slice(0, 3).forEach(function (card) {
            var clone = card.cloneNode(true);
            clone.setAttribute('aria-hidden', 'true');
            track.appendChild(clone);
        });

        var index = 0;
        var autoplayTimer = null;
        var autoplayDelay = 3000;
        var dots = [];
        for (var i = 0; i < 3; i++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'bfc-testimonial-dot';
            dot.setAttribute('aria-label', 'Show testimonial slide ' + (i + 1));
            dot.addEventListener('click', function (event) {
                goTo(dots.indexOf(event.currentTarget));
            });
            dotsHost.appendChild(dot);
            dots.push(dot);
        }

        function update() {
            var card = originals[0];
            var gap = parseFloat(window.getComputedStyle(track).gap) || 0;
            var step = card.getBoundingClientRect().width + gap;
            track.style.transform = 'translateX(' + (-index * step) + 'px)';
            originals.forEach(function (item) { item.classList.remove('is-active'); });
            originals[Math.min(index + 1, originals.length - 1)].classList.add('is-active');
            dots.forEach(function (item, dotIndex) {
                var active = dotIndex === index;
                item.classList.toggle('is-active', active);
                item.setAttribute('aria-current', active ? 'true' : 'false');
            });
        }
        function goTo(nextIndex) {
            index = (nextIndex + dots.length) % dots.length;
            update();
        }

        function stopAutoplay() {
            if (autoplayTimer) {
                window.clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        }
        function startAutoplay() {
            stopAutoplay();
            if (document.hidden || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            autoplayTimer = window.setInterval(function () { goTo(index + 1); }, autoplayDelay);
        }

        carousel.querySelector('[data-testimonial-prev]').addEventListener('click', function () { goTo(index - 1); startAutoplay(); });
        carousel.querySelector('[data-testimonial-next]').addEventListener('click', function () { goTo(index + 1); startAutoplay(); });
        carousel.addEventListener('mouseenter', stopAutoplay);
        carousel.addEventListener('mouseleave', startAutoplay);
        carousel.addEventListener('focusin', stopAutoplay);
        carousel.addEventListener('focusout', function (event) {
            if (!carousel.contains(event.relatedTarget)) startAutoplay();
        });
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) stopAutoplay(); else startAutoplay();
        });
        window.addEventListener('resize', update);

        var touchStartX = null;
        viewport.addEventListener('touchstart', function (event) {
            touchStartX = event.touches[0].clientX;
        }, { passive: true });
        viewport.addEventListener('touchend', function (event) {
            if (touchStartX === null) return;
            var deltaX = event.changedTouches[0].clientX - touchStartX;
            if (Math.abs(deltaX) > 40) {
                goTo(index + (deltaX < 0 ? 1 : -1));
                startAutoplay();
            }
            touchStartX = null;
        }, { passive: true });

        update();
        startAutoplay();
    }

    function initStatsCountUp() {
        var values = document.querySelectorAll('.bfc-stat-value');
        if (!values.length || !('IntersectionObserver' in window)) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        var io = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                countUp(entry.target);
                obs.unobserve(entry.target);
            });
        }, { threshold: 0.5 });

        values.forEach(function (el) { io.observe(el); });
    }

    function countUp(el) {
        var raw = el.textContent.trim();
        var match = raw.match(/^([^\d]*)([\d.]+)(.*)$/);
        if (!match) return;
        var prefix = match[1], target = parseFloat(match[2]), suffix = match[3];
        var decimals = (match[2].split('.')[1] || '').length;
        var duration = 1300, start = null, done = false;

        var finish = function () {
            if (done) return;
            done = true;
            el.textContent = prefix + target.toFixed(decimals) + suffix;
        };
        function tick(ts) {
            if (done) return;
            if (!start) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = prefix + (target * eased).toFixed(decimals) + suffix;
            if (p < 1) requestAnimationFrame(tick);
            else finish();
        }
        requestAnimationFrame(tick);
        // Guarantee the correct final value even if rAF is throttled/paused.
        setTimeout(finish, duration + 500);
    }

    /* ---- Smooth in-page anchor scrolling ---------------------------- */
    function initSmoothAnchors() {
        document.querySelectorAll('a[href*="#"]').forEach(function (link) {
            var url = link.getAttribute('href');
            var hashIndex = url.indexOf('#');
            if (hashIndex < 0) return;
            var hash = url.slice(hashIndex);
            if (hash.length < 2) return;
            // only handle same-page links
            var base = url.slice(0, hashIndex);
            if (base && base !== location.pathname && base !== location.href.split('#')[0]) return;

            link.addEventListener('click', function (e) {
                var target = document.querySelector(hash);
                if (!target) return;
                e.preventDefault();
                var top = target.getBoundingClientRect().top + window.pageYOffset - 80;
                window.scrollTo({ top: top, behavior: 'smooth' });
                // close mobile nav if open
                var nav = document.querySelector('#bfcNav.show');
                if (nav && window.bootstrap) {
                    var c = window.bootstrap.Collapse.getInstance(nav);
                    if (c) c.hide();
                }
            });
        });
    }

    /* ---- Submit validation ------------------------------------------ */
    function initSubmit(form) {
        var submit = form.querySelector('[data-book-submit]');
        var agree = form.querySelector('[data-agree]');
        if (!submit) return;

        submit.addEventListener('click', function () {
            if (agree && !agree.checked) {
                agree.focus();
                alert('Please accept the Terms and Conditions to continue.');
                return;
            }
            var name = form.querySelector('#fullName');
            if (name && !name.value.trim()) {
                name.focus();
                alert('Please enter your name to complete the booking.');
                return;
            }
            alert('Thank you! Your booking request has been noted. Our team will get in touch with you shortly.');
        });
    }
})();
