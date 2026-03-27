/**
 * Front page parallax scroll effect
 *
 * @package ehriproject-wp-theme
 */

window.addEventListener( 'load', function () {
	const layer1 = document.getElementById( 'parallax-back' );
	const layer2 = document.getElementById( 'parallax-mid' );
	const layer3 = document.getElementById( 'parallax-front' );

	if ( ! layer1 || ! layer2 || ! layer3 ) {
		return;
	}

	window.addEventListener( 'scroll', () => {
		const scrolled = window.pageYOffset;

		// Different speeds for each layer
		// Layer 1 (background) moves slowest
		layer1.style.transform = `translateY(${ scrolled * 0.1 }px)`;

		// Layer 2 (mid-ground) moves at medium speed
		layer2.style.transform = `translateY(${ scrolled * 0.2 }px)`;

		// Layer 3 (foreground) moves fastest
		layer3.style.transform = `translateY(${ scrolled * 0.3 }px)`;
	} );
} );
