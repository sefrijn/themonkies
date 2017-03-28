<?php
/*
 * Template Name: Monkie Single
 */

	get_header('pages');
?>
<div id="page" class="monkie-single">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-9 col-xs-offset-1">
							<header style="<?php if ( has_post_thumbnail() ) { ?>
									<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
									if ($post_image_id) {
										$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
										if ($thumbnail) (string)$thumbnail = $thumbnail[0];
									}
									echo 'background:url(\''.$thumbnail.'\') no-repeat center center;';
									echo 'background-size:cover;'; 
									?>
									<?php } ?>
								">
							</header>				
						</div>
					</div>
				<?php } ?>			
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-xs-9 col-xs-offset-1">
						<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php $website = get_post_meta(get_the_ID(), 'website', true ); ?>
						<a class="website" href="http://<?php echo $website; ?>"><?php echo $website; ?></a>
					</div>			
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<h6 class="center">Not Found</h6>
		<?php endif; ?>		
	</div>
</div>
<?php get_footer() ?>