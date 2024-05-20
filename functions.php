<?php
defined('ABSPATH') || exit;

/**
 * Returns the subpage handle
 *
 * @since TSM_SINCE
 *
 * @return string
 */
function get_sub_page(): string {
	$sub_page = isset( $_GET['sub_page'] )
		? sanitize_text_field( wp_unslash( $_GET['sub_page'] ) )
		: 'home';
	return in_array( $sub_page, [ 'home', 'add' ] ) ? $sub_page : 'home';
}

/**
 * Get trimmed excerpt for description of the rule
 *
 * @param $rule_id
 *
 * @return string
 */
function trimed_excertp( $rule_id = 0 ): string {
	$description = '';
	if ( empty( $rule_id ) ) {
		return __( 'Genera rule to allow the customer free shipping, when they have more than $1025', 'tsm-shipping-manager' );
	} else {
		// @TODO Get from rule description
	}

	return $description;
}
