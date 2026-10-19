( function () {
	var tabs = document.querySelectorAll( '.jg-sof-katalozi__tab' );
	if ( ! tabs.length ) return;

	var frame = document.querySelector( '.jg-sof-katalozi__frame' );
	var label = document.querySelector( '.jg-sof-katalozi__viewer-label' );
	var openLink = document.querySelector( '.jg-sof-katalozi__viewer-open' );
	var downloadLink = document.querySelector( '.jg-sof-katalozi__viewer-download' );

	tabs.forEach( function ( tab ) {
		tab.addEventListener( 'click', function ( e ) {
			// Mobile browsers generally can't render a PDF inside an iframe,
			// so let the tap fall through to the real link (opens the PDF
			// directly) instead of swapping the embed.
			if ( window.matchMedia( '(max-width: 900px)' ).matches ) {
				return;
			}
			e.preventDefault();
			var url = tab.getAttribute( 'data-pdf' );
			if ( ! url || ! frame ) return;

			tabs.forEach( function ( t ) { t.classList.remove( 'is-active' ); } );
			tab.classList.add( 'is-active' );
			frame.src = url;
			if ( label ) label.textContent = tab.textContent.trim();
			if ( openLink ) openLink.href = url;
			if ( downloadLink ) downloadLink.href = url;
		} );
	} );
} )();
