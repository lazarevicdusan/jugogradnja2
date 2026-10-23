( function () {
	var tabs = document.querySelectorAll( '.jg-sof-katalozi__tab' );
	if ( ! tabs.length ) return;

	var label        = document.querySelector( '.jg-sof-katalozi__viewer-label' );
	var openLink     = document.querySelector( '.jg-sof-katalozi__viewer-open' );
	var downloadLink = document.querySelector( '.jg-sof-katalozi__viewer-download' );
	var pdfFrame     = document.getElementById( 'jg-sof-pdf-frame' );
	var pager        = document.getElementById( 'jg-sof-pager' );

	// Bumped on every tab switch so a still-loading chain from a catalog
	// the visitor already left stops instead of racing the new one.
	var loadToken = 0;

	function buildStack( imgbase, pages ) {
		var myToken = ++loadToken;
		pager.innerHTML = '';

		var slots = [];
		for ( var i = 1; i <= pages; i++ ) {
			var slot = document.createElement( 'div' );
			slot.className = 'jg-sof-katalozi__page';
			var spinner = document.createElement( 'div' );
			spinner.className = 'jg-sof-katalozi__page-spinner';
			var img = document.createElement( 'img' );
			img.className = 'jg-sof-katalozi__page-img';
			img.alt = '';
			slot.appendChild( spinner );
			slot.appendChild( img );
			pager.appendChild( slot );
			slots.push( { slot: slot, img: img } );
		}

		function loadPage( i ) {
			if ( myToken !== loadToken || i > pages ) return;
			var entry = slots[ i - 1 ];
			entry.img.onload = function () {
				if ( myToken !== loadToken ) return;
				entry.slot.classList.add( 'is-loaded' );
				loadPage( i + 1 );
			};
			entry.img.src = imgbase + 'page-' + String( i ).padStart( 2, '0' ) + '.jpg';
		}

		loadPage( 1 );
	}

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
			pdfFrame.hidden = true;
			pdfFrame.src = '';
			pager.hidden = false;
			buildStack( imgbase, pages );
		} else {
			loadToken++; // stop any in-flight stack from the previous catalog
			pager.hidden = true;
			pager.innerHTML = '';
			pdfFrame.hidden = false;
			pdfFrame.src = pdfUrl;
		}
	}

	tabs.forEach( function ( tab ) {
		tab.addEventListener( 'click', function ( e ) {
			// Mobile browsers generally can't render a PDF inside an iframe,
			// so let the tap fall through to the real link (opens the PDF
			// directly) instead of swapping the embed. The scroll-stack
			// viewer works fine on mobile though, so only bail out for
			// PDF-embed catalogs.
			var hasPages = tab.hasAttribute( 'data-pages' );
			if ( ! hasPages && window.matchMedia( '(max-width: 900px)' ).matches ) {
				return;
			}
			e.preventDefault();
			activateCatalog( tab );
		} );
	} );

	// Initial catalog (first tab) is already marked is-active server-side -
	// kick off its stack if it's a paged one.
	var initial = document.querySelector( '.jg-sof-katalozi__tab.is-active' );
	if ( initial && initial.hasAttribute( 'data-pages' ) ) {
		buildStack( initial.getAttribute( 'data-imgbase' ), parseInt( initial.getAttribute( 'data-pages' ), 10 ) );
	}
} )();
