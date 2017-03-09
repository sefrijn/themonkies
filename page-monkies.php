<?php
/*
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
					<div class="col-md-3 monkie-item">
						<?php if ( ! empty( $website ) ) { ?>
							<a class="monkie-image" href="http://<?php echo $website; ?>">
						<?php }else{ ?>
							<div class="monkie-image" href="http://<?php echo $website; ?>">
						<?php } ?>
					  			<?php if ( has_post_thumbnail() ) { ?>
					  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
								<?php } ?>
					  			<h3><?php the_title(); ?></h3>
						<?php if ( ! empty( $website ) ) { ?>
								<span class="dashicons dashicons-external"></span>
							</a>
						<?php }else{ ?>
							</div>
						<?php } ?>					  			
			  			<p class="intro"><?php the_excerpt(20); ?></p>
						<?php if ( ! empty( $website ) ) { ?>
							<a class="monkie-image" href="http://<?php echo $website; ?>"><?php echo $website; ?></a>
						<?php } ?>			  			
					</div>

					<?php if($counter % 4 == 0){
						echo '</div><div class="row">';
					} ?>
	  		<?php endforeach;
			} 
			?>
		</div>
	</div>
<?php get_footer() ?>