<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MiNNaK
 */

get_header();
?>

	<main id="primary" class="site-main d-flex flex-column justify-content-between">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'minnak' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'minnak' ); ?></p>

					<?php
					get_search_form();
					the_widget( 'WP_Widget_Recent_Posts' );
					?>

			</div>
		</section>
		<?php get_footer(); ?>
