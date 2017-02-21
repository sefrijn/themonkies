<?php
	// Thumbnail image
	add_theme_support( 'post-thumbnails' );

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

	// Excerpt settings and read more tag
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	add_filter('excerpt_more', 'new_excerpt_more');
	function custom_excerpt_length( $length ) {
		return 20;
	}
	function new_excerpt_more( $more ) {
		return '...';
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

	// Remove paragraph from images
	add_filter('the_content', 'filter_ptags_on_images');
	function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
?>