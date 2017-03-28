<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
<!-- Event Image -->
<div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-12 event-image">
	<?php echo tribe_event_featured_image( null, 'half-page' ) ?>
	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="date">
		<?php echo tribe_get_start_date($post, false, $format = 'j F' ); ?>
	</a>
</div>

<div class="col-md-4 col-sm-6 col-xs-12 ">
	
	<!-- Event Title -->
	<?php do_action( 'tribe_events_before_the_event_title' ) ?>
	<h2 class="tribe-events-list-event-title">
		<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
			<?php the_title() ?>
		</a>
	</h2>
	<?php do_action( 'tribe_events_after_the_event_title' ) ?>

	<!-- Event Content -->
	<?php do_action( 'tribe_events_before_the_content' ) ?>
	<div class="tribe-events-list-event-description tribe-events-content">
		<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
	</div><!-- .tribe-events-list-event-description -->
	<?php
	do_action( 'tribe_events_after_the_content' ); ?>

	<!-- Event Meta -->
	<?php do_action( 'tribe_events_before_the_meta' ) ?>
	<div class="tribe-events-event-meta">
		<span class="caps">Details</span>
		<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

			<!-- Schedule & Recurrence Details -->
			<div class="tribe-event-schedule-details">
				<?php echo tribe_events_event_schedule_details() ?>
			</div>

			<?php if ( $venue_details ) : ?>
				<!-- Venue Display Info -->
				<div class="tribe-events-venue-details">
					<?php echo implode( ', ', $venue_details ); ?>
					<?php
					if ( tribe_get_map_link() ) {
						echo tribe_get_map_link_html();
					}
					?>
				</div> <!-- .tribe-events-venue-details -->
			<?php endif; ?>

		</div>
	</div><!-- .tribe-events-event-meta -->
	<?php do_action( 'tribe_events_after_the_meta' ) ?>

	<!-- Event Cost -->
	<?php if ( tribe_get_cost() ) : ?>
		<div class="tribe-events-event-cost">
			<span>Price: <?php echo tribe_get_cost( null, true ); ?></span>
		</div>
	<?php endif; ?>

	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="button tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;</a>


</div>