/* main.js — vanilla JS only, no jQuery, loaded deferred */
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
          el.textContent = current + suffix;
          if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
      });
    }, { threshold: 0.3 });
    counters.forEach(function (el) { countObserver.observe(el); });
  }

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
