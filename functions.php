<?php
	// Language
	add_action( 'after_setup_theme', 'setup' );

	function setup() {
		load_theme_textdomain('themonkies', get_template_directory());
	}

	// Thumbnail image
	add_theme_support( 'post-thumbnails' );

	// // Images in the_content
	// function filter_images($content){
	// 	$replace = 
	// 		'	</div>
	// 			<div class="col-lg-6 col-md-6">
	// 				<img class="alignleft \1 />
	// 			</div>
	// 			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">';

	// 		// '	</div>
	// 		// </div>
	// 		// <div class="row">
	// 		// 	<div class="col-lg-6 col-md-6">
	// 		// 		<img class="alignleft \1 />
	// 		// 	</div>
	// 		// </div>
	// 		// <div class="row">
	// 		// 	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">';
	//     return preg_replace('/<img class="\w*alignleft(.*) \/>\s*/iU', $replace, $content);
	// }
	// add_filter('the_content', 'filter_images');

	// Menu's
	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu' ),
				'footer_menu' => __( 'Footer Menu')
				)
			);
	}

	// Custom image thumbnail size
	add_image_size( 'news-thumb', 300, 300, true ); // (cropped)	
	add_image_size( 'half-page', 480, 300, true ); // (cropped)	

	// Excerpt settings and read more tag
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	add_filter('excerpt_more', 'new_excerpt_more');
	function custom_excerpt_length( $length ) {
		return 50;
	}
	function new_excerpt_more( $more ) {
		return '...';
	}

	function excerpt($limit) {
	    return wp_trim_words(get_the_excerpt(), $limit);
	}

	// Get specific pages by name
	function get_ID_by_slug($page_slug) {
	    $page = get_page_by_path($page_slug);
	    if ($page) {
	        return $page->ID;
	    } else {
	        return null;
	    }
	}

	// Widget area in footer
	add_action( 'widgets_init', 'arphabet_widgets_init' );
	function arphabet_widgets_init() {
		register_sidebar( array(
			'name' => 'Footer widget area',
			'id' => 'footer_widget',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		) );
	}

	// Widget area in footer
	add_action( 'widgets_init', 'events_widgets_init' );
	function events_widgets_init() {
		register_sidebar( array(
			'name' => 'Events widget area',
			'id' => 'events_widget',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		) );
	}


	// Remove paragraph from images
	add_filter('the_content', 'filter_ptags_on_images');
	function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
?>