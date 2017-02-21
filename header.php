<?php 
/**
 * @package Sefrijn
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Cosmic Circle is a platform for creation, art, play, exploration and ceremony.">
	<meta name="og:description" content="Cosmic Circle is a platform for creation, art, play, exploration and ceremony. ">
	<meta name="og:site_name" content="Cosmic Circle">
	<meta name="og:title" content="Cosmic Circle">
	<meta name="keywords" content="Healing,Art,Technology,Spirituality">
	<meta name="author" content="Sefrijn and Yashael">
	<!-- <meta property="og:image" content="http://www.sefrijn.nl/wp-content/uploads/2015/02/IMG_0782-1024x472.jpg" /> -->
	<title>Cosmic Circle - Connecting out there with down here</title>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/type.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
	<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/img/sefrijn_square.png" />

	<!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-11737642-6', 'auto');
	  ga('send', 'pageview');

	</script>

	<?php 
	  if ( is_admin_bar_showing() ) echo '<style>.navigation{top:188px !important;} .fixed{top:32px !important;}</style>'; 
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
	<div id="site_title">
		<div class="container">
			<a href="<?php echo get_site_url(); ?>">Cosmic Circle</a>
			<p class="intro">expanding human consciousness through circles</p>
		</div>
	</div>
