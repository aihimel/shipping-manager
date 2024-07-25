<?php
use \Themepaste\ShippingManager\Constants;
use \Themepaste\ShippingManager\Models\ShippingFeesSettings;

function tsm_get_weight_range_id( int $serial, string $name ): string {
	return ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES . '_' . $serial . '_' . $name;
}

function tsm_get_weight_range_name( int $serial, string $name ): string {
	return ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES . '[' . $serial . ']' . '[' . $name . ']';
}

function tsm_get_weight_range_value( int $serial, string $name ): string {
	return $data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ][ $serial ][ $name ];
}

?>
<div class="input-wrapper checkbox">
	<label for="<?php echo esc_attr( ShippingFeesSettings::ENABLE_WEIGHT_BASED_FEES ); ?>"><?php esc_html_e( 'Weight Based Fee', 'shipping-manager' ); ?></label>
	<input
		id="<?php echo esc_attr( ShippingFeesSettings::ENABLE_WEIGHT_BASED_FEES ); ?>"
		name="<?php echo esc_attr( ShippingFeesSettings::ENABLE_WEIGHT_BASED_FEES ); ?>"
		value="<?php echo esc_attr( Constants::YES ); ?>"
		type="checkbox"
		<?php tsm_is_checked( $data[ ShippingFeesSettings::ENABLE_WEIGHT_BASED_FEES ] ); ?>
	>
	<div class="help-tip"><?php esc_html_e( 'Adds weight based fee for product.', 'shipping-manager' ); ?></div>
</div>
<div class="input-wrapper radio">
	<div class="single-radio-option">
		<input
			type="radio"
			value="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_PER_UNIT ); ?>"
			name="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_BASED_SHIPPING_FEES_TYPE ); ?>"
			<?php tsm_is_checked( $data[ ShippingFeesSettings::WEIGHT_BASED_SHIPPING_FEES_TYPE ], true, ShippingFeesSettings::WEIGHT_PER_UNIT ); ?>
		>
		<label for=""><?php esc_html_e( 'Per Unit', 'shipping-manager' ); ?></label>
		<div class="help-tip"><?php esc_html_e( 'Add fees based on per unit', 'shipping-manager' ); ?></div>
	</div>
	<div class="single-radio-option">
		<input
			type="radio"
			value="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_RANGE_UNIT ); ?>"
			name="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_BASED_SHIPPING_FEES_TYPE ); ?>"
			<?php tsm_is_checked( $data[ ShippingFeesSettings::WEIGHT_BASED_SHIPPING_FEES_TYPE ], true, ShippingFeesSettings::WEIGHT_RANGE_UNIT ); ?>
		>
		<label for=""><?php esc_html_e( 'Unit Range', 'shipping-manager' ); ?></label>
		<div class="help-tip"><?php esc_html_e( 'Add fees based on unit range', 'shipping-manager' ); ?></div>
	</div>
</div>
<div class="input-wrapper amount">
	<label for="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_BASED_PER_UNIT_AMOUNT_FEES ); ?>"><?php esc_html_e( 'Weight Flat Fee', 'shipping-manager' ); ?></label>
	<input
		id="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_BASED_PER_UNIT_AMOUNT_FEES ); ?>"
		name="<?php echo esc_attr( ShippingFeesSettings::WEIGHT_BASED_PER_UNIT_AMOUNT_FEES ); ?>"
		type="text"
		value="<?php echo esc_attr( $data[ ShippingFeesSettings::WEIGHT_BASED_PER_UNIT_AMOUNT_FEES ] );?>"
	>
	<div class="help-tip"><?php esc_html_e( 'Fees for per unit weight for product shipping.', 'shipping-manager' ); ?></div>
</div>
<div class="input-wrapper range weight-range-row-wrapper">
	<label for=""><?php esc_html_e( 'Weight Range Fee', 'shipping-manager' ); ?></label>
  <input id="weight-range-row-count-id" type="hidden" value="<?php echo esc_attr( count( $data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ] ) ); ?>">
  <div class="weight-range-row-section-wrapper">
	  <?php foreach( $data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ] as $key => $weight_range_rules ): ?>
      <div class="range-row-wrapper" id="weight-range-row-wrapper-id-<?php esc_attr( $key ); ?>">
        from
        <input
          id="<?php echo esc_attr( tsm_get_weight_range_id( 0, ShippingFeesSettings::WEIGHT_FROM ) ); ?>"
          name="<?php echo esc_attr( tsm_get_weight_range_name( 0, ShippingFeesSettings::WEIGHT_FROM ) ); ?>"
          value="<?php echo esc_attr( $data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ][ $key ][ ShippingFeesSettings::WEIGHT_FROM ] ?? 0 ); ?>"
          type="text"
        >
        to
        <input
          id="<?php echo esc_attr( tsm_get_weight_range_id( 0, ShippingFeesSettings::WEIGHT_TO ) ); ?>"
          name="<?php echo esc_attr( tsm_get_weight_range_name( 0, ShippingFeesSettings::WEIGHT_TO ) ); ?>"
          value="<?php echo esc_attr( $data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ][ $key ][ ShippingFeesSettings::WEIGHT_TO ] ?? 0 ); ?>"
          type="text"
        >
        fee
        <input
          id="<?php echo esc_attr( tsm_get_weight_range_id( 0, ShippingFeesSettings::WEIGHT_RANGE_FEE ) ); ?>"
          name="<?php echo esc_attr( tsm_get_weight_range_name( 0, ShippingFeesSettings::WEIGHT_RANGE_FEE ) ); ?>"
          value="<?php echo esc_attr( $data[ ShippingFeesSettings::WEIGHT_BASED_RANGE_UNIT_RULES ][ $key ][ ShippingFeesSettings::WEIGHT_RANGE_FEE ] ?? 0 ); ?>"
          type="text"
        >
        <div class="remove-row-button">Remove</div>
      </div>
	  <?php endforeach; ?>
  </div>
	<div class="add-new-row-button">
		<div class="add-new-button-text" id="weight-add-new-range-row-button">Add New</div>
	</div>
	<div class="help-tip"><?php esc_html_e( 'Fees for unit range weight for product shipping.', 'shipping-manager' ); ?></div>
</div>