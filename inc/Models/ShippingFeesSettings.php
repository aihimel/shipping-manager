<?php
namespace Themepaste\ShippingManager\Models;

use Themepaste\ShippingManager\Constants;

defined( 'ABSPATH' ) || exit;

/**
 * Datasource for free shipping
 *
 * @since TSM_SINCE
 */
class ShippingFeesSettings extends Model {
	/**
	 * List of keys
	 *
	 * @since TSM_SINCE
	 */
	const ENABLE_PROCESSING_FEES = 'enable-processing-fees';
	const PROCESSING_FEES_AMOUNT = 'processing-fees-amount';
	const ENABLE_WEIGHT_BASED_FEES = 'enable-weight-based-fees';
	const WEIGHT_BASED_SHIPPING_FEES_TYPE = 'weight-based-shipping-fees-type'; // value: per-unit, unit-range
	const WEIGHT_BASED_PER_UNIT_AMOUNT_FEES = 'weight-based-per-unit-amount-fees';
	const WEIGHT_BASED_RANGE_UNIT_RULES = 'weight-based-range-unit-rules';
	const WEIGHT_PER_UNIT = 'weight-per-unit';
	const WEIGHT_RANGE_UNIT = 'weight-range-unit';

	/**
	 * Declaring default settings
	 *
	 * @since TSM_SINCE
	 *
	 * @var array
	 */
	protected array $settings = [
		self::ENABLE_PROCESSING_FEES => Constants::NO,
		self::PROCESSING_FEES_AMOUNT => 0.00,
		self::ENABLE_WEIGHT_BASED_FEES => Constants::NO,
		self::WEIGHT_BASED_SHIPPING_FEES_TYPE => self::WEIGHT_PER_UNIT,
		self::WEIGHT_BASED_PER_UNIT_AMOUNT_FEES => 0.00,
		self::WEIGHT_BASED_RANGE_UNIT_RULES => [],
	];

	/**
	 * Initializing option keys
	 *
	 * @since TSM_SINCE
	 */
	public function __construct() {
		parent::__construct( 'tsm_shipping_fees' );
	}
}