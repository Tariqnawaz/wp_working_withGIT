<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MiNNaK
 */

get_header();
?>

	<main id="primary" class="site-main d-flex flex-column justify-content-between">
			<?php
			if ( have_posts() ) :
				?>
				<div class="content-list-area row justify-content-around mx-lg-n4">
					<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
						<?php
					endif;
					/* Start the Loop */
					?>
					<div class="grid">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );
							endwhile;
						?>
					<?php the_posts_navigation(); ?>
					</div>
				</div>
				<?php
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			<?php
			get_footer();
