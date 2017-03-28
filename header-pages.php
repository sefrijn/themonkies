<?php 
	// Get all dynamic metadata and store in variables
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
				$myImage = "http://www.sefrijn.nl/wp-content/uploads/2015/02/IMG_0782-1024x472.jpg"; #TODO
			}
		endwhile;
	endif;
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="<?php echo $myExcerpt; ?>">
	<meta name="og:description" content="<?php echo $myExcerpt; ?>">
	<meta property="og:image" content="<?php echo $myImage; ?>" />	
	<title><?php echo $myTitle; ?> | The Monkies</title>
	<?php include('includes/header-include.php'); ?>
</head>

<body <?php body_class(); ?>>
<?php include('includes/navigation.php'); ?>
<?php include('includes/header-tag.php'); ?>
