<?php
/**
 * @package Sefrijn
 */

	get_header('pages');
?>
<div id="page">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<header style="<?php if ( has_post_thumbnail() ) { ?>
					<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
					if ($post_image_id) {
						$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					}
					echo 'background:-webkit-linear-gradient(top, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(\''.$thumbnail.'\') no-repeat center center;';
					echo 'background:-moz-linear-gradient(top, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(\''.$thumbnail.'\') no-repeat center center;';
					echo 'background:-ms-linear-gradient(top, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(\''.$thumbnail.'\') no-repeat center center;';
					echo 'background:-o-linear-gradient(top, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(\''.$thumbnail.'\') no-repeat center center;';
					echo 'background:linear-gradient(top, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(\''.$thumbnail.'\') no-repeat center center;';
					echo 'background-size:cover;'; 
					?>
					<?php } ?>
				">
				<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
				<p class="subtitle"><?php $meta_values = get_post_meta( get_the_ID(), 'subtitle', true ); 
				_e($meta_values); ?></p>
				<a href="#" class="scroll_down"><img class="round" src="<?php echo get_template_directory_uri() ?>/img/arrow_down.png" alt=""></a>
			</header>
			<?php } else { ?>
			<section class="spacer"></section>
			<?php } ?>


			<section class="wrapper">
				<div class="container">
					<?php the_content(); ?>
				</div>
			</section>
		<?php endwhile; ?>
	<?php else : ?>
		<h6 class="center">Not Found</h6>
	<?php endif; ?>
</div>
<?php get_footer() ?>