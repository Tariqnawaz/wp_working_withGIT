<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MiNNaK
 */
?>
<div class="item col-12 col-md-6 col-lg-6 col-xl-4 px-md-4 pb-5">
	<div class="article-wrapper">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php	if ( has_post_thumbnail() && ! post_password_required() ) { ?>
				<div class="img-frame">
					<?php minnak_post_thumbnail(); ?>
				</div>
			<?php } ?>	
			<div class="article-content">
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php minnak_posted_on(); ?>
					</div>
					<?php endif; ?>
				</header>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</div>
