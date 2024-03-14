<?php
/**
 * Calendar widget module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Define Jet_Engine_Calendar_Query class
 */
class Jet_Engine_Calendar_Query {

	public function __construct() {
		add_filter( 'jet-engine/listing/calendar/query', array( $this, 'prepare_calendar_args' ), 10, 3 );
		add_filter( 'jet-engine/listing/calendar/date-key', array( $this, 'prepare_item_date_key' ), 0, 4 );
	}

	/**
	 * Try to return calendar date key for any item
	 */
	public function prepare_item_date_key( $key, $item, $group_by, $render ) {
		
		switch ( $group_by ) {
			
			case 'item_date':
				$key = strtotime( jet_engine()->listings->data->get_object_date( $item ) );
				break;

		}

		return $key;
	}

	public function prepare_calendar_args( $args, $group_by, $render ) {

		$settings = $render->get_settings();
		$group_by = $settings['group_by'];
		$meta_key = false;

		if ( ! empty( $settings['custom_start_from'] ) ) {
			$render->start_from = ! empty( $settings['start_from_month'] ) ? $settings['start_from_month'] : date_i18n( 'F' );
			$render->start_from .= ' ';
			$render->start_from .= ! empty( $settings['start_from_year'] ) ? $settings['start_from_year'] : date_i18n( 'Y' );
		}

		$date_values = $render->get_date_period_for_query( $settings );

		if ( $render->query_instance ) {
			$args = $render->query_instance->add_date_range_args( $args, $date_values, $settings );
		} else {
			/**
			 * For compatibility with old queries
			 */
			if ( ! class_exists( 'Jet_Engine\Query_Builder\Queries\Posts_Query' ) ) {
				Jet_Engine\Query_Builder\Manager::instance()->include_factory();
				Jet_Engine\Query_Builder\Query_Factory::ensure_queries();
			}

			$posts_query = new Jet_Engine\Query_Builder\Queries\Posts_Query();
			$args        = $posts_query->add_date_range_args( $args, $date_values, $settings );
		}

		return $args;

	}

}