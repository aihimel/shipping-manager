<?php
namespace Themepaste\ShippingManager\Admin\Form;

use Themepaste\ShippingManager\Admin\Messages;
use Themepaste\ShippingManager\Models\ShippingFeesSettings;

defined( 'ABSPATH' ) || exit;

/**
 * Manages shipping fees form submission
 *
 * @since TSM_SINCE
 */
class ShippingFees implements Process {

	use Parser;

	public function process() {
		$allowed_fields = ( new ShippingFeesSettings() )->get_fields();
		$parsed_data = $this->parse_post_data( $allowed_fields );
		$parsed_data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ] = $this->sanitize_weight_range_data( $parsed_data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ] );
		$status = ( new ShippingFeesSettings() )->set( $parsed_data )->save();
		if ( $status ) {
			tsm_admin_message( __( 'Saved successfully.', 'shipping-manager' ), Messages::TYPES[2] );
		}
	}

	/**
	 * Sanitizes weight range data
	 *
	 * @since TSM_SINCE
	 *
	 * @param array $range_data
	 *
	 * @return array
	 */
	protected function sanitize_weight_range_data( array $range_data ): array {
		$rows = count( $range_data );
		for( $I = 0; $I < $rows ; $I++ ) {
			$range_data[ $I ][ ShippingFeesSettings::WEIGHT_FROM ] = sanitize_text_field( $range_data[ $I ][ ShippingFeesSettings::WEIGHT_FROM ] );
			$range_data[ $I ][ ShippingFeesSettings::WEIGHT_TO ] = sanitize_text_field( $range_data[ $I ][ ShippingFeesSettings::WEIGHT_TO ] );
			$range_data[ $I ][ ShippingFeesSettings::WEIGHT_RANGE_FEE ] = sanitize_text_field( $range_data[ $I ][ ShippingFeesSettings::WEIGHT_RANGE_FEE ] );
		}
		return $range_data;
	}
}
