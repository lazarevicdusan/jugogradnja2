( function () {
  'use strict';

  const resultsEl = document.getElementById( 'jg-ref-results' );
  const sidebar   = document.querySelector( '.jg-ref-sidebar' );
  if ( ! resultsEl ) return;

  const COLS = () => window.innerWidth <= 600 ? 1 : 2;

  // Mutable state - reassigned every time results are swapped in via AJAX.
  const state = { grid: null, panel: null, activeCard: null };

  // Slideshow logic - re-runs each time populate() rebuilds the slides
  function initSlideshow( container ) {
    const slides  = Array.from( container.querySelectorAll( '.jg-ref-detail__slide' ) );
    const dots    = Array.from( container.querySelectorAll( '.jg-ref-detail__slide-dot' ) );
    const prevBtn = container.querySelector( '.jg-ref-detail__slide-prev' );
    const nextBtn = container.querySelector( '.jg-ref-detail__slide-next' );
    if ( slides.length < 2 ) {
      if ( prevBtn ) prevBtn.hidden = true;
      if ( nextBtn ) nextBtn.hidden = true;
      return;
    }
    if ( prevBtn ) prevBtn.hidden = false;
    if ( nextBtn ) nextBtn.hidden = false;
    let current = 0;
    function goTo( n ) {
      slides[ current ].classList.remove( 'is-active' );
      dots[ current ]  && dots[ current ].classList.remove( 'is-active' );
      current = ( n + slides.length ) % slides.length;
      slides[ current ].classList.add( 'is-active' );
      dots[ current ]  && dots[ current ].classList.add( 'is-active' );
    }
    // Clone listeners by replacing buttons (avoids stacking listeners across populate calls)
    const newPrev = prevBtn.cloneNode( true );
    const newNext = nextBtn.cloneNode( true );
    prevBtn.parentNode.replaceChild( newPrev, prevBtn );
    nextBtn.parentNode.replaceChild( newNext, nextBtn );
    newPrev.addEventListener( 'click', () => goTo( current - 1 ) );
    newNext.addEventListener( 'click', () => goTo( current + 1 ) );
    dots.forEach( ( dot, i ) => dot.addEventListener( 'click', () => goTo( i ) ) );
  }

  // Populate panel with card's data-* attributes
  function populate( card ) {
    const panel = state.panel;
    const d = card.dataset;
    panel.querySelector( '.jg-ref-detail__cat' ).textContent   = d.cat  || '';
    panel.querySelector( '.jg-ref-detail__title' ).textContent = d.title || '';

    const lokEl  = panel.querySelector( '.jg-ref-detail__meta-lokacija' );
    const lokVal = panel.querySelector( '.jg-val-lokacija' );
    if ( d.lokacija ) { lokVal.textContent = d.lokacija; lokEl.hidden = false; }
    else { lokEl.hidden = true; }

    const godEl  = panel.querySelector( '.jg-ref-detail__meta-godina' );
    const godVal = panel.querySelector( '.jg-val-godina' );
    if ( d.godina ) { godVal.textContent = d.godina; godEl.hidden = false; }
    else { godEl.hidden = true; }

    const povEl  = panel.querySelector( '.jg-ref-detail__meta-povrsina' );
    const povVal = panel.querySelector( '.jg-val-povrsina' );
    if ( d.povrsina ) { povVal.textContent = d.povrsina; povEl.hidden = false; }
    else { povEl.hidden = true; }

    const img    = panel.querySelector( '.jg-ref-detail__img' );
    const thumb  = panel.querySelector( '.jg-ref-detail__img-placeholder' );
    if ( d.thumb ) {
      img.src = d.thumb; img.alt = d.title || ''; img.hidden = false; thumb.hidden = true;
    } else {
      img.hidden = true; thumb.hidden = false;
    }

    const aboutEl   = panel.querySelector( '.jg-ref-detail__about' );
    const contentEl = panel.querySelector( '.jg-val-content' );
    const text = d.content || d.excerpt || '';
    if ( text ) { contentEl.textContent = text; aboutEl.hidden = false; }
    else { aboutEl.hidden = true; }

    const galleryEl = panel.querySelector( '.jg-ref-detail__gallery' );
    const slidesEl  = panel.querySelector( '.jg-ref-detail__slides' );
    const dotsEl    = panel.querySelector( '.jg-ref-detail__slide-dots' );
    let imgs = [];
    try { imgs = d.gallery ? JSON.parse( d.gallery ) : []; } catch (e) {}
    if ( ! imgs.length && d.thumb ) imgs = [ d.thumb ];
    if ( imgs.length ) {
      slidesEl.innerHTML = imgs.map( ( src, i ) =>
        `<div class="jg-ref-detail__slide${i === 0 ? ' is-active' : ''}"><img class="jg-ref-detail__gallery-img" src="${src}" alt="${d.title || ''}" loading="lazy"></div>`
      ).join( '' );
      dotsEl.innerHTML = imgs.map( ( _, i ) =>
        `<button class="jg-ref-detail__slide-dot${i === 0 ? ' is-active' : ''}" aria-label="Слика ${i + 1}"></button>`
      ).join( '' );
      initSlideshow( panel );
      galleryEl.hidden = false;
    } else {
      galleryEl.hidden = true;
    }
  }

  // Insert panel after the last card in the same row as the clicked card
  function insertAfterRow( card ) {
    const cards = Array.from( state.grid.querySelectorAll( '.jg-ref-card' ) );
    const idx   = parseInt( card.dataset.index, 10 );
    const cols  = COLS();
    const rowEnd = Math.min( Math.floor( idx / cols ) * cols + cols - 1, cards.length - 1 );
    const anchor = cards[ rowEnd ];
    anchor.after( state.panel );
  }

  function open( card ) {
    populate( card );
    insertAfterRow( card );
    state.panel.hidden = false;

    if ( state.activeCard ) state.activeCard.querySelector( '.jg-ref-card__inner' ).setAttribute( 'aria-expanded', 'false' );
    state.activeCard = card;
    card.querySelector( '.jg-ref-card__inner' ).setAttribute( 'aria-expanded', 'true' );

    requestAnimationFrame( () => {
      state.panel.scrollIntoView( { behavior: 'smooth', block: 'nearest' } );
    } );
  }

  function close() {
    if ( ! state.panel ) return;
    state.panel.hidden = true;
    if ( state.activeCard ) {
      state.activeCard.querySelector( '.jg-ref-card__inner' ).setAttribute( 'aria-expanded', 'false' );
      state.activeCard = null;
    }
  }

  // (Re)binds card-expand behavior to whatever grid/panel currently exist in
  // #jg-ref-results. Must be re-run after every AJAX content swap, since the
  // grid and panel nodes are replaced wholesale each time.
  function initExpand() {
    state.grid  = document.getElementById( 'jg-ref-card-grid' );
    state.panel = document.getElementById( 'jg-ref-detail' );
    state.activeCard = null;
    if ( ! state.grid || ! state.panel ) return;

    state.grid.addEventListener( 'click', function ( e ) {
      const card = e.target.closest( '.jg-ref-card' );
      if ( ! card ) return;
      if ( card === state.activeCard ) { close(); return; }
      open( card );
    } );

    const closeX   = state.panel.querySelector( '.jg-ref-detail__close-x' );
    const closeBtn = state.panel.querySelector( '.jg-ref-detail__close-btn' );
    if ( closeX )   closeX.addEventListener( 'click', close );
    if ( closeBtn ) closeBtn.addEventListener( 'click', close );

    // Deep link from another page (?proj=<slug>): open that project's panel
    // automatically and scroll to it - but only once everything on the page
    // (images above it especially) has finished loading and settled, or the
    // scroll target computed too early lands short.
    const deepSlug = resultsEl.dataset.deeplink;
    if ( deepSlug ) {
      const targetCard = state.grid.querySelector( '.jg-ref-card[data-slug="' + deepSlug.replace( /"/g, '' ) + '"]' );
      if ( targetCard ) {
        open( targetCard );
        const scrollToPanel = () => {
          requestAnimationFrame( () => {
            state.panel.scrollIntoView( { behavior: 'smooth', block: 'start' } );
          } );
        };
        if ( document.readyState === 'complete' ) {
          scrollToPanel();
        } else {
          window.addEventListener( 'load', scrollToPanel, { once: true } );
        }
      }
    }
  }

  // Reposition on resize (bound once, reads current state)
  window.addEventListener( 'resize', () => {
    if ( state.activeCard && state.panel && ! state.panel.hidden ) insertAfterRow( state.activeCard );
  } );

  // Escape key (bound once, reads current state)
  document.addEventListener( 'keydown', ( e ) => {
    if ( e.key === 'Escape' && state.panel && ! state.panel.hidden ) close();
  } );

  // ── AJAX filtering / pagination (no full page reload) ──────────────────

  function setLoading( isLoading ) {
    resultsEl.setAttribute( 'aria-busy', isLoading ? 'true' : 'false' );
    resultsEl.style.opacity = isLoading ? '0.5' : '';
  }

  function updateSidebarActive( url ) {
    if ( ! sidebar ) return;
    const kategorija = new URL( url, window.location.origin ).searchParams.get( 'kategorija' ) || '';
    sidebar.querySelectorAll( '.jg-ref-sidebar__link' ).forEach( ( link ) => {
      const linkKat = new URL( link.href, window.location.origin ).searchParams.get( 'kategorija' ) || '';
      link.classList.toggle( 'is-active', linkKat === kategorija );
    } );
  }

  function loadResults( url, pushState ) {
    setLoading( true );
    fetch( url, { credentials: 'same-origin' } )
      .then( ( res ) => res.text() )
      .then( ( html ) => {
        const doc = new DOMParser().parseFromString( html, 'text/html' );
        const newResults = doc.getElementById( 'jg-ref-results' );
        if ( ! newResults ) { window.location.href = url; return; }

        resultsEl.innerHTML = newResults.innerHTML;
        updateSidebarActive( url );
        initExpand();
        setLoading( false );

        if ( pushState ) {
          window.history.pushState( { jgRefUrl: url }, '', url );
        }
      } )
      .catch( () => {
        window.location.href = url; // Fall back to a normal navigation on any failure.
      } );
  }

  // Delegate clicks on sidebar category links and pagination links - both
  // live inside elements that persist (sidebar) or get replaced (pagination,
  // inside #jg-ref-results), so a single document-level delegated listener
  // covers both without needing to rebind after each swap.
  document.addEventListener( 'click', function ( e ) {
    const catLink = e.target.closest( '.jg-ref-sidebar__link' );
    if ( catLink ) {
      e.preventDefault();
      loadResults( catLink.href, true );
      return;
    }
    const pageLink = e.target.closest( '.jg-ref-pagination__btn' );
    if ( pageLink ) {
      e.preventDefault();
      loadResults( pageLink.href, true );
    }
  } );

  // Browser back/forward
  window.addEventListener( 'popstate', () => {
    loadResults( window.location.href, false );
  } );

  initExpand();

} )();
