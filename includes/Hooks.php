<?php
/**
 * Predefined hook names available for the block.
 *
 * @package    Action Hook Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Block\Action_Hook;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Hooks {

	/**
	 * Get array of supported hooks.
	 *
	 * Array consist of hook name and label pairings.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get(): array {

		// Output

			return array_filter(
				/**
				 * Filters hook name and label pairings.
				 *
				 * @since  1.0.0
				 *
				 * @param  array $hooks
				 */
				(array) apply_filters( 'action-hook-block/hooks/get', array_merge(
					array(
						'' => esc_html__( '– Select an action hook –', 'action-hook-block' ),
					),
					Theme_Hook_Alliance::get(),
					self::get_custom()
				) )
			);

	} // /get

	/**
	 * Get list of custom hooks set via plugin options.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_custom(): array {

		// Variables

			$hooks = array_filter(
				array_map(
					function( $item ) {
						return str_replace( PHP_EOL, '', trim( $item ) );
					},
					explode( ',', (string) Options::get( 'hooks_custom' ) )
				)
			);


		// Output

			return array_combine( $hooks, $hooks );

	} // /get_custom

}
