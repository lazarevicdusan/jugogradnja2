/**
 * Jugogradnja — main.js
 * Vanilla JS only. No jQuery. Loaded deferred.
 *
 * Sections (stubbed; filled out in Phase 1):
 *   1. Mobile nav drawer open/close + focus trap
 *   2. Sticky header shadow on scroll
 *   3. Nav link underline animation
 *   4. Cyrillic / Latin script toggle
 *   5. Smooth scroll for anchor links
 *   6. Stat counter count-up (optional, on scroll)
 *   7. Accordion open/close (Phase 2)
 */

(function () {
  'use strict';

  // ── 4. Script toggle ──────────────────────────────────────
  const toggleBtns = document.querySelectorAll('[data-script-toggle]');
  toggleBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const target = btn.dataset.scriptToggle; // 'latin' | 'cyrillic'
      fetch('/wp-json/jugogradnja/v1/set-script', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-WP-Nonce': window.jgData?.nonce || '' },
        body: JSON.stringify({ script: target }),
      }).then(function () {
        window.location.reload();
      });
    });
  });

  // ── 5. Smooth scroll ──────────────────────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

})();
