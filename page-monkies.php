<?php
/*
 * Template Name: Monkies
 */

	get_header('pages');
?>
<div id="monkies" class="wrapper">
	<div class="container">
	<h2 class="page-title">dit zijn de monkies</h2>
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
					<div class="col-md-3 col-sm-3 col-xs-6 monkie-item">
						<a class="monkie-image" href="<?php echo get_the_permalink(); ?>">
				  			<?php if ( has_post_thumbnail() ) { ?>
				  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
							<?php } ?>
							<div class="title">
				  				<h3><?php the_title(); ?></h3>
				  				<p class="location">&nbsp;<?php echo get_post_meta(get_the_ID(), 'location', true );?></p>
				  			</div>
						</a>
			  			<p class="intro"><?php echo excerpt(15); ?></p>
						<?php if ( ! empty( $website ) ) { ?>
							<a class="intro" href="http://<?php echo $website; ?>"><?php echo $website; ?></a>
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