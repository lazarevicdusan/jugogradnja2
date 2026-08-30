(function () {
  'use strict';

  var timeline = document.querySelector('.jg-timeline');
  if (!timeline) return;

  var line  = timeline.querySelector('.jg-timeline__line');
  var tail  = timeline.querySelector('.jg-timeline__tail');
  var items = Array.from(timeline.querySelectorAll('.jg-timeline__item'));
  if (!line || !items.length) return;

  /* Respect prefers-reduced-motion - reveal everything immediately */
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    items.forEach(function (item) { item.classList.add('jg-tl--visible'); });
    timeline.classList.add('jg-tl--complete');
    return;
  }

  var visibleCount = 0;

  /*
   * Returns how tall the line needs to be to reach the centre of this
   * item's dot, measured from actual rendered bounding boxes (not chained
   * offsetTop values, which can drift from margin collapsing/rounding and
   * cause the line to overshoot past the dot).
   */
  function lineHeightFor(item) {
    var dot        = item.querySelector('.jg-timeline__dot');
    var dotRect    = dot.getBoundingClientRect();
    /* The line's top edge is fixed by its CSS `top` offset and does not
       move as its height grows, so this stays accurate across calls. */
    var lineTopY   = line.getBoundingClientRect().top;
    var dotCenterY = dotRect.top + dotRect.height / 2;
    return dotCenterY - lineTopY;
  }

  /*
   * Positions the tail dots so they sit just below the last dot's own
   * circle (not past the line's overshoot), using the same bounding-box
   * measurement as lineHeightFor for consistency.
   */
  function positionTail(lastItem) {
    if (!tail) return;
    var dot          = lastItem.querySelector('.jg-timeline__dot');
    var dotRect      = dot.getBoundingClientRect();
    var timelineRect = timeline.getBoundingClientRect();
    var topPx = ( dotRect.bottom - timelineRect.top ) + 12;
    tail.style.top = topPx + 'px';
  }

  var obs = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;

      var item = entry.target;

      /* 1. Grow the line to reach this dot */
      var needed  = lineHeightFor(item);
      var current = parseFloat(line.style.height) || 0;
      if (needed > current) {
        line.style.height = needed + 'px';
      }

      /* 2. After the line has had ~700 ms to draw, pop in dot + text */
      setTimeout(function () {
        item.classList.add('jg-tl--visible');

        visibleCount++;
        if (visibleCount === items.length) {
          /* Position tail just below last dot, then fade it in */
          positionTail(item);
          setTimeout(function () {
            timeline.classList.add('jg-tl--complete');
          }, 780);
        }
      }, 910);

      obs.unobserve(item);
    });
  }, {
    threshold: 0.25,
    rootMargin: '0px 0px -6% 0px'
  });

  items.forEach(function (item) { obs.observe(item); });
}());
