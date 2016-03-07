<?php
/**
 * augustinpalm_theme functions file
 *
 * @package WordPress
 * @subpackage augustinpalm_theme
 * @since augustinpalm_theme 1.0
 */


/******************************************************************************\
	Theme support, standard settings, menus and widgets
\******************************************************************************/

add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'link' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

$custom_header_args = array(
	'width'         => 980,
	'height'        => 300,
	'default-image' => get_template_directory_uri() . '/images/header.png',
);
add_theme_support( 'custom-header', $custom_header_args );

/**
 * Print custom header styles
 * @return void
 */
function augustinpalm_theme_custom_header() {
	$styles = '';
	if ( $color = get_header_textcolor() ) {
		echo '<style type="text/css"> ' .
				'.site-header .logo .blog-name, .site-header .logo .blog-description {' .
					'color: #' . $color . ';' .
				'}' .
			 '</style>';
	}
}
add_action( 'wp_head', 'augustinpalm_theme_custom_header', 11 );

$custom_bg_args = array(
	'default-color' => 'fba919',
	'default-image' => '',
);
add_theme_support( 'custom-background', $custom_bg_args );

register_nav_menu( 'main-menu', __( 'Your sites main menu', 'augustinpalm_theme' ) );

if ( function_exists( 'register_sidebars' ) ) {
	register_sidebar(
		array(
			'id' => 'home-sidebar',
			'name' => __( 'Home widgets', 'augustinpalm_theme' ),
			'description' => __( 'Shows on home page', 'augustinpalm_theme' )
		)
	);

	register_sidebar(
		array(
			'id' => 'footer-sidebar',
			'name' => __( 'Footer widgets', 'augustinpalm_theme' ),
			'description' => __( 'Shows in the sites footer', 'augustinpalm_theme' )
		)
	);
}

if ( ! isset( $content_width ) ) $content_width = 650;

/**
 * Include editor stylesheets
 * @return void
 */
function augustinpalm_theme_editor_style() {
    add_editor_style( 'css/wp-editor-style.css' );
}
add_action( 'init', 'augustinpalm_theme_editor_style' );


/******************************************************************************\
	Scripts and Styles
\******************************************************************************/

/**
 * Enqueue augustinpalm_theme scripts
 * @return void
 */
function augustinpalm_theme_enqueue_scripts() {
	wp_enqueue_style( 'augustinpalm_theme-styles', get_stylesheet_uri(), array(), '1.0' );
	wp_enqueue_script( 'jquery' );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'augustinpalm_theme_enqueue_scripts' );


/******************************************************************************\
	Content functions
\******************************************************************************/

/**
 * Displays meta information for a post
 * @return void
 */
function augustinpalm_theme_post_meta() {
	if ( get_post_type() == 'post' ) {
		echo sprintf(
			__( 'Posted %s in %s%s by %s. ', 'augustinpalm_theme' ),
			get_the_time( get_option( 'date_format' ) ),
			get_the_category_list( ', ' ),
			get_the_tag_list( __( ', <b>Tags</b>: ', 'augustinpalm_theme' ), ', ' ),
			get_the_author_link()
		);
	}
	edit_post_link( __( ' (edit)', 'augustinpalm_theme' ), '<span class="edit-link">', '</span>' );
}

add_filter( 'show_admin_bar', '__return_false' );

add_action( 'admin_print_scripts-profile.php', 'wpbeginner_hide_admin_bar' );
function wpbeginner_hide_admin_bar() { ?>
<style type="text/css">
    .show-admin-bar { display: none; }
</style>
<?php
}