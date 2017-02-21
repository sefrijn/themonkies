<?php
/**
 * @package Sefrijn
 */

	get_header();
?>

<div id="home">
	<div class="vision clearfix">
	<h1>what do we do?</h1>
			<?php 
				$page_ID = get_ID_by_slug('Vision');
				$childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='.$page_ID);
				if($childpages){ /* display the children content  */
		  		foreach ($childpages as $post) :
		  			setup_postdata($post); ?>
						<a class="vision-element item-style-1" href="<?php echo get_home_url().'/vision#'.$post->post_name; ?>">
							<div class="item-image-content vertical-center-wrapper">
								<div class="vertical-center">
						  			<h2><?php the_title(); ?></h2>	
						  			<p class="subtitle"><?php echo get_post_field( 'subtitle', get_the_ID(), true) ?></p>
								</div>
							</div>
							<div class="item-image-wrapper">
								<div class="item-image-blur" style="
									<?php if ( has_post_thumbnail($page->ID) ) { ?>
										<?php $post_image_id = get_post_thumbnail_id($page->ID);
										if ($post_image_id) {
											$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
											if ($thumbnail) (string)$thumbnail = $thumbnail[0];
										}
										echo 'background:url(\''.$thumbnail.'\') no-repeat center center;background-size:cover;'; ?>
										<?php } ?>
									">
								</div>
								<div class="item-image" style="
									<?php if ( has_post_thumbnail($page->ID) ) { ?>
										<?php $post_image_id = get_post_thumbnail_id($page->ID);
										if ($post_image_id) {
											$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
											if ($thumbnail) (string)$thumbnail = $thumbnail[0];
										}
										echo 'background:url(\''.$thumbnail.'\') no-repeat center center;background-size:cover;'; ?>
										<?php } ?>
									">
								</div>
							</div>
						</a>
		  		<?php endforeach;
				} 
			?>
	</div>
	<div class="container vision-read-more">
		<a href="#">Read more about our vision</a>
	</div>
	<div class="row" id="recent">
		<div class="col-md-6 events">
			<h1>events</h1>
			<?php dynamic_sidebar( 'events_widget' ); ?>
		</div>
		<div class="col-md-6 blog">
			<h1>blog</h1>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
			<?php endwhile; ?>			
		</div>
	</div>
	<div class="row" id="monkies">
		<h1>meet the monkies</h1>
		<?php
			$args=array(
			  'post_type' => 'page',
			  'post_status' => 'publish',
			  'post_parent' => 15,
			  'posts_per_page' => 5,
			  'order' => 'ASC'
			  );
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) { ?>
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<a href="<?php echo get_the_permalink(); ?>" class="col-md-2 monkie">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('news-thumb');
						} ?>			
						<div class="content">
							<h2><?php the_title(); ?></h2>
							<p><?php echo excerpt(20); ?></p>
						</div>
					</a>
					<?php
				endwhile; ?>
				<?php
			}else{
				echo "no content";
			}
		?>


		<div class="col-md-2">
			<img src="<?php echo get_template_directory_uri(); ?>/img/more_monkies_small.jpg" alt="">
			<h2>And more!</h2>
		</div>
	</div>

	<div class="container" id="location">
		<h1>come and visit us</h1>
		<p>The Monkies have a beautiful place in the city centre of Schiedam. One of their main locations for their events, with a beautiful meditation room.</p>
		<a href="#">Read More</a>
	</div>
</div>
<?php get_footer() ?>