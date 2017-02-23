<?php
/**
 * @package Sefrijn
 * Template Name: Monkies
 */

	get_header('pages');
?>
<div id="monkies" class="wrapper">
	<div class="container">
	<h2>meet the people</h2>
		<div class="row">
			<?php 
			$counter = 0;
			$page_ID = get_ID_by_slug('Monkies');
			$childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='.$page_ID);
			if($childpages){ /* display the children content  */
	  		foreach ($childpages as $post) :
	  			setup_postdata($post); ?>
	  				<?php $counter++; ?>
					<?php $website = get_post_meta(get_the_ID(), 'website', true ); ?>
					<div class="col-md-4 monkie-item">
						<?php if ( ! empty( $website ) ) { ?>
							<a class="monkie-image" href="http://<?php echo $website; ?>">
						<?php }else{ ?>
							<div class="monkie-image" href="http://<?php echo $website; ?>">
						<?php } ?>
					  			<?php if ( has_post_thumbnail() ) { ?>
					  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
								<?php } ?>
					  			<h3><?php the_title(); ?><span class="dashicons dashicons-external"></span></h3>
						<?php if ( ! empty( $website ) ) { ?>
							</a>
						<?php }else{ ?>
							</div>
						<?php } ?>					  			
			  			<p class="intro"><?php the_content(); ?></p>
					</div>

					<?php if($counter % 3 == 0){
						echo '</div><div class="row">';
					} ?>
	  		<?php endforeach;
			} 
			?>
		</div>
	</div>
<?php get_footer() ?>