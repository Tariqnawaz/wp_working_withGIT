<?php
/**
 * MiNNaK functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MiNNaK
 */

if ( ! defined( 'MINNAK_VERSION' ) ) {
	define( 'MINNAK_VERSION', '1.0.4' );
}

function minnak_loading_inline_style() {
	wp_enqueue_style( 'minnak-loading-style', get_template_directory_uri() . '/plugins/loading/loading.css', array(), MINNAK_VERSION );
}
add_action( 'wp_head', 'minnak_loading_inline_style', 0 );

function minnak_sub_enqueue_scripts() {
	wp_enqueue_script( 'minnak-loading', get_template_directory_uri() . '/plugins/loading/loading.js', array(), MINNAK_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'minnak_sub_enqueue_scripts' );

function minnak_add_noscript_filter( $tag, $handle, $src ) {
	if ( 'minnak-loading' === $handle ) {
			$noscript = '<noscript>';
			$noscript .= '<style>#page-overlay{display: none!important;}</style>';
			$noscript .= '</noscript>';
			$tag = $tag . $noscript;
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'minnak_add_noscript_filter', 10, 3 );

if ( ! function_exists( 'minnak_setup' ) ) :
	function minnak_setup() {
		load_theme_textdomain( 'minnak', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'minnak' ),
				'menu-2' => esc_html__( 'Sidebar Footer Menu', 'minnak' ),
			)
		);
		function minnak_add_post_formats() {
			add_theme_support(
				'post-formats',
				array(
					'quote',
					'image',
					'audio',
					'video',
				)
			);
		}
		add_action( 'after_setup_theme', 'minnak_add_post_formats', 11 );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'minnak_custom_background_args',
				array(
					'default-color' => 'EEF3F5',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'minnak_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $minnak_content_width
 */
function minnak_content_width_func() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'minnak_content_width_func', 640 );
}
add_action( 'after_setup_theme', 'minnak_content_width_func', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minnak_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'minnak' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'minnak' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'minnak_widgets_init' );

function minnak_scripts() {
	wp_enqueue_style( 'minnak-bootstrap-style', get_template_directory_uri() . '/plugins/bootstrap/bootstrap.min.css' );
	wp_enqueue_style( 'minnak-style', get_stylesheet_uri(), array(), MINNAK_VERSION );
	wp_enqueue_script( 'minnak-bootstrap-js', get_template_directory_uri() . '/plugins/bootstrap/bootstrap.bundle.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'minnak-muuri-js', get_template_directory_uri() . '/plugins/muuri/muuri.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'minnak-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MINNAK_VERSION, true );
	wp_enqueue_script( 'minnak-main-js', get_template_directory_uri() . '/js/main.js', array(), MINNAK_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'minnak-comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minnak_scripts', 1 );

function minnak_rtl_css() {
	wp_enqueue_style( 'minnak-rtl-style', get_template_directory_uri() . '/style-rtl.css', array(), MINNAK_VERSION );
}
if ( is_rtl() ) :
	add_action( 'wp_enqueue_scripts', 'minnak_rtl_css' );
endif;


function minnak_run_muuri() {
	if ( ! is_singular() && ! is_admin() ) {
		wp_enqueue_script( 'minnak-muuri-options-js', get_template_directory_uri() . '/js/muuri-options.js', array( 'jquery' ) );
	}
}
add_action( 'wp_print_scripts', 'minnak_run_muuri', 10 );

function minnak_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	if ( ! has_excerpt() ) {
		if ( ( get_theme_mod( 'column_settings' ) === 'one' ) ) :
			return 60;
		else :
			return 35;
		endif;
	}
}
add_filter( 'excerpt_length', 'minnak_custom_excerpt_length', 999 );

add_filter(
	'get_the_archive_title',
	function( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_tax() ) { //for custom post types
			$title = sprintf( ( '%1$s' ), single_term_title( '', false ) );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		}
		return $title;
	}
);

function minnak_remove_search_value( $html ) {
	$html = str_replace( 'value="Search"', 'value=""', $html );
	return $html;
}
add_filter( 'get_search_form', 'minnak_remove_search_value' );

function minnak_ellipsis( $content ) {
	return str_replace( '[&hellip;]', '...', $content );
}
add_filter( 'the_excerpt', 'minnak_ellipsis' );

function minnak_styling_post_counts( $variable ) {
	$variable = str_replace( '</a> (', ' <span class="post_count">(', $variable );
	$variable = str_replace( ')', ')</span></a>', $variable );
	return $variable;
}
add_filter( 'wp_list_categories', 'minnak_styling_post_counts' );

function minnak_styling_archive_counts( $variable ) {
	$variable = str_replace( '</a>&nbsp;(', ' <span class="post_count">(', $variable );
	$variable = str_replace( ')', ')</span></a>', $variable );
	return $variable;
}
add_filter( 'get_archives_link', 'minnak_styling_archive_counts' );

function minnak_auto_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results(
		"SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM
		$wpdb->posts
		WHERE post_status = 'publish' "
	);
	$output = '';
	if ( $copyright_dates ) {
		$copyright = '&copy; ' . $copyright_dates[0]->firstdate;
		if ( $copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate ) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright;
	}
	return $output;
}

function minnak_site_copyright() {

	$minnak_custom_copyright_textarea = get_theme_mod( 'minnak_custom_copyright_textarea', '' );
	if ( empty( $minnak_custom_copyright_textarea ) ) :
		$html  = '<span id="copyright-text-area"> ' . '<a href="' . esc_url( __( 'https://wordpress.org/', 'minnak' ) ) . '">' . esc_html( __( 'Proudly powered by WordPress','minnak' ) ) . '<span class="sep"> - </span>' . '</a>' . esc_html( __( 'Copyright','minnak' ) ) . ' ' . minnak_auto_copyright() . '</span>';
		echo wp_kses(
			$html,
			array(
				'a'  => array(
					'href' => array(),
					'title' => array(),
				),
				'span'  => array(
					'class' => array(),
					'id' => array(),
				),
			)
		);
	else :
		echo wp_kses_post( $minnak_custom_copyright_textarea ); // Allow html.
	endif;
}

function minnak_credit() {
	$minnak_footer_credit_checkbox = get_theme_mod( 'minnak_footer_credit_checkbox', true );
	if ( ! empty( $minnak_footer_credit_checkbox ) ) :
		$html = '<span id="footer-credit-area"><span class="sep"> | </span>' . esc_html( __( 'Theme: MiNNaK by ','minnak' ) ) . '<a href="' . esc_url( 'https://tamermancar.com/' ) . '">' . 'Tamer Mancar' . '</a></span>';
		echo wp_kses(
			$html,
			array(
				'a'  => array(
					'href' => array(),
					'title' => array(),
				),
				'span'  => array(
					'class' => array(),
					'id' => array(),
				),
			)
		);
	endif;
}


function minnak_tag_cloud( $tag_string ) {
	return preg_replace( '/style=("|\')(.*?)("|\')/', '', $tag_string );
}
add_filter( 'wp_generate_tag_cloud', 'minnak_tag_cloud', 10, 1 );

function minnak_tag_cloud_args( $args ) {
	$my_args = array(
		'smallest'  => 10,
		'largest'   => 10,
		'orderby'   => 'count',
		'order'     => 'DESC',
		'format'    => 'list',
	);
	$args = wp_parse_args( $args, $my_args );
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'minnak_tag_cloud_args' );

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Check if given term has child terms
 *
 * @param Integer $term_id
 * @param String $taxonomy
 *
 * @return Boolean
 */
function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
	$children = get_categories( array( 
			'child_of'      => $term_id,
			'taxonomy'      => $taxonomy,
			'hide_empty'    => false,
			'fields'        => 'ids',
	) );
	return ( $children );
}