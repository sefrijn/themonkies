<?php
/*
 * Template Name: Blog
 */

	get_header('pages');
?>
<div id="blog" class="wrapper">
	<div class="container">
	<h2>blogs</h2>
		<div class="row">
			<?php 
			$counter = 0;
			$pages = query_posts('post_type=post');
			if($pages){ /* display the children content  */
	  		foreach ($pages as $post) :
	  			setup_postdata($post); ?>
	  				<?php $counter++; ?>
					<a class="col-md-4 blog-item" href="<?php the_permalink(); ?>">
					<div class="blog-image">
			  			<?php if ( has_post_thumbnail() ) { ?>
			  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
						<?php } ?>
						<div class="author">
							<?php echo get_wp_user_avatar(get_the_author_meta('ID'), 'thumbnail'); ?>
							<p class="date"><?php echo get_the_date('M j, Y'); ?></p>
							<p><?php echo get_the_author(); ?></p>
						</div>		  			
					</div>
		  			<h3><?php the_title(); ?></h3>
		  			<p class="intro"><?php echo excerpt(30); ?></p>
					</a>
					<?php if($counter % 3 == 0){
						echo '</div><div class="row">';
					} ?>
	  		<?php endforeach;
			} 
			?>
		</div>
	</div>
<?php get_footer() ?>