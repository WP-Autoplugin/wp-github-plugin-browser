<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles caching logic.
 */
class H2WP_Cache {

	/**
	 * Get cached data.
	 *
	 * @param string $key Cache key.
	 * @return mixed Cached data or false if not found.
	 */
	public static function get( $key ) {
		return get_transient( 'h2wp_' . $key );
	}

	/**
	 * Set cached data.
	 *
	 * @param string $key      Cache key.
	 * @param mixed  $data     Data to store.
	 * @param int    $duration Duration in seconds.
	 */
	public static function set( $key, $data, $duration = null ) {
		if ( ! $duration ) {
			$duration = H2WP_Settings::get_cache_duration();
		}
		set_transient( 'h2wp_' . $key, $data, $duration );
	}

	/**
	 * Delete cached data.
	 *
	 * @param string $key Cache key.
	 */
	public static function delete( $key ) {
		delete_transient( 'h2wp_' . $key );
	}
}
