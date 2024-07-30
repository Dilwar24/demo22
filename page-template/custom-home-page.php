<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'roofing_services_above_slider' ); ?>

	<?php if( get_theme_mod('roofing_services_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $roofing_services_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'roofing_services_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $roofing_services_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($roofing_services_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $roofing_services_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
		            			<div class="slider-img text-right">
		            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
		            			</div>
		            			<div class="carousel-caption">
						            <div class="inner-carousel">
						              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						              	<hr>
						              	<p class="mb-2"><?php $roofing_services_excerpt = get_the_excerpt(); echo esc_html( roofing_services_string_limit_words( $roofing_services_excerpt,15 ) ); ?></p>
						              	<a href="<?php the_permalink(); ?>" class="read-btn"><span><?php echo esc_html('Read More','roofing-services'); ?></span></a>
				            		</div>
				            	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','roofing-services' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','roofing-services' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>
	
	<?php do_action('roofing_services_below_slider'); ?>

	<section id="about-section" class="py-5">
		<div class="container">
			<?php $roofing_services_about_page = array();
	      	$mod = intval( get_theme_mod( 'roofing_services_about_page'));
	     	if ( 'page-none-selected' != $mod ) {
	        	$roofing_services_about_page[] = $mod;
	      	}
	    	if( !empty($roofing_services_about_page) ) :
	      	$args = array(
	        	'post_type' => 'page',
	        	'post__in' => $roofing_services_about_page,
	        	'orderby' => 'post__in'
	      	);
	      	$query = new WP_Query( $args );
	     	if ( $query->have_posts() ) :
		        while ( $query->have_posts() ) : $query->the_post(); ?> 
		        	<div class="row m-0">    	
		          		<div class="col-lg-6 col-md-6">
							<div class="about-img position-relative">
								<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?>
								<?php } ?>
								<?php if(get_theme_mod('roofing_services_experience_years') != ''){?>
									<span class="years-text"><?php echo esc_html(get_theme_mod('roofing_services_experience_years')); ?></span>
								<?php }?>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="about-head mb-3 mt-3">
								<?php if(get_theme_mod('roofing_services_section_title') != ''){?>
									<h3><?php echo esc_html(get_theme_mod('roofing_services_section_title')); ?></h3>
								<?php }?>
							</div>
							<div class="about-content">
						      	<h4><?php the_title();?></h4>
						      	<p><?php the_excerpt(); ?></p>
						      	<div class="about-btn">
				            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('Get A Quote','roofing-services'); ?><span class="screen-reader-text"><?php esc_html_e('Get A Quote','roofing-services'); ?></span></a>
						       	</div>
					       	</div>
					    </div>
		          	</div>
		        <?php endwhile; 
		        wp_reset_postdata();?>
	      	<?php else : ?>
	          	<div class="no-postfound"></div>
	      	<?php endif;
	    	endif;?>
		</div>
	</section>

	<?php do_action('roofing_services_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>