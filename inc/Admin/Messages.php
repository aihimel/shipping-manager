<?php
namespace Themepaste\ShippingManager\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Manages admin form messages
 *
 * @since 1.1.0
 */
class Messages {
	/**
	 * Unique id for initialized object
	 *
	 * @since 1.1.0
	 */
	const INSTANCE_KEY = 'admin_messages';

	/**
	 * List of supported message types
	 * First one is set to default if types is not defined while message is added
	 * The messages are rendered as is in the serial
	 *
	 * @since 1.1.0
	 */
	const TYPES = [ 'error', 'warning', 'success', 'info' ]; // first one is default type and serial is maintained while rendering messages

	/**
	 * Holds all the message in this variable and rendered from here
	 *
	 * @since 1.1.0
	 *
	 * @var array
	 */
	private array $messages = [];

	/**
	 * Adds message
	 * @param string $message
	 * @param string $type
	 *
	 * @return void
	 */
	public function add_message( string $message, string $type = '' ): void {
		$type = ! empty ( $type ) ? $type : current( self::TYPES );
		$this->messages[] = [
			'type' => $type,
			'message' => $message,
		];
	}

	/**
	 * Returns specific or all messages stored
	 *
	 * @since 1.1.0
	 *
	 * @param string $types
	 *
	 * @return array
	 */
	public function get_messages( string $types = '' ): array {
		if ( empty ( $types ) ) {
			return $this->messages;
		} else {
			if ( in_array( $types, self::TYPES, true ) ) {
				return $this->messages[ $types ];
			} else {
				wp_trigger_error( __METHOD__, "`$types` message type is invalid." );
				return [];
			}
		}
	}

	/**
	 * Sorts messages according to its type
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public function get_sorted_messages_by_type(): array {
		$sorted_messages = [];
		foreach( self::TYPES as $type ) {
			foreach( $this->messages as $message ) {
				if ( $message['type'] === $type ) {
					$sorted_messages[ $type ][] = $message;
				}
			}
		}

		return $sorted_messages;
	}

	/**
	 * Flushes all the messages
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function flush() {
		$this->messages = [];
	}
}