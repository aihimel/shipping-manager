<?php
/**
 * Product Page Shipping Menu Page
 *
 * @since 1.1.0
 */

defined( 'ABSPATH' ) || exit;

use \Themepaste\ShippingManager\Constants;
use \Themepaste\ShippingManager\Models\ProductPageShippingSettings;

?>

<form class="tsm-admin-settings-form" method="POST">

	<?php tps_manager_admin_nonce_field(); ?>
	<div  class="input-wrapper checkbox">
		<label for="<?php echo esc_attr( ProductPageShippingSettings::PRODUCT_PAGE_SHIPPING ); ?>"><?php esc_html_e( 'Enable Product Page Shipping', 'tps-manager' ); ?></label>
		<input
			type="checkbox"
			id="<?php echo esc_attr( ProductPageShippingSettings::PRODUCT_PAGE_SHIPPING ); ?>"
			name="<?php echo esc_attr( ProductPageShippingSettings::PRODUCT_PAGE_SHIPPING ); ?>"
			value="<?php echo esc_attr( Constants::YES ); ?>"
			<?php tps_manager_is_checked( $data[ ProductPageShippingSettings::PRODUCT_PAGE_SHIPPING ] ); ?>
		>
		<div class="help-tip"><?php esc_html_e('This will enable product page shipping calculator for logged in users.', 'shipping-manager'); ?></div>
	</div>
	<?php if ( tps_manager_is_pro_plugin_active() ): ?>
	  <?php
    // @TODO Needs to be multi select
	  $shipping_classes = WC()->shipping()->get_shipping_classes();
	  if ( ! empty( $shipping_classes ) ):
		  ?>
        <div class="input-wrapper amount">
          <label for="<?php echo esc_attr( ProductPageShippingSettings::SHIPPING_CLASS ); ?>"><?php esc_html_e( 'Shipping Classes', 'tps-manager' ); ?></label>
          <select name="<?php echo esc_attr( ProductPageShippingSettings::SHIPPING_CLASS ); ?>" id="<?php echo esc_attr( ProductPageShippingSettings::SHIPPING_CLASS ); ?>">
            <option value="">Select One</option>
			  <?php foreach( $shipping_classes as $shipping_class ): ?>
                <option <?php if ( $shipping_class->term_id == ( (int) $data[ ProductPageShippingSettings::SHIPPING_CLASS ] ) ) echo "selected" ?> value="<?php echo esc_attr( $shipping_class->term_id ); ?>"><?php echo esc_html( $shipping_class->name ); ?></option>
			  <?php endforeach; ?>
          </select>
          <div class="help-tip"><?php esc_html_e( 'Select exact shipping class to be applied.', 'tps-manager' ); ?></div>
        </div>
	  <?php endif; ?>
  <?php endif; ?>
	<div class="input-wrapper submit">
		<button class="woocommerce-save-button components-button is-primary" value="free-shipping"><?php esc_html_e( 'Save', 'tps-manager' ); ?></button>
	</div>
</form>
