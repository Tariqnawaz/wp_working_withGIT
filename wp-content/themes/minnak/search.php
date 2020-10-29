<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package MiNNaK
 */

get_header();
?>

	<main id="primary" class="site-main d-flex flex-column justify-content-between">
		<?php if ( have_posts() ) : ?>
		<div class="content-list-area row justify-content-around mx-lg-n4">
			<header class="page-header">
				<h1 class="page-title">
					<?php
						/* translators: 1: search */
						printf( esc_html__( 'Search results for: %s', 'minnak' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>
			<div class="grid">
				<?php
				
				while ( have_posts() ) :
					the_post();
					?>
					<?php
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
				
				?>
			</div>
			<?php the_posts_navigation(); ?>
		</div>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			

			get_footer();
