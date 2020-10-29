<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MiNNaK
 */

?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'minnak' ); ?></h1>
	</header>
	<div class="grid">
		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :
				printf(
					'<p>' . wp_kses(
						/* translators: 1: first post. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'minnak' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'minnak' ); ?></p>
				<?php
				get_search_form();
				the_widget( 'WP_Widget_Recent_Posts' );

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'minnak' ); ?></p>
				<?php
				get_search_form();

			endif;
			?>
		</div>
	</div>
</section>
