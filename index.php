<?php
/**
 * @package Sefrijn
 */

	get_header();
?>

<div id="home">
	<div class="grid">
			<?php 
				$page_ID = get_ID_by_slug('Circles');
				$childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='.$page_ID);
				if($childpages){ /* display the children content  */
		  		foreach ($childpages as $post) :
		  			setup_postdata($post); ?>
						<a class="post" href="<?php the_permalink(); ?>">
			  			<?php if ( has_post_thumbnail() ) { ?>
			  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
							<?php } ?>		
			  			<h3><?php the_title(); ?></h3>
			  			<p class="subtitle"><?php echo get_post_field( 'subtitle', get_the_ID(), true) ?></p>
						</a>
		  		<?php endforeach;
				} 
			?>
	</div>
</div>
<?php get_footer() ?>