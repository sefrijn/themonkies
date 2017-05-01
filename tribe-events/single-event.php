<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<header class="row" style="<?php if ( has_post_thumbnail() ) { ?>
	<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
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
	<h3><?php _e('evenement', 'themonkies') ?></h3>
	<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
	<h2>
		<?php echo tribe_get_start_date($post, false ); ?><br>
		<?php _e('om', 'themonkies') ?> <?php echo tribe_get_start_date($post, false, $format = 'G:i' ); ?>
	</h2>
	<?php // echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
</header>


<div id="tribe-events-content" class="tribe-events-single">

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
			<div class="col-md-4">
				<!-- Event meta -->
				<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php tribe_get_template_part( 'modules/meta' ); ?>
				<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div> <!-- #post-x -->

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="col-md-7 tribe-events-content">
				<h2><?php _e('Beschrijving', 'themonkies') ?></h2>
				<?php the_content(); ?>
				<!-- .tribe-events-single-event-description -->
				<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
			</div>
		</div>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer" class="row">
		<!-- Navigation -->
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
