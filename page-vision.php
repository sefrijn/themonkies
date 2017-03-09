<?php
/*
 * Template Name: Vision
 */

	get_header('pages');
?>
<div id="vision" class="wrapper">
	<div id="vision-overview" class="container">
		<h2>what we love</h2>

		<div class="vision-elements-wrapper row">
			<?php 
				$page_ID = get_ID_by_slug('visie');
				$childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='.$page_ID);
				if($childpages){ /* display the children content  */
		  		foreach ($childpages as $post) :
		  			setup_postdata($post); ?>
						<a class="vision-element col-md-3 col-sm-6 item-style-1" href="<?php echo '#'.$post->post_name; ?>">
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
		  		<?php endforeach;
				} 
			?>
		</div>
	</div>
	<?php 
	$page_ID = get_ID_by_slug('visie');
	$childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='.$page_ID);
	if($childpages){ /* display the children content  */
		foreach ($childpages as $post) :
			setup_postdata($post); ?>
		<div class="vision-detail container">
				<a class="anchor" id="<?php echo $post->post_name; ?>"></a>
				<div class="row">
					<div class="col-md-12 first-section" style="
						<?php if ( has_post_thumbnail($page->ID) ) { ?>
							<?php $post_image_id = get_post_thumbnail_id($page->ID);
							if ($post_image_id) {
								$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
								if ($thumbnail) (string)$thumbnail = $thumbnail[0];
							}
							echo 'background:-webkit-linear-gradient(top, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(\''.$thumbnail.'\') no-repeat center center;';
							echo 'background:-moz-linear-gradient(top, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(\''.$thumbnail.'\') no-repeat center center;';
							echo 'background:-ms-linear-gradient(top, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(\''.$thumbnail.'\') no-repeat center center;';
							echo 'background:-o-linear-gradient(top, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(\''.$thumbnail.'\') no-repeat center center;';
							echo 'background:linear-gradient(top, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(\''.$thumbnail.'\') no-repeat center center;';
							echo 'background-size:cover;'; 
							 ?>
							<?php } ?>
						">
						<h1><?php the_title(); ?></h1>
						<?php the_content(''); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<?php 
							$content = $post->post_content;
							$content = apply_filters('the_content', $content);
							$cont = get_extended($content);
							echo $cont['extended'];
						?>
					</div>
				</div>
		</div>
  		<?php endforeach;
	} 
	?>
</div>



<?php get_footer() ?>