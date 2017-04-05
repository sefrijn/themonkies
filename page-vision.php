<?php
/*
 * Template Name: Vision
 */

	get_header('pages');
?>
<div id="vision" class="wrapper">
	<div id="vision-overview" class="container">
		<h2 class="page-title">onze visie</h2>
		<div class="vision-introduction row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="vision-elements-wrapper row">
			<?php
				// Get the Vision child pages
				$page_ID = get_ID_by_slug('visie');
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'ASC',
				  'orderby' => 'menu_order'
				  );
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<a class="vision-element col-md-4 col-sm-4 item-style-1" href="<?php echo '#'.$post->post_name; ?>">
							<div class="item-image-content vertical-center-wrapper">
								<div class="vertical-center">
						  			<h2><?php the_title(); ?></h2>	
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
						<?php 
					endwhile;
				}
			?>
		</div>
	</div>
	<?php 
		if( $my_query->have_posts() ) {
			while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<div class="vision-detail container">
					<a class="anchor" id="<?php echo $post->post_name; ?>"></a>
						<h1><?php the_title(); ?></h1>
						<div class="row image">
							<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2" style="
								<?php if ( has_post_thumbnail($page->ID) ) { ?>
									<?php $post_image_id = get_post_thumbnail_id($page->ID);
									if ($post_image_id) {
										$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
										if ($thumbnail) (string)$thumbnail = $thumbnail[0];
									}
									echo 'background:url(\''.$thumbnail.'\') no-repeat center center;';
									echo 'background-size:cover;'; 
									 ?>
									<?php } ?>
								">
							</div>
						</div>
						<div class="row">
							<div class="first-section col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
								<?php the_content(''); ?>
							</div>
							<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
								<?php 
									$content = $post->post_content;
									$content = apply_filters('the_content', $content);
									$cont = get_extended($content);
									echo $cont['extended'];
								?>
							</div>
						</div>
				</div>
				<?php 
			endwhile;
		}
	?>
</div>



<?php get_footer() ?>