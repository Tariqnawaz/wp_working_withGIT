<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MiNNaK
 */

?>
	<?php if ( is_singular() ) : ?>
	<div class="content-wrapper">
	<?php else : ?>
		<?php if ( ( get_theme_mod( 'column_settings', 'three' ) === 'three' ) ) : ?>
			<div class="item col-12 col-md-6 col-lg-6 col-xl-4 px-md-4 pb-5">
		<?php elseif ( ( get_theme_mod( 'column_settings', 'three' ) === 'two' ) ) : ?>
			<div class="item col-12 col-md-6 col-lg-6 col-xl-6 px-md-4 pb-5">
		<?php	else : ?>
			<div class="item col-12 col-md-12 col-lg-12 col-xl-12 px-md-5 pb-5">
		<?php endif; ?>
	<?php endif; ?>
		<div class="article-wrapper">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( is_sticky() && ! is_singular() ) : ?>
					<div class="sticky-icon">
						<svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M27.1974 0H1.82785C0.816392 0 0 0.829189 0 1.8565V26.2625C0 27.1064 0.404584 27.8916 1.08371 28.3759L11.2561 35.6037C12.0002 36.1321 12.9973 36.1321 13.7414 35.6037L23.9138 28.3759C24.5929 27.8916 24.9975 27.1064 24.9975 26.2625V5H30V2.8565C30 0.829189 29.2089 0 27.1974 0Z" fill="#222527"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M30 5V2.8565C30 0.829189 29.2089 0 27.1974 0H1.82785C0.816392 0 0 0.829189 0 1.8565V26.2625C0 27.1064 0.404584 27.8916 1.08371 28.3759L11.2561 35.6037C12.0002 36.1321 12.9973 36.1321 13.7414 35.6037L23.9138 28.3759C24.5929 27.8916 24.9975 27.1064 24.9975 26.2625V4.5H25V5H30ZM26 5H29V2.8565C29 1.93663 28.8138 1.54741 28.637 1.36612C28.4662 1.19089 28.0981 1 27.1974 1H1.82785C1.38328 1 1 1.36675 1 1.8565V26.2625C1 26.7847 1.24957 27.2655 1.66342 27.561L1.66432 27.5617L11.835 34.7884C12.2325 35.0705 12.765 35.0705 13.1625 34.7884L23.3332 27.5617L23.3342 27.5609C23.748 27.2654 23.9975 26.7847 23.9975 26.2625V4.5C23.9975 4.22386 24.2214 4 24.4975 4H25.5C25.7761 4 26 4.22386 26 4.5V5Z" fill="#888D90"/>
							<path d="M19.3498 15.2866L19.3489 15.2874L16.098 18.1543L15.8734 18.3523L15.9419 18.6438L16.9555 22.9534C16.9555 22.9536 16.9555 22.9537 16.9556 22.9538C17.0028 23.1573 16.9229 23.3255 16.7975 23.4209C16.6754 23.5139 16.5232 23.5316 16.3765 23.4371C16.3763 23.4369 16.376 23.4368 16.3758 23.4367L12.7749 21.0894L12.5025 20.9119L12.2298 21.0888L8.62118 23.4296C8.62111 23.4297 8.62104 23.4297 8.62097 23.4298C8.47412 23.5247 8.32177 23.5069 8.19949 23.4139C8.07418 23.3185 7.99427 23.1504 8.04142 22.9469C8.04146 22.9468 8.04149 22.9466 8.04153 22.9464L9.05507 18.6368L9.12361 18.3453L8.89906 18.1473L5.64929 15.2814C5.64913 15.2813 5.64897 15.2812 5.64881 15.281C5.50925 15.1569 5.46919 14.973 5.52218 14.8019C5.57442 14.6332 5.69952 14.5256 5.86587 14.514L5.86587 14.514L5.86903 14.5138L10.1067 14.1914L10.4205 14.1675L10.5347 13.8742L12.1357 9.76175C12.1358 9.76145 12.1359 9.76116 12.136 9.76087C12.274 9.41304 12.723 9.41304 12.861 9.76088C12.8611 9.76117 12.8612 9.76146 12.8613 9.76175L14.4623 13.8742L14.5765 14.1675L14.8903 14.1914L19.1268 14.5137C19.127 14.5137 19.1272 14.5137 19.1273 14.5138C19.4578 14.5402 19.657 15.017 19.3498 15.2866Z" fill="#222527" stroke="#E1E7EA"/>
						</svg>
					</div>
				<?php endif ?>
				<?php	if ( has_post_thumbnail() && ! post_password_required() ) { ?>
						<div class="img-frame">
							<?php minnak_post_thumbnail(); ?>
						</div>
				<?php } ?>	
				<?php	if ( ! has_post_thumbnail() && ! post_password_required() ) { ?>
					<?php if ( has_post_format( 'audio' ) ) { ?>
						<div class="img-frame">
							<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/audio-default-thumbnail.png" alt="Audio Default Thumbnail">
							</a>
						</div>
					<?php } ?>
					<?php if ( has_post_format( 'video' ) ) { ?>
						<div class="img-frame">
							<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/video-default-thumbnail.png" alt="Video Default Thumbnail">
							</a>
						</div>
					<?php } ?>
				<?php } ?>
				<div class="article-content">
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
							if ( 'post' === get_post_type() ) :
								?>
								<div class="entry-meta">
									<?php
										minnak_posted_on();
										$categories_list = get_the_category_list( esc_html__( ', ', 'minnak' ) );
									if ( $categories_list ) {
										printf( '<span class="cat-links">' . $categories_list . '</span>' );
									}
									?>
								</div>
								<?php
						endif;
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								if ( 'post' === get_post_type() && ! has_post_format( 'image' ) && ! has_post_format( 'quote' ) ) :
									?>
								<div class="entry-meta">
									<?php
										minnak_posted_on();
										$categories_list = get_the_category_list( esc_html__( ', ', 'minnak' ) );
									if ( $categories_list ) {
										printf( '<span class="cat-links">' . $categories_list . '</span>' );
									}
									?>
								</div>
									<?php
							endif;
						endif;
							?>
					</header>
					<div class="entry-content">
						<?php
						if ( is_singular() ) :
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'minnak' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								)
							);
						else :
							if ( ! has_post_format( 'image' ) && ! has_post_format( 'quote' ) ) :
								the_excerpt();
								if ( is_rtl() ) :
									echo '<div class="read-more-area"><a href="' . esc_url( get_the_permalink() ) . '"> ' . esc_html__( 'Read more', 'minnak' ) . ' &xlarr;</a></div>';
								else :
									echo '<div class="read-more-area"><a href="' . esc_url( get_the_permalink() ) . '"> ' . esc_html__( 'Read more', 'minnak' ) . ' &xrarr;</a></div>';
								endif;
							endif;
						endif;
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minnak' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>
					<?php if ( ! is_home() && ! is_archive() && ! is_search() ) : ?>
						<footer class="entry-footer d-flex align-self-center justify-content-between">
							<?php minnak_entry_footer(); ?>
						</footer>
					<?php endif; ?>

					<?php if ( is_singular() ) : ?>
						<?php if ( ! empty( get_theme_mod( 'show_author_bio', true ) ) ) { ?>
							<div id="author-info" class="author-info">
								<div class="author-avatar">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), '80', '' ); ?>
								</div>
								<div class="author-description">
									<p class="author-name"><?php echo '<span>' . esc_html__( 'Author:', 'minnak' ) . ' </span>' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></p>
									<p class="author-links">
										<span class="author-url">
											<?php
											if ( ! empty( get_the_author_meta( 'url', $post->post_author ) ) ) :
												echo '<a href=' . esc_url( get_the_author_meta( 'url', $post->post_author ) ) . ' target="_blank" rel="nofollow">' . esc_html__( 'Website', 'minnak' ) . '</a> | ';
											endif;
											?>
										</span>
										<span class="author-posts-link">
											<?php
												echo '<a href=' . esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) ) ) . ' target="_blank" rel="nofollow">' . esc_html__( 'All posts', 'minnak' ) . '</a>';
											?>
										</span>
									</p>
									<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
								</div>
							</div>
						<?php } ?>	
					<?php endif; ?>

				</div>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>
