/* main.js - vanilla JS only, no jQuery, loaded deferred */
(function () {
  'use strict';

  /* ── Sticky header shadow ─────────────────────────────────── */
  var header = document.getElementById('site-header');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 4);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Mobile drawer ────────────────────────────────────────── */
  var toggle   = document.getElementById('nav-toggle');
  var drawer   = document.getElementById('mobile-drawer');
  var overlay  = document.getElementById('mobile-drawer-overlay');
  var closeBtn = drawer && drawer.querySelector('.mobile-drawer__close');

  var focusableSelectors = [
    'a[href]', 'button:not([disabled])', 'input', 'select', 'textarea',
    '[tabindex]:not([tabindex="-1"])'
  ].join(',');

  function openDrawer() {
    if (!drawer) return;
    drawer.classList.add('is-open');
    overlay && overlay.classList.add('is-open');
    document.body.classList.add('drawer-open');
    toggle && toggle.setAttribute('aria-expanded', 'true');
    drawer.setAttribute('aria-hidden', 'false');
    drawer.querySelectorAll('[tabindex="-1"]').forEach(function (el) {
      el.removeAttribute('tabindex');
    });
    var first = drawer.querySelector(focusableSelectors);
    if (first) first.focus();
  }

  function closeDrawer() {
    if (!drawer) return;
    drawer.classList.remove('is-open');
    overlay && overlay.classList.remove('is-open');
    document.body.classList.remove('drawer-open');
    toggle && toggle.setAttribute('aria-expanded', 'false');
    drawer.setAttribute('aria-hidden', 'true');
    drawer.querySelectorAll('a, button').forEach(function (el) {
      if (!el.classList.contains('mobile-drawer__close')) {
        el.setAttribute('tabindex', '-1');
      }
    });
    toggle && toggle.focus();
  }

  if (toggle)   toggle.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (overlay)  overlay.addEventListener('click', closeDrawer);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && drawer && drawer.classList.contains('is-open')) {
      closeDrawer();
    }
  });

  if (drawer) {
    drawer.addEventListener('keydown', function (e) {
      if (e.key !== 'Tab' || !drawer.classList.contains('is-open')) return;
      var focusable = Array.from(drawer.querySelectorAll(focusableSelectors));
      if (!focusable.length) return;
      var first = focusable[0];
      var last  = focusable[focusable.length - 1];
      if (e.shiftKey) {
        if (document.activeElement === first) { e.preventDefault(); last.focus(); }
      } else {
        if (document.activeElement === last)  { e.preventDefault(); first.focus(); }
      }
    });
  }

  /* ── Mobile accordion sub-menus ──────────────────────────── */
  document.querySelectorAll('.mobile-drawer__chevron').forEach(function (btn) {
    var sub = btn.closest('.mobile-drawer__item--has-sub').querySelector('.mobile-drawer__sub');
    if (!sub) return;
    btn.addEventListener('click', function () {
      var isOpen = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!isOpen));
      if (isOpen) {
        sub.setAttribute('hidden', '');
      } else {
        sub.removeAttribute('hidden');
      }
    });
  });

  /* ── Desktop dropdown keyboard nav ───────────────────────── */
  document.querySelectorAll('.has-dropdown').forEach(function (item) {
    var btn   = item.querySelector('.dropdown-toggle');
    var panel = item.querySelector('.site-nav__dropdown');
    if (!btn || !panel) return;

    btn.addEventListener('click', function () {
      var isOpen = btn.getAttribute('aria-expanded') === 'true';
      document.querySelectorAll('.dropdown-toggle[aria-expanded="true"]').forEach(function (b) {
        if (b !== btn) {
          b.setAttribute('aria-expanded', 'false');
          b.closest('.has-dropdown').querySelector('.site-nav__dropdown').classList.remove('is-open');
        }
      });
      btn.setAttribute('aria-expanded', String(!isOpen));
      panel.classList.toggle('is-open', !isOpen);
    });
  });

  document.addEventListener('click', function (e) {
    if (!e.target.closest('.has-dropdown')) {
      document.querySelectorAll('.dropdown-toggle[aria-expanded="true"]').forEach(function (btn) {
        btn.setAttribute('aria-expanded', 'false');
        btn.closest('.has-dropdown').querySelector('.site-nav__dropdown').classList.remove('is-open');
      });
    }
  });

  /* ── Script / language toggle ─────────────────────────────── */
  document.querySelectorAll('[data-script-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var target = btn.getAttribute('data-script-toggle');
      fetch('/wp-json/jugogradnja/v1/set-script', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': (window.jgData && window.jgData.nonce) || ''
        },
        body: JSON.stringify({ script: target })
      }).then(function () {
        window.location.reload();
      });
    });
  });

  /* Timeline scroll animation lives in assets/js/timeline.js - do not
     duplicate it here. Two independent IntersectionObservers writing to
     the same .jg-timeline__line element raced each other and caused the
     line to visibly overshoot then snap back to its correct height. */

  /* ── Stat counter count-up ───────────────────────────────── */
  var counters = document.querySelectorAll('.jg-stat__number[data-count]');
  if (counters.length && 'IntersectionObserver' in window) {
    var counted = new Set();
    var countObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting || counted.has(entry.target)) return;
        counted.add(entry.target);
        var el     = entry.target;
        var target = parseInt(el.getAttribute('data-count'), 10);
        var suffix = el.getAttribute('data-suffix') || '';
        var start  = 0;
        var duration = 1400;
        var startTime = null;
        function step(ts) {
          if (!startTime) startTime = ts;
          var progress = Math.min((ts - startTime) / duration, 1);
          var ease = 1 - Math.pow(1 - progress, 3); // ease-out-cubic
          var current = Math.round(ease * target);
          var formatted = current >= 1000 ? current.toLocaleString('sr-RS') : String(current);
          el.textContent = formatted + suffix;
          if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
      });
    }, { threshold: 0.3 });
    counters.forEach(function (el) { countObserver.observe(el); });
  }

  /* ── Internship testimonial slider ──────────────────────── */
  var slider = document.getElementById('jg-internship-slider');
  if (slider) {
    var iSlides  = Array.from(slider.querySelectorAll('.jg-internship-testimonial__slide'));
    var iDots    = Array.from(slider.querySelectorAll('.jg-dot'));
    var iCurrent = 0;

    function iGoTo(n) {
      iSlides[iCurrent].classList.remove('jg-slide--active');
      iDots[iCurrent].classList.remove('jg-dot--active');
      iCurrent = (n + iSlides.length) % iSlides.length;
      iSlides[iCurrent].classList.add('jg-slide--active');
      iDots[iCurrent].classList.add('jg-dot--active');
    }

    var iTimer = setInterval(function () { iGoTo(iCurrent + 1); }, 7000);

    iDots.forEach(function (dot, i) {
      dot.addEventListener('click', function () {
        clearInterval(iTimer);
        iGoTo(i);
        iTimer = setInterval(function () { iGoTo(iCurrent + 1); }, 7000);
      });
    });
  }

  /* ── CV upload: show selected filenames, allow removing one,
     cap at 3 files. Picking again ADDS to the current selection
     (native file inputs otherwise replace it wholesale), so a
     wrong file can be removed and a replacement added without
     losing the others. ──────────────────────────────────────── */
  var MAX_CV_FILES = 3;
  document.querySelectorAll( '.jg-apply-form__file' ).forEach( function ( input ) {
    var list = input.closest( '.jg-apply-form__field' ).querySelector( '.jg-apply-form__file-list' );
    if ( ! list ) return;

    var selected = []; // Array<File>, persisted across change events.

    function syncInput() {
      var dt = new DataTransfer();
      selected.forEach( function ( file ) { dt.items.add( file ); } );
      input.files = dt.files;
    }

    function render() {
      list.innerHTML = '';
      selected.forEach( function ( file, i ) {
        var item = document.createElement( 'li' );
        item.className = 'jg-apply-form__file-item';

        var name = document.createElement( 'span' );
        name.className = 'jg-apply-form__file-name';
        name.textContent = file.name;
        item.appendChild( name );

        var remove = document.createElement( 'button' );
        remove.type = 'button';
        remove.className = 'jg-apply-form__file-remove';
        remove.setAttribute( 'aria-label', 'Уклони ' + file.name );
        remove.textContent = '×';
        remove.addEventListener( 'click', function () {
          selected.splice( i, 1 );
          syncInput();
          render();
        } );
        item.appendChild( remove );

        list.appendChild( item );
      } );
    }

    function showError( message ) {
      list.innerHTML = '';
      var warn = document.createElement( 'li' );
      warn.className = 'jg-apply-form__file-item jg-apply-form__file-item--error';
      warn.textContent = message;
      list.appendChild( warn );
    }

    input.addEventListener( 'change', function () {
      var incoming = Array.from( input.files || [] );
      if ( ! incoming.length ) return; // User cancelled the picker.

      var merged = selected.concat( incoming );
      if ( merged.length > MAX_CV_FILES ) {
        syncInput(); // Restore input.files to the pre-pick selection.
        showError( 'Можете отпремити највише ' + MAX_CV_FILES + ' документа. Уклоните један да бисте додали други.' );
        setTimeout( render, 2000 );
        return;
      }

      selected = merged;
      syncInput();
      render();
    } );
  } );

  /* ── Smooth scroll for anchor links ──────────────────────── */
  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href^="#"]');
    if (!link) return;
    var id = link.getAttribute('href').slice(1);
    if (!id) return;
    var el = document.getElementById(id);
    if (!el) return;
    e.preventDefault();
    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    history.pushState(null, '', '#' + id);
  });

})();
