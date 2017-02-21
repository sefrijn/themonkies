<?php
/**
 * @package Sefrijn
 * Template Name: Youtube
 */

	get_header('pages');
?>
<div id="page">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<header style="position:relative;overflow:hidden;background-color:rgba(0,0,0,0.5);">
				<div style="position: absolute; top:-25%;left:-25%;z-index: -99; width: 150%; height: 150%">
<!-- <iframe style="width:100%;height:100%;" src="https://player.vimeo.com/video/141542272?autoplay=1&loop=1&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>	 -->

<iframe frameborder="0" height="100%" width="100%" src="https://www.youtube.com/embed/<?php $meta_values = get_post_meta( get_the_ID(), 'youtube', true ); 
				_e($meta_values); ?>?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;autohide=1">
				  </iframe>
<!-- https://www.youtube.com/embed/CkHl1GbVDDw?rel=0&amp;controls=0&amp;showinfo=0 -->
<!-- 				  <iframe frameborder="0" height="100%" width="100%" 
				    src="https://youtube.com/embed/ID?autoplay=1&controls=0&showinfo=0&autohide=1">
				  </iframe>
 -->				</div>
				<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
				<p class="subtitle"><?php $meta_values = get_post_meta( get_the_ID(), 'subtitle', true ); 
				_e($meta_values); ?></p>
				<a href="#" class="scroll_down"><img class="round" src="<?php echo get_template_directory_uri() ?>/img/arrow_down.png" alt=""></a>
			</header>

			<?php 
				$parent_title = get_the_title($post->post_parent);
				$projects = 0;
				if($parent_title == 'Projects'){
					$projects = 1;
				}
			?>
			<script>
				$( document ).ready(function() {
					var parent = <?php echo $projects;?>;
					if(parent == 1){
						$('.navigation ul li:first-of-type').addClass('current-menu-item');
					}
				});
			</script>
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