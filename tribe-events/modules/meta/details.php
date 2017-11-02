<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */


$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', __( 'Time:', 'the-events-calendar' ), $event_id );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
	<h3 class="tribe-events-single-section-title"> <?php esc_html_e( 'Details', 'the-events-calendar' ) ?> </h3>

		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>

			<strong> <?php esc_html_e( 'Start:', 'the-events-calendar' ) ?> </strong>
			<div class="tribe-events-abbr tribe-events-start-datetime published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </div>

			<strong> <?php esc_html_e( 'End:', 'the-events-calendar' ) ?> </strong>
			<div class="tribe-events-abbr dtend" title="<?php esc_attr_e( $end_ts ) ?>"> <?php esc_html_e( $end_date ) ?> </div>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>

			<strong><?php esc_html_e( 'Date:', 'the-events-calendar' ) ?></strong>
			<div class="tribe-events-abbr tribe-events-start-datetime published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </div>

		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>

			<strong><?php esc_html_e( 'Start:', 'the-events-calendar' ) ?></strong>
			<div class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_datetime ) ?> </div>

			<strong><?php esc_html_e( 'End:', 'the-events-calendar' ) ?></strong>
			<div class="tribe-events-abbr dtend" title="<?php esc_attr_e( $end_ts ) ?>"> <?php esc_html_e( $end_datetime ) ?> </div>

		<?php
		// Single day events
		else :
			?>

			<strong><?php esc_html_e( 'Date:', 'the-events-calendar' ) ?></strong>
			<div class="tribe-events-abbr tribe-events-start-date published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </div>

			<strong><?php echo esc_html( $time_title ); ?> </strong>
			<div class="tribe-events-abbr tribe-events-start-time published dtstart" title="<?php esc_attr_e( $end_ts ) ?>">
				<?php echo $time_formatted; ?>
			</div>

		<?php endif ?>

		<?php
		// Event Cost
		if ( ! empty( $cost ) ) : ?>

			<strong> <?php esc_html_e( 'Cost:', 'the-events-calendar' ) ?> </strong>
			<div class="tribe-events-event-cost"> <?php esc_html_e( $cost ); ?> </div>
		<?php endif ?>

		<?php
		echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<dt>',
				'label_after'  => '</dt>',
				'wrap_before'  => '<dd class="tribe-events-event-categories">',
				'wrap_after'   => '</dd>',
			)
		);
		?>

		<?php echo tribe_meta_event_tags( sprintf( esc_html__( '%s Tags:', 'the-events-calendar' ), tribe_get_event_label_singular() ), ', ', false ) ?>

		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>
			<?php
			$website_url = substr($website, strpos($website, '">')+2);
			$website_url = substr($website_url, 0, strpos($website_url, '</a>'));
			$website_name = $website_url;
			if(strlen($website_name) > 35){
				$website_name = substr($website_url,0,35);
				$website_name = $website_name."...";
			}
			?>
			<strong> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </strong>
			<div class="tribe-events-event-url"> <a href="<?php echo $website_url; ?>"><?php echo $website_name; ?> </a></div>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
</div>
