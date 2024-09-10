<?php
/**
 * Shipping Fees Menu Page
 *
 * @since 1.1.0
 */

defined( 'ABSPATH' ) || exit;

use \Themepaste\ShippingManager\Constants;
use \Themepaste\ShippingManager\Models\ShippingFeesSettings;

?>

<form class="tsm-admin-settings-form" method="POST">
	<?php tps_manager_admin_nonce_field(); ?>
	<?php if ( tps_manager_is_pro_plugin_active() ): ?>
	<div class="input-wrapper checkbox">
		<label for="<?php echo esc_attr( ShippingFeesSettings::ENABLE_PROCESSING_FEES ); ?>"><?php esc_html_e( 'Add Processing Fee', 'tps-manager' ); ?></label>
		<input
      id="<?php echo esc_attr( ShippingFeesSettings::ENABLE_PROCESSING_FEES ); ?>"
      name="<?php echo esc_attr( ShippingFeesSettings::ENABLE_PROCESSING_FEES ); ?>"
      value="<?php echo esc_attr( Constants::YES ); ?>"
      type="checkbox"
      <?php tps_manager_is_checked( $data[ ShippingFeesSettings::ENABLE_PROCESSING_FEES ] );?>
    >
		<div class="help-tip"><?php esc_html_e( 'Adds a flat processing fee to process the shipment.', 'tps-manager' ); ?></div>
	</div>

	<div class="input-wrapper amount">
		<label for="<?php echo esc_attr( ShippingFeesSettings::PROCESSING_FEES_AMOUNT ); ?>"><?php esc_html_e( 'Amount', 'tps-manager' ); ?></label>
		<input
      id="<?php echo esc_attr( ShippingFeesSettings::PROCESSING_FEES_AMOUNT ); ?>"
      name="<?php echo esc_attr( ShippingFeesSettings::PROCESSING_FEES_AMOUNT ); ?>"
      type="text"
      value="<?php echo esc_attr( $data[ ShippingFeesSettings::PROCESSING_FEES_AMOUNT ] ); ?>"
    >
		<div class="help-tip"><?php esc_html_e( 'Processing fee amount.', 'tps-manager' ); ?></div>
	</div>

	  <?php
      $shipping_classes = WC()->shipping()->get_shipping_classes();
      if ( ! empty( $shipping_classes ) ):
    ?>
    <div class="input-wrapper amount">
      <label for="<?php echo esc_attr( ShippingFeesSettings::SHIPPING_CLASS ); ?>"><?php esc_html_e( 'Shipping Classes', 'tps-manager' ); ?></label>
      <select name="<?php echo esc_attr( ShippingFeesSettings::SHIPPING_CLASS ); ?>" id="<?php echo esc_attr( ShippingFeesSettings::SHIPPING_CLASS ); ?>">
        <option value="">Select One</option>
        <?php foreach( $shipping_classes as $shipping_class ): ?>
        <option <?php if ( $shipping_class->term_id == ( (int) $data[ ShippingFeesSettings::SHIPPING_CLASS ] ) ) echo "selected" ?> value="<?php echo esc_attr( $shipping_class->term_id ); ?>"><?php echo esc_html( $shipping_class->name ); ?></option>
        <?php endforeach; ?>
      </select>
      <div class="help-tip"><?php esc_html_e( 'Select exact shipping class to be applied.', 'tps-manager' ); ?></div>
    </div>
    <?php endif; ?>


	  <?php
      $shipping_zones = WC_Shipping_Zones::get_zones();
      if ( ! empty( $shipping_zones ) ):
    ?>
    <div class="input-wrapper amount">
      <label for="<?php echo esc_attr( ShippingFeesSettings::SHIPPING_ZONES ); ?>"><?php esc_html_e( 'Shipping Zones', 'tps-manager' ); ?></label>
      <select name="<?php echo esc_attr( ShippingFeesSettings::SHIPPING_ZONES ); ?>" id="<?php echo esc_attr( ShippingFeesSettings::SHIPPING_ZONES ); ?>">
        <option value="">Select One</option>
        <?php foreach( $shipping_zones as $shipping_zone ): ?>
        <option <?php if ( $shipping_zone['zone_id'] == ( (int) $data[ ShippingFeesSettings::SHIPPING_ZONES ] ) ) echo "selected" ?> value="<?php echo esc_attr( $shipping_zone['zone_id'] ); ?>"><?php echo esc_html( $shipping_zone['zone_name'] ); ?></option>
        <?php endforeach; ?>
      </select>
      <div class="help-tip"><?php esc_html_e( 'Select exact shipping zone to be applied.', 'tps-manager' ); ?></div>
    </div>
	  <?php endif; ?>

  <?php endif; ?>
  <?php tps_manager_template_parts( 'admin/pages/shipping-fees/weight-settings' ); ?>
  <div class="input-wrapper submit">
    <button class="woocommerce-save-button components-button is-primary" value="free-shipping"><?php esc_html_e( 'Save', 'tps-manager' ); ?></button>
  </div>
</form>