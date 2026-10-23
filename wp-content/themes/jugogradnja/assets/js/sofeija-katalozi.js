( function () {
	var tabs = document.querySelectorAll( '.jg-sof-katalozi__tab' );
	if ( ! tabs.length ) return;

	var label      = document.querySelector( '.jg-sof-katalozi__viewer-label' );
	var openLink   = document.querySelector( '.jg-sof-katalozi__viewer-open' );
	var downloadLink = document.querySelector( '.jg-sof-katalozi__viewer-download' );
	var pdfFrame   = document.getElementById( 'jg-sof-pdf-frame' );
	var pager      = document.getElementById( 'jg-sof-pager' );
	var pagerImg   = document.getElementById( 'jg-sof-pager-img' );
	var pagerSpinner = document.getElementById( 'jg-sof-pager-spinner' );
	var pagerPrev  = document.getElementById( 'jg-sof-pager-prev' );
	var pagerNext  = document.getElementById( 'jg-sof-pager-next' );
	var pagerNum   = document.getElementById( 'jg-sof-pager-num' );
	var pagerTotal = document.getElementById( 'jg-sof-pager-total' );

	var pagerState = { imgbase: '', pages: 0, current: 1, loaded: {} };

	function pagerSrc( n ) {
		return pagerState.imgbase + 'page-' + String( n ).padStart( 2, '0' ) + '.jpg';
	}

	function pagerPreload( n ) {
		if ( n < 1 || n > pagerState.pages || pagerState.loaded[ n ] ) return;
		var pre = new Image();
		pre.onload = function () { pagerState.loaded[ n ] = true; };
		pre.src = pagerSrc( n );
	}

	function pagerGo( n ) {
		if ( n < 1 || n > pagerState.pages ) return;
		pagerState.current = n;
		pagerNum.textContent = n;
		pagerPrev.disabled = n === 1;
		pagerNext.disabled = n === pagerState.pages;

		pagerImg.classList.remove( 'is-shown' );
		pagerSpinner.hidden = false;
		var tester = new Image();
		tester.onload = function () {
			pagerState.loaded[ n ] = true;
			pagerImg.src = tester.src;
			pagerSpinner.hidden = true;
			pagerImg.classList.add( 'is-shown' );
			pagerPreload( n + 1 );
		};
		tester.src = pagerSrc( n );
	}

	pagerPrev.addEventListener( 'click', function () { pagerGo( pagerState.current - 1 ); } );
	pagerNext.addEventListener( 'click', function () { pagerGo( pagerState.current + 1 ); } );

	function activateCatalog( tab ) {
		var pdfUrl  = tab.getAttribute( 'data-pdf' );
		var pages   = parseInt( tab.getAttribute( 'data-pages' ) || '0', 10 );
		var imgbase = tab.getAttribute( 'data-imgbase' ) || '';

		tabs.forEach( function ( t ) { t.classList.remove( 'is-active' ); } );
		tab.classList.add( 'is-active' );
		if ( label ) label.textContent = tab.textContent.trim();
		if ( openLink ) openLink.href = pdfUrl;
		if ( downloadLink ) downloadLink.href = pdfUrl;

		if ( pages > 0 && imgbase ) {
			pagerState = { imgbase: imgbase, pages: pages, current: 1, loaded: {} };
			pagerTotal.textContent = pages;
			pdfFrame.hidden = true;
			pdfFrame.src = '';
			pager.hidden = false;
			pagerGo( 1 );
		} else {
			pager.hidden = true;
			pdfFrame.hidden = false;
			pdfFrame.src = pdfUrl;
		}
	}

	tabs.forEach( function ( tab ) {
		tab.addEventListener( 'click', function ( e ) {
			// Mobile browsers generally can't render a PDF inside an iframe,
			// so let the tap fall through to the real link (opens the PDF
			// directly) instead of swapping the embed. The fast pager works
			// fine on mobile though, so only bail out for PDF-embed catalogs.
			var hasPages = tab.hasAttribute( 'data-pages' );
			if ( ! hasPages && window.matchMedia( '(max-width: 900px)' ).matches ) {
				return;
			}
			e.preventDefault();
			activateCatalog( tab );
		} );
	} );
} )();
