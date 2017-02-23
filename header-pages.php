<?php 
/**
 * @package Sefrijn
 */

?>

<!DOCTYPE html>
<html>
<head>
<?php 
	if (have_posts()) :
		while (have_posts()) : the_post();
			$myExcerpt = get_the_excerpt();
			$tags = array("<p>", "</p>");
			$myExcerpt = str_replace($tags, "", $myExcerpt);
			$myTitle = get_the_title();
			if ( has_post_thumbnail() ) {
				$post_image_id = get_post_thumbnail_id();
				if ($post_image_id) {
					$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
					if ($thumbnail) (string)$thumbnail = $thumbnail[0];
				}
				$myImage = $thumbnail;				
			}else{
				$myImage = "http://www.sefrijn.nl/wp-content/uploads/2015/02/IMG_0782-1024x472.jpg";
			}
		endwhile;
	endif;
?>

	<meta name="description" content="<?php echo $myExcerpt; ?>">
	<meta name="og:description" content="<?php echo $myExcerpt; ?>">
	<meta name="og:site_name" content="The Monkies">
	<meta name="og:title" content="The Monkies">
	<meta property="og:image" content="<?php echo $myImage; ?>" />	
	<meta name="keywords" content="Meditation,Yoga,Creativity,Community,Connection,Social,Buddhism,Schiedam,Rotterdam">
	<meta name="author" content="Sefrijn">
	<title><?php echo $myTitle; ?> | The Monkies</title>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/type.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Baloo|Open+Sans:300,400,700" rel="stylesheet">
	<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/img/sefrijn_square.png" />

	<?php 
	  if ( is_admin_bar_showing() ) echo '<style>.navigation{top:259px !important;} .fixed{top:32px !important;}</style>'; 
	?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">	
</head>

<body <?php body_class(); ?>>

	<!-- Navigation -->
	<div class="navigation">
		<?php wp_nav_menu(); ?>
	</div>
	<header>
		<div class="container">
			<a href="<?php echo get_site_url(); ?>">The Monkies</a>
			<p>Creating a nice life on planet earth together.</p>
		</div>
	</header>