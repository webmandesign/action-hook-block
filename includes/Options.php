<?php
/**
 * Plugin options.
 *
 * @package    Action Hook Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Blocks\Action_Hook;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Options {

	/**
	 * Plugin options setting name.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $option_name = 'action_hook_block';

	/**
	 * Plugin options section name.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     string
	 */
	public static $options_section = 'action_hook_block_options';

	/**
	 * Soft cache for options.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $options = array();

	/**
	 * Default values for options.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $defaults = array(
		'hooks_tha'    => true,
		'hooks_custom' => '',
	);

	/**
	 * Option sanitize callbacks.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     array
	 */
	public static $sanitize = array(
		'hooks_tha'    => 'boolval',
		'hooks_custom' => 'sanitize_textarea_field',
	);

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'admin_init', __CLASS__ . '::register' );

			// Filters

				add_filter( 'plugin_action_links_' . plugin_basename( ACTION_HOOK_BLOCK_FILE ), __CLASS__ . '::plugin_action_links' );

	} // /init

	/**
	 * Register setting options.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function register() {

		// Processing

			register_setting(
				'writing',
				self::$option_name,
				array(
					'type'              => 'array',
					'default'           => array(),
					'sanitize_callback' => __CLASS__ . '::sanitize',
				)
			);

			add_settings_section(
				self::$options_section,
				esc_html__( '"Action hook" block options', 'action-hook-block' ),
				function() {
					echo
						'<p>'
						. esc_html__( 'Options for "Action hook" block provided by Action Hook Block plugin.', 'action-hook-block' )
						. '</p>';
				},
				'writing',
				array(
					'before_section' => '<section id="' . esc_attr( self::$options_section ) . '" style="padding:2em 0;">',
					'after_section'  => '</section>',
				)
			);

				add_settings_field(
					'hooks_tha',
					esc_html__( 'Theme Hook Alliance hooks', 'action-hook-block' ),
					function() { self::render_form_field( 'hooks_tha' ); },
					'writing',
					self::$options_section
				);

				add_settings_field(
					'hooks_custom',
					esc_html__( 'Custom hook names', 'action-hook-block' ),
					function() { self::render_form_field( 'hooks_custom' ); },
					'writing',
					self::$options_section
				);

	} // /register

	/**
	 * Render form field.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $field
	 *
	 * @return  void
	 */
	public static function render_form_field( string $field ) {

		// Processing

			require_once ACTION_HOOK_BLOCK_PATH . 'includes/views/form-field-' . sanitize_title( $field ) . '.php';

	} // /render_form_field

	/**
	 * Sanitize options.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $options
	 *
	 * @return  array
	 */
	public static function sanitize( array $options = array() ): array {

		// Variables

			// Make sure no unwanted options are being injected.
			$options = array_intersect_key( (array) $options, self::$sanitize );


		// Processing

			foreach ( self::$sanitize as $key => $callback ) {
				if ( isset( $options[ $key ] ) ) {

					// Sanitize the option with callback.
					$options[ $key ] = call_user_func( $callback, $options[ $key ] );
				} else {

					// Create option value if it does not exist.
					$options[ $key ] = call_user_func( $callback, null );
				}
			}


		// Output

			return (array) $options;

	} // /sanitize

	/**
	 * Get a specific plugin option.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $option
	 *
	 * @return  mixed
	 */
	public static function get( string $option ) {

		// Processing

			if ( empty( self::$options ) ) {
				self::$options = (array) get_option( self::$option_name, self::$defaults );
			}


		// Output

			if ( isset( self::$options[ $option ] ) ) {
				return self::$options[ $option ];
			} elseif ( isset( self::$defaults[ $option ] ) ) {
				return self::$defaults[ $option ];
			} else {
				return null;
			}

	} // /get

	/**
	 * Set plugin action links.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $links
	 *
	 * @return  array
	 */
	public static function plugin_action_links( array $links ): array {

		// Processing

			$links[] =
				'<a href="' . esc_url( get_admin_url( null, 'options-writing.php#action_hook_block_options' ) ) . '">'
				. esc_html_x( 'Settings', 'Plugin action link.', 'action-hook-block' )
				. '</a>';


		// Output

			return $links;

	} // /plugin_action_links

}
