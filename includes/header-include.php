<meta name="og:site_name" content="The Monkies">
<meta name="og:title" content="The Monkies">
<meta name="author" content="How About Yes">
<meta name="keywords" content="Meditation,Yoga,Creativity,Community,Connection,Social,Buddhism,Schiedam,Rotterdam">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/type.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	

<link href="https://fonts.googleapis.com/css?family=Baloo|Open+Sans:300,400,700" rel="stylesheet">

<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/img/header.jpg" />

<?php 
  if ( is_admin_bar_showing() ) echo '
  	<style>
		@media screen and (min-width: 601px){
			.navigation{
				top:273px !important;
			}
			.fixed{
				top:46px !important;
			}
		}
		@media screen and (min-width: 783px){
			.navigation{
				top:259px !important;
			}
			.fixed{
				top:32px !important;
			}
		}
	</style>'; 
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">	