<?php 
/**
 * @package Sefrijn
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="A community that wants to make life on planet earth nice.">
	<meta name="og:description" content="A community that wants to make life on planet earth nice.">
	<meta name="og:site_name" content="The Monkies">
	<meta name="og:title" content="The Monkies">
	<meta name="keywords" content="Meditation,Yoga,Creativity,Community,Connection,Social,Buddhism,Schiedam,Rotterdam">
	<meta name="author" content="Sefrijn">
	<title>The Monkies</title>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/type.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Baloo|Open+Sans:300,400,700" rel="stylesheet">
	<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/img/sefrijn_square.png" />

	<?php 
	  if ( is_admin_bar_showing() ) echo '<style>.navigation{top:259px !important;} .fixed{top:32px !important;}</style>'; 
	?>
	<style>
	</style>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">	
</head>

<body>


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
