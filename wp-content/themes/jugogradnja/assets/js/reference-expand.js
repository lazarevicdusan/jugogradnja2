( function () {
  'use strict';

  const grid   = document.getElementById( 'jg-ref-card-grid' );
  const panel  = document.getElementById( 'jg-ref-detail' );
  if ( ! grid || ! panel ) return;

  const COLS = () => window.innerWidth <= 600 ? 1 : 2;

  // Populate panel with card's data-* attributes
  function populate( card ) {
    const d = card.dataset;
    panel.querySelector( '.jg-ref-detail__cat' ).textContent   = d.cat  || '';
    panel.querySelector( '.jg-ref-detail__title' ).textContent = d.title || '';

    // Локација
    const lokEl  = panel.querySelector( '.jg-ref-detail__meta-lokacija' );
    const lokVal = panel.querySelector( '.jg-val-lokacija' );
    if ( d.lokacija ) { lokVal.textContent = d.lokacija; lokEl.hidden = false; }
    else { lokEl.hidden = true; }

    // Година
    const godEl  = panel.querySelector( '.jg-ref-detail__meta-godina' );
    const godVal = panel.querySelector( '.jg-val-godina' );
    if ( d.godina ) { godVal.textContent = d.godina; godEl.hidden = false; }
    else { godEl.hidden = true; }

    // Површина
    const povEl  = panel.querySelector( '.jg-ref-detail__meta-povrsina' );
    const povVal = panel.querySelector( '.jg-val-povrsina' );
    if ( d.povrsina ) { povVal.textContent = d.povrsina; povEl.hidden = false; }
    else { povEl.hidden = true; }

    // Image
    const img    = panel.querySelector( '.jg-ref-detail__img' );
    const thumb  = panel.querySelector( '.jg-ref-detail__img-placeholder' );
    if ( d.thumb ) {
      img.src = d.thumb; img.alt = d.title || ''; img.hidden = false; thumb.hidden = true;
    } else {
      img.hidden = true; thumb.hidden = false;
    }

    // О пројекту
    const aboutEl   = panel.querySelector( '.jg-ref-detail__about' );
    const contentEl = panel.querySelector( '.jg-val-content' );
    const text = d.content || d.excerpt || '';
    if ( text ) { contentEl.textContent = text; aboutEl.hidden = false; }
    else { aboutEl.hidden = true; }

    // Gallery (reuse same image for now)
    const galleryEl  = panel.querySelector( '.jg-ref-detail__gallery' );
    const galleryImg = panel.querySelector( '.jg-val-gallery-img' );
    if ( d.thumb ) {
      galleryImg.src = d.thumb; galleryImg.alt = d.title || '';
      galleryEl.hidden = false;
    } else {
      galleryEl.hidden = true;
    }
  }

  // Insert panel after the last card in the same row as the clicked card
  function insertAfterRow( card ) {
    const cards = Array.from( grid.querySelectorAll( '.jg-ref-card' ) );
    const idx   = parseInt( card.dataset.index, 10 );
    const cols  = COLS();
    const rowEnd = Math.min( Math.floor( idx / cols ) * cols + cols - 1, cards.length - 1 );
    const anchor = cards[ rowEnd ];
    anchor.after( panel );
  }

  let activeCard = null;

  function open( card ) {
    populate( card );
    insertAfterRow( card );
    panel.hidden = false;

    // Mark active
    if ( activeCard ) activeCard.querySelector( '.jg-ref-card__inner' ).setAttribute( 'aria-expanded', 'false' );
    activeCard = card;
    card.querySelector( '.jg-ref-card__inner' ).setAttribute( 'aria-expanded', 'true' );

    // Scroll into view
    requestAnimationFrame( () => {
      panel.scrollIntoView( { behavior: 'smooth', block: 'nearest' } );
    } );
  }

  function close() {
    panel.hidden = true;
    if ( activeCard ) {
      activeCard.querySelector( '.jg-ref-card__inner' ).setAttribute( 'aria-expanded', 'false' );
      activeCard = null;
    }
  }

  // Card click
  grid.addEventListener( 'click', function ( e ) {
    const card = e.target.closest( '.jg-ref-card' );
    if ( ! card ) return;
    if ( card === activeCard ) { close(); return; }
    open( card );
  } );

  // Close buttons
  panel.querySelector( '.jg-ref-detail__close-x' ).addEventListener( 'click', close );
  panel.querySelector( '.jg-ref-detail__close-btn' ).addEventListener( 'click', close );

  // Reposition on resize
  window.addEventListener( 'resize', () => {
    if ( activeCard && ! panel.hidden ) insertAfterRow( activeCard );
  } );

  // Escape key
  document.addEventListener( 'keydown', ( e ) => {
    if ( e.key === 'Escape' && ! panel.hidden ) close();
  } );

} )();
