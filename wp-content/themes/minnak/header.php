<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MiNNaK
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page-overlay" class="loading">
	<span aria-hidden="true" aria-label="<?php esc_attr_e( 'Loading', 'minnak' ); ?>">
		<?php echo esc_html__( 'Loading...', 'minnak' ); ?>
	</span>
</div> 
<div id="page" class="site d-flex">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'minnak' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding">
		<?php if ( get_header_image() ) : ?>
			<div id="site-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
			</div>
		<?php endif; ?>
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$minnak_description = get_bloginfo( 'description', 'display' );
			if ( $minnak_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $minnak_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div>
	</header>
	<button id="toggle-button" class="btn toggle-button">
		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 10C12 11.1046 11.1046 12 10 12C8.89539 12 8 11.1046 8 10C8 8.89539 8.89539 8 10 8C11.1046 8 12 8.89539 12 10Z" fill="black"/>
			<path d="M12 4C12 5.10461 11.1046 6 10 6C8.89539 6 8 5.10461 8 4C8 2.89539 8.89539 2 10 2C11.1046 2 12 2.89539 12 4Z" fill="black"/>
			<path d="M12 16C12 17.1046 11.1046 18 10 18C8.89539 18 8 17.1046 8 16C8 14.8954 8.89539 14 10 14C11.1046 14 12 14.8954 12 16Z" fill="black"/>
		</svg>
	</button>
	<div id="left-sidebar" class="left-sidebar">
		<div class="sidebar-content-area">
			<div class="sidebar-menu-area">
				<div class="sidebar-menu-icons">
					<ul class="vertical-sidebar-menu list-unstyled" id="v-pills-tab">
						<?php if ( ( get_theme_mod( 'menu_type', 'main' ) === 'main' ) ) { ?>
							<li class="vertical-menu-item active-menu">
								<a class="nav-link main-menu-nav" id="v-pills-menu-tab" href="#main-menu-tab" role="tab" aria-selected="true">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M25.6962 14.5H10.3038C10.2232 14.5 10.146 14.4473 10.089 14.3536C10.032 14.2598 10 14.1326 10 14C10 13.8674 10.032 13.7402 10.089 13.6464C10.146 13.5527 10.2232 13.5 10.3038 13.5H25.6962C25.7768 13.5 25.854 13.5527 25.911 13.6464C25.968 13.7402 26 13.8674 26 14C26 14.1326 25.968 14.2598 25.911 14.3536C25.854 14.4473 25.7768 14.5 25.6962 14.5Z" fill="#B7BDC0"/>
										<path d="M25.6962 22.5H10.3038C10.2232 22.5 10.146 22.4473 10.089 22.3536C10.032 22.2598 10 22.1326 10 22C10 21.8674 10.032 21.7402 10.089 21.6464C10.146 21.5527 10.2232 21.5 10.3038 21.5H25.6962C25.7768 21.5 25.854 21.5527 25.911 21.6464C25.968 21.7402 26 21.8674 26 22C26 22.1326 25.968 22.2598 25.911 22.3536C25.854 22.4473 25.7768 22.5 25.6962 22.5Z" fill="#B7BDC0"/>
									</svg>
								</a>
								<div class="menu-content-area" id="main-menu-tab" role="tabpanel" aria-labelledby="v-pills-menu-tab">
									<div class="menu-content main-menu-tab">
										<div class="menu-scrollable">
											<nav id="site-navigation" class="main-navigation">
												<?php
												wp_nav_menu(
													array(
														'theme_location' => 'menu-1',
														'menu_id'        => 'primary-menu',
													)
												);
												?>
											</nav>
										</div>
									</div>
								</div>
							</li>
						<?php } else if ( ( get_theme_mod( 'menu_type', 'main' ) === 'category' ) ) { ?>
							<li class="vertical-menu-item active-menu">
								<a class="nav-link category-nav " id="v-pills-cats-tab" href="#category-menu-tab" role="tab" aria-selected="true">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H11L11 16H16V11ZM11 10C10.4477 10 10 10.4477 10 11V16C10 16.5523 10.4477 17 11 17H16C16.5523 17 17 16.5523 17 16V11C17 10.4477 16.5523 10 16 10H11Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M25 11H20L20 16H25V11ZM20 10C19.4477 10 19 10.4477 19 11V16C19 16.5523 19.4477 17 20 17H25C25.5523 17 26 16.5523 26 16V11C26 10.4477 25.5523 10 25 10H20Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M25 20H20L20 25H25V20ZM20 19C19.4477 19 19 19.4477 19 20V25C19 25.5523 19.4477 26 20 26H25C25.5523 26 26 25.5523 26 25V20C26 19.4477 25.5523 19 25 19H20Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16 20H11L11 25H16V20ZM11 19C10.4477 19 10 19.4477 10 20V25C10 25.5523 10.4477 26 11 26H16C16.5523 26 17 25.5523 17 25V20C17 19.4477 16.5523 19 16 19H11Z" fill="#B7BDC0"/>
									</svg>
								</a>
								<div class="menu-content-area" id="category-menu-tab" role="tabpanel" aria-labelledby="v-pills-cats-tab">
									<div class="menu-content category-tab">
										<div class="menu-scrollable">
											<div class="widget widget_categories">
												<ul>
													<?php
													wp_list_categories(
														array(
															'orderby'    => 'count',
															'order'      => 'DESC',
															'show_count' => 0,
															'title_li'   => '',
														)
													);
													?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php } else { ?>
							<li class="vertical-menu-item active-menu">
								<a class="nav-link main-menu-nav" id="v-pills-menu-tab" href="#main-menu-tab" role="tab" aria-selected="true">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M25.6962 14.5H10.3038C10.2232 14.5 10.146 14.4473 10.089 14.3536C10.032 14.2598 10 14.1326 10 14C10 13.8674 10.032 13.7402 10.089 13.6464C10.146 13.5527 10.2232 13.5 10.3038 13.5H25.6962C25.7768 13.5 25.854 13.5527 25.911 13.6464C25.968 13.7402 26 13.8674 26 14C26 14.1326 25.968 14.2598 25.911 14.3536C25.854 14.4473 25.7768 14.5 25.6962 14.5Z" fill="#B7BDC0"/>
										<path d="M25.6962 22.5H10.3038C10.2232 22.5 10.146 22.4473 10.089 22.3536C10.032 22.2598 10 22.1326 10 22C10 21.8674 10.032 21.7402 10.089 21.6464C10.146 21.5527 10.2232 21.5 10.3038 21.5H25.6962C25.7768 21.5 25.854 21.5527 25.911 21.6464C25.968 21.7402 26 21.8674 26 22C26 22.1326 25.968 22.2598 25.911 22.3536C25.854 22.4473 25.7768 22.5 25.6962 22.5Z" fill="#B7BDC0"/>
									</svg>
								</a>
								<div class="menu-content-area" id="main-menu-tab" role="tabpanel" aria-labelledby="v-pills-menu-tab">
									<div class="menu-content main-menu-tab">
										<div class="menu-scrollable">
											<nav id="site-navigation" class="main-navigation">
												<?php
												wp_nav_menu(
													array(
														'theme_location' => 'menu-1',
														'menu_id'        => 'primary-menu',
													)
												);
												?>
											</nav>
										</div>
									</div>
								</div>
							</li>
							<li class="vertical-menu-item">
								<a class="nav-link category-nav" id="v-pills-cats-tab" href="#category-menu-tab" role="tab" aria-selected="true">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H11L11 16H16V11ZM11 10C10.4477 10 10 10.4477 10 11V16C10 16.5523 10.4477 17 11 17H16C16.5523 17 17 16.5523 17 16V11C17 10.4477 16.5523 10 16 10H11Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M25 11H20L20 16H25V11ZM20 10C19.4477 10 19 10.4477 19 11V16C19 16.5523 19.4477 17 20 17H25C25.5523 17 26 16.5523 26 16V11C26 10.4477 25.5523 10 25 10H20Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M25 20H20L20 25H25V20ZM20 19C19.4477 19 19 19.4477 19 20V25C19 25.5523 19.4477 26 20 26H25C25.5523 26 26 25.5523 26 25V20C26 19.4477 25.5523 19 25 19H20Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16 20H11L11 25H16V20ZM11 19C10.4477 19 10 19.4477 10 20V25C10 25.5523 10.4477 26 11 26H16C16.5523 26 17 25.5523 17 25V20C17 19.4477 16.5523 19 16 19H11Z" fill="#B7BDC0"/>
									</svg>
								</a>
								<div class="menu-content-area" id="category-menu-tab" role="tabpanel" aria-labelledby="v-pills-cats-tab">
									<div class="menu-content category-tab">
										<div class="menu-scrollable">
											<div class="widget widget_categories">
												<ul>
													<?php
													wp_list_categories(
														array(
															'orderby'    => 'count',
															'order'      => 'DESC',
															'show_count' => 0,
															'title_li'   => '',
														)
													);
													?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						<?php if ( ! empty( get_theme_mod( 'show_search', true ) ) ) { ?>
							<li class="vertical-menu-item">
								<a class="nav-link search-nav" id="v-pills-search-tab" href="#search-tab" role="tab" aria-controls="v-pills-search" aria-selected="false">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M21.6464 21.6464C21.8417 21.4512 22.1583 21.4512 22.3536 21.6464L25.8536 25.1464C26.0488 25.3417 26.0488 25.6583 25.8536 25.8536C25.6583 26.0488 25.3417 26.0488 25.1464 25.8536L21.6464 22.3536C21.4512 22.1583 21.4512 21.8417 21.6464 21.6464Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M17 23C20.3137 23 23 20.3137 23 17C23 13.6863 20.3137 11 17 11C13.6863 11 11 13.6863 11 17C11 20.3137 13.6863 23 17 23ZM17 24C20.866 24 24 20.866 24 17C24 13.134 20.866 10 17 10C13.134 10 10 13.134 10 17C10 20.866 13.134 24 17 24Z" fill="#B7BDC0"/>
									</svg>
								</a>
								<div class="menu-content-area" id="search-tab" role="tabpanel" aria-labelledby="v-pills-search-tab">
									<div class="menu-content search-tab">
										<div class="menu-scrollable">
											<?php get_search_form(); ?>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
							<li class="vertical-menu-item">
								<a class="nav-link widget-nav" id="v-pills-widgets-tab" href="#widget-tab" role="tab" aria-controls="v-pills-widgets" aria-selected="false">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M11 12V24H14V12H11ZM10.6818 11H14.3182C14.6947 11 15 11.3053 15 11.6818V24.3182C15 24.6947 14.6947 25 14.3182 25H10.6818C10.3053 25 10 24.6947 10 24.3182V11.6818C10 11.3053 10.3053 11 10.6818 11Z" fill="#B7BDC0"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M17 12V24H25V12H17ZM16.6818 11H25.3182C25.6947 11 26 11.3053 26 11.6818V24.3182C26 24.6947 25.6947 25 25.3182 25H16.6818C16.3053 25 16 24.6947 16 24.3182V11.6818C16 11.3053 16.3053 11 16.6818 11Z" fill="#B7BDC0"/>
									</svg>
								</a>
								<div class="menu-content-area" id="widget-tab" role="tabpanel" aria-labelledby="v-pills-widgets-tab">
									<div class="menu-content widget-tab">
										<div class="menu-scrollable">
											<?php get_sidebar(); ?>
										</div>
									</div>
								</div>
							</li>
						<?php endif; ?>
					</ul>
				</div>

			</div>
		</div>	
		<div id="left-sidebar-footer" class="left-sidebar-footer">		
			<?php minnak_social_links_icons_function(); ?>
			<?php
				$sidebar_footer_menu = wp_nav_menu(
					array(
						'theme_location'  => 'menu-2',
						'sub_menu'        => false,
						'echo'            => false,
						'menu_id'         => 'sidebar-footer-menu',
						'fallback_cb'     => '__return_false',
					)
				);
				if ( ! empty( $sidebar_footer_menu ) ) {
					echo '<div class="left-sidebar-footer-menu d-flex justify-content-center flex-wrap">' . $sidebar_footer_menu . '</div>';
				}
				?>
		</div>
	</div>
	
