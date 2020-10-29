<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MiNNaK
 */

get_header();
?>

	<main id="primary" class="site-main d-flex flex-column justify-content-between">
		<div class="content-list-area row justify-content-around mx-lg-n4">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>

			<div class="grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
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
