<?php get_header(); ?>

<?php if(function_exists("pll_get_post")){
	if(pll_current_language() == 'en'){ ?>

	<div class="alert alert-warning alert-dismissible container" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Under Construction!</strong><br>Our English part of the site is still very much under construction. Some events are missing, some text is incomplete.
	</div>
	<?php } ?>
<?php } ?>

<div id="home" class="wrapper">


<!-- VISION -->
	<div id="vision" class="container">
		<h1><?php _e('onze thema&apos;s', 'themonkies') ?></h1>
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
				$post_parent = get_post($page_ID); 
				$slug = $post_parent->post_name;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<a class="vision-element col-lg-4 col-md-4 col-sm-4 item-style-1" href="<?php echo get_home_url().'/'.$slug.'#'.$post->post_name; ?>">
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
						<?php 
					endwhile;
				}
			?>
		</div>
		<div class="vision-read-more">
			<a href="<?php echo get_the_permalink(pll_get_post($page_ID)); ?>"><?php _e('Lees meer over onze visie', 'themonkies') ?></a>
		</div>	
	</div>

<!-- ACTIVITIES -->
	<div id="activities" class="container">
		<h1><?php _e('wat doen we?', 'themonkies') ?></h1>
		<div class="activities-elements-wrapper row">
			<?php
				// Get the activities child pages
				$page_ID = get_ID_by_slug('activiteiten');
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'ASC',
				  'orderby' => 'menu_order',
				  'posts_per_page' => '4'
				  );
				$post_parent = get_post($page_ID); 
				$slug = $post_parent->post_name;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<a class="activities-element col-lg-3 col-md-3 col-sm-4 col-xs-6 item-style-1" href="<?php echo get_the_permalink(); ?>">
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
						<?php 
					endwhile;
				}
			?>
		</div>
		<div class="activities-read-more">
			<a href="<?php echo get_the_permalink(pll_get_post($page_ID)); ?>"><?php _e('Bekijk wat wij doen', 'themonkies') ?></a>
		</div>	
	</div>



	<div class="container" id="events-blog">
		<div class="row">

<!-- EVENTS -->

			<div id="events" class="col-md-6">
				<h1><?php _e('agenda', 'themonkies') ?></h1>
				<?php dynamic_sidebar( 'events_widget' ); ?>
			</div>

<!-- BLOG -->

			<div id="blog" class="col-md-6">
				<h1><?php _e('blog', 'themonkies') ?></h1>
				<?php
					// Get the blogs
					$args=array(
					  'post_type' => 'post',
					  'post_status' => 'publish',
					  'posts_per_page' => 3,
					  'order' => 'DESC'
					  );
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
						while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
							<a href="<?php echo get_the_permalink(); ?>" class="item clearfix">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('news-thumb');
								} ?>
								<p class="date"><?php echo get_the_date('j F'); ?></p>				
								<h2><?php the_title(); ?></h2>
								<p class="excerpt"><?php echo excerpt(25); ?></p>
							</a>
							<?php 
						endwhile;
					}
				?>
				<a href="<?php echo get_the_permalink(pll_get_post(get_ID_by_slug("blog"))); ?>" class="button"><?php _e('Bekijk Alles', 'themonkies') ?></a>		
			</div>
		</div>
	</div>

<!-- MONKIES -->

	<div id="monkies" class="container">
		<div class="row">
			<h1><?php _e("onze lieve monkies"); ?></h1>
			<?php
				// Get the monkie child pages
				$page_ID = get_ID_by_slug('monkies');			
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'posts_per_page' => 5,
				  'orderby' => 'menu_order',				  
				  'order' => 'DESC'
				  );
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<a href="<?php echo get_the_permalink(); ?>" class="col-md-2 col-sm-4 col-xs-6 monkie">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('news-thumb');
							} ?>			
							<div class="content">
								<h2><?php the_title(); ?></h2>
							</div>
						</a>
						<?php
					endwhile;
				}else{
					echo "Oh my gawd!! No Monkies were found in the database!";
				}
			?>
			<a class="col-md-2 col-sm-4 col-xs-6 monkie" href="<?php echo get_the_permalink(pll_get_post(get_ID_by_slug('monkies'))); ?>">
				<img class="attachment-news-thumb" src="<?php echo get_template_directory_uri(); ?>/img/more_monkies_small.jpg" alt="">
				<h2>En meer!</h2>
			</a>
		</div>
	</div>


<!-- LOCATION -->

	<div id="location" class="container">
		<h1><?php echo __("bezoek ons!") ?></h1>
		<p><?php _e('The Monkies kan je vinden op verschillende locaties. Onze hoofdlocatie zit op dit moment in Schiedam, waar we mooie activtietein organiseren in een prachtig pand.', 'themonkies') ?></p>
		<a href="<?php echo get_the_permalink(pll_get_post(get_ID_by_slug('locaties'))); ?>"><?php _e('Lees meer', 'themonkies') ?></a>
	</div>
</div>
<?php get_footer() ?>