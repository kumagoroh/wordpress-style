<?php
/**
 * Kuma Style back compat functionality
 *
 * Prevents Kuma Style from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Kuma_Style
 * @since Kuma Style 1.0
 */

/**
 * Prevent switching to Kuma Style on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Kuma Style 1.0
 */
function kumastyle_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'kumastyle_upgrade_notice' );
}
add_action( 'after_switch_theme', 'kumastyle_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Kuma Style on WordPress versions prior to 4.7.
 *
 * @since Kuma Style 1.0
 *
 * @global string $wp_version WordPress version.
 */
function kumastyle_upgrade_notice() {
	printf(
		'<div class="error"><p>%s</p></div>',
		sprintf(
			/* translators: %s: The current WordPress version. */
			__( 'Kuma Style requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kumastyle' ),
			$GLOBALS['wp_version']
		)
	);
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Kuma Style 1.0
 *
 * @global string $wp_version WordPress version.
 */
function kumastyle_customize() {
	wp_die(
		sprintf(
			/* translators: %s: The current WordPress version. */
			__( 'Kuma Style requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kumastyle' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'kumastyle_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Kuma Style 1.0
 *
 * @global string $wp_version WordPress version.
 */
function kumastyle_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				/* translators: %s: The current WordPress version. */
				__( 'Kuma Style requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kumastyle' ),
				$GLOBALS['wp_version']
			)
		);
	}
}
add_action( 'template_redirect', 'kumastyle_preview' );
