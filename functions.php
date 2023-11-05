<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'slick', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/slick.css');
		wp_enqueue_style( 'slick-theme', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/slick-theme.css');
		wp_enqueue_style( 'child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css');
		wp_enqueue_style( 'custom-child', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/custom.css');

		wp_enqueue_script('slick-js', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/slick.min.js',array('jquery'));
		wp_enqueue_script('custom-js', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/custom.js', array('jquery'));
		
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );


add_shortcode( 'show_testimonials', 'show_testimonials_func' );
function show_testimonials_func( $atts ) {
	$args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => 5
	);                                              
	$items = new WP_Query( $args );
	if ( $items->have_posts() ) {	
    	echo '<div class="testimonial-wrapper">';
    		while ( $items->have_posts() ) {
				$items->the_post();
				$featured_image = get_the_post_thumbnail_url();
				$company_logo = get_field('company_logo');
				$position = get_field('position');
				$author_image = get_field('author');
				?>
				<div class="testimonial-item">
					<div class="right-side">
						<div class="main-image"><img src="<?php echo $featured_image;?>" ></div>
						<div class="company-logo">
							<img src="<?php echo $company_logo;?>">
						</div>
					</div>
					<div class="left-side">
						<div class="content-wrapper">
							<?php echo the_content();?>
						</div>
						<div class="author-wrapper">
							<div class="author-image">
								<img src="<?php echo $author_image;?>">
							</div>
							<div class="author-content">
								<p class="author"><?php echo the_title();?></p>
								<p><?php echo $position;?></p>
							</div>						
						</div>
					</div>
				</div>
				<?php			
			}
    	echo '</div>';
    	wp_reset_postdata();
	} 
}


add_shortcode( 'show_achievement', 'show_achievement_func' );
function show_achievement_func( $atts ) {
	$args = array(
		'post_type' => 'achievement',
		'posts_per_page' => 6,
		'orderby' => 'ID', 
		'order' => 'ASC',
	);                                              
	$items = new WP_Query( $args );
	if ( $items->have_posts() ) {	
    	echo '<div class="achievement-wrapper">';
    		while ( $items->have_posts() ) {
				$items->the_post();
				$featured_image = get_the_post_thumbnail_url();
				?>
				<div class="achievement-item">
					<div class="item-wrapper">
						<div class="bg-colored">
							<div class="title"><?php echo the_title();?></div>
							<div class="content">
								<?php echo the_content();?>
							</div>
						</div>
						<div class="image">
							<img src="<?php echo $featured_image;?>">
						</div>
					</div>
				</div>
				<?php			
			}
    	echo '</div>';
    	wp_reset_postdata();
	} 
}

add_action('wp_footer', 'go_to_top_function');
function go_to_top_function(){
	$string = '<div id="go_top">';
	$string .= '<a href="#content"><img src="http://localhost/test/wp-content/uploads/2023/11/arrow-204-256.png" /></a>';
	$string .= '</div>';
	echo $string;
};