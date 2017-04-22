<!-- INSTAGRAM -->
	<div id="instagram" class="container">
		<div class="row">
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</div>


<!-- EVENTS SMALL -->
<?php // Retrieve the next 3 upcoming events
$events = tribe_get_events( array(
    'posts_per_page' => 3,
) );
if(count($events) != 0){ ?>
	<div id="event-mini" class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<!-- <h3>agenda</h3> -->
				<?php if(function_exists("pll_get_post")){ ?>
						<a href="<?php echo pll_home_url($slug)."events"; ?>"><h3><?php _e('agenda', 'themonkies') ?></h3></a>
				<?php }?>
			</div>
			<?php foreach ( $events as $post ) { ?>
			<div class="col-md-3 col-sm-3">
				<?php
		    		setup_postdata( $post );
					echo '<a href="'.get_the_permalink().'"><span>'.tribe_get_start_date( $post ).'</span><br>';
			    	echo $post->post_title.'</a>';
			    ?>
			</div>
			<?php }	?>
		</div>
	</div>
<?php } ?>


<footer>
&copy; The Monkies <?php echo date("Y"); ?> | <span class="dashicons dashicons-email-alt"></span> <a href="mailto:love@themonkies.nl">love@themonkies.nl</a> | <span class="dashicons dashicons-facebook-alt"></span> <a href="http://www.facebook.com/themonkies">Facebook</a> | Site by <a href="http://www.sefrijn.nl/">Sefrijn</a>
</footer>
<?php wp_footer(); ?>
</body>
</html>
