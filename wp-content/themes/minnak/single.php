<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MiNNaK
 */

get_header();
?>

	<main id="primary" class="site-main d-flex flex-column justify-content-between">
		<div class="grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile; // End of the loop.
			?>
			</div>
			<?php
			if ( is_rtl() ) :
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle"> &xrarr; ' . esc_html__( 'Previous', 'minnak' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'minnak' ) . ' &xlarr;</span> <span class="nav-title">%title</span>',
					)
				);
			else :
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle"> &xlarr; ' . esc_html__( 'Previous', 'minnak' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'minnak' ) . ' &xrarr;</span> <span class="nav-title">%title</span>',
					)
				);
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			get_footer();

