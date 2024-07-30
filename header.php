<?php
/**
 * The header for our theme
 *
 * @subpackage Roofing Services
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'roofing-services' ); ?></a>

<div id="header">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="offset-lg-3 offset-md-4 col-lg-3 col-md-4 text-md-left text-center align-self-center contact mb-md-0 mb-2">
					<?php if( get_theme_mod('roofing_services_phone_number') != ''){?>
						<a href="tel:<?php echo esc_attr(get_theme_mod('roofing_services_phone_number')); ?>"><i class="fas fa-phone mr-2"></i><?php echo esc_html('Phone:','roofing-services'); ?> <?php echo esc_html(get_theme_mod('roofing_services_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('roofing_services_phone_number')); ?></span></a>
					<?php }?>
				</div>
				<div class="col-lg-4 col-md-4 text-md-left text-center align-self-center contact mb-md-0 mb-2">
					<?php if( get_theme_mod('roofing_services_email') != ''){?>
						<a href="mailto:<?php echo esc_attr(get_theme_mod('roofing_services_email')); ?>"><i class="fas fa-envelope mr-2"></i><?php echo esc_html('Email:','roofing-services'); ?> <?php echo esc_html(get_theme_mod('roofing_services_email')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('roofing_services_email')); ?></span></a>
					<?php }?>
				</div>
				<div class="offset-lg-0 offset-md-4 col-lg-2 col-md-8 pl-md-0">
					<div class="social-icons text-lg-right text-center my-lg-0 my-2">
						<?php if(get_theme_mod('roofing_services_facebook_url') != '') {?>
							<a href="<?php echo esc_url(get_theme_mod('roofing_services_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook','roofing-services'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('roofing_services_twitter_url') != '') {?>
							<a href="<?php echo esc_url(get_theme_mod('roofing_services_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter','roofing-services'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('roofing_services_instagram_url') != '') {?>
							<a href="<?php echo esc_url(get_theme_mod('roofing_services_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram','roofing-services'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('roofing_services_linkedin_url') != '') {?>
							<a href="<?php echo esc_url(get_theme_mod('roofing_services_linkedin_url')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin','roofing-services'); ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 pr-md-0 position-static">
					<div class="logo text-center">
						<?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		             	<?php if (get_theme_mod('roofing_services_show_site_title',true)) {?>
		          			<?php $blog_info = get_bloginfo( 'name' ); ?>
			                <?php if ( ! empty( $blog_info ) ) : ?>
			                  	<?php if ( is_front_page() && is_home() ) : ?>
			                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                  	<?php else : ?>
		                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                  		<?php endif; ?>
			                <?php endif; ?>
			            <?php }?>
			            <?php if (get_theme_mod('roofing_services_show_tagline',true)) {?>
			                <?php $description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) : ?>
			                  	<p class="site-description"><?php echo esc_html($description); ?></p>
		              		<?php endif; ?>
		          		<?php }?>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-6 align-self-center">
					<div class="menu-bar">
						<div class="toggle-menu responsive-menu text-right">
							<?php if(has_nav_menu('primary')){ ?>
				            	<button onclick="roofing_services_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','roofing-services'); ?></span></button>
				            <?php }?>
				        </div>
						<div id="sidelong-menu" class="nav sidenav">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'roofing-services' ); ?>">
			                  	<?php if(has_nav_menu('primary')){
				                    wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu-navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
				                    ) ); 
			                  	} ?>
			                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="roofing_services_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','roofing-services'); ?></span></a>
			                </nav>
			            </div>
			        </div>
				</div>
				<div class="col-lg-1 col-md-1 col-6 align-self-center">
					<div class="search-box text-md-right text-left">
						<button  onclick="roofing_services_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
					</div>
				</div>
				<div class="search-outer">
					<div class="search-inner">
			        	<?php get_search_form(); ?>
		        	</div>
		        	<button onclick="roofing_services_search_close()" class="search-close"><i class="fas fa-times"></i></button>
		        </div>
			</div>
		</div>
	</div>
</div>