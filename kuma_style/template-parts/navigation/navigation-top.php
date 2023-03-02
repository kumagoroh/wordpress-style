<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Kuma_Style
 * @since Kuma Style 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'kumastyle' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo kumastyle_get_svg( array( 'icon' => 'bars' ) );
		echo kumastyle_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'kumastyle' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>

	<?php if ( ( kumastyle_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo kumastyle_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'kumastyle' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
