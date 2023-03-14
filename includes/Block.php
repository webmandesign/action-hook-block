<?php
/**
 * Block.
 *
 * @package    Action Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Blocks\Action;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Block {

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

				add_action( 'init', __CLASS__ . '::register' );

				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::assets' );

	} // /init

	/**
	 * Register block.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function register() {

		// Variables

			/**
			 * Filters registration arguments for `wmd/action-block` block.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $args
			 */
			$args = (array) apply_filters( 'action-block/block/register/args', array(
				'api_version' => 2,
				'version'     => ACTION_BLOCK_VERSION,

				'title'       => esc_html__( 'Action hook', 'action-block' ),
				'description' => esc_html__( 'WordPress PHP action hook, such as Theme Hook Alliance.', 'action-block' ),
				'category'    => 'theme',
				'icon'        => ( is_rtl() ) ? ( 'arrow-left-alt' ) : ( 'arrow-right-alt' ),
				'keywords'    => array(
					esc_html_x( 'THA', 'Block search keyword. Theme Hook Alliance abbreviation.', 'action-block' ),
					esc_html_x( 'theme', 'Block search keyword.', 'action-block' ),
					esc_html_x( 'hook', 'Block search keyword.', 'action-block' ),
					esc_html_x( 'alliance', 'Block search keyword.', 'action-block' ),
					esc_html_x( 'action', 'Block search keyword.', 'action-block' ),
					esc_html_x( 'PHP', 'Block search keyword.', 'action-block' ),
				),

				'textdomain' => 'action-block',

				'attributes' => array(
					'name' => array(
						'type'    => 'string',
						'default' => '',
					),
					'context' => array(
						'type'    => 'string',
						'default' => '',
					),
				),

				'supports' => array(
					'className'       => false,
					'customClassName' => false,
					'html'            => false,
					'align'           => array(
						'wide',
						'full',
					),
				),

				'editor_script_handles' => array( 'action-block' ),
				'editor_style_handles'  => array( 'action-block' ),

				'render_callback' => __CLASS__ . '::render',
			) );


		// Processing

			register_block_type( 'wmd/action-block', $args );

	} // /register

	/**
	 * Render block.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $atts  Array of stored block attributes.
	 *
	 * @return  string
	 */
	public static function render( array $atts = array() ): string {

		// Requirements check

			if ( empty( $atts['name'] ) ) {
				return '';
			}


		// Variables

			$output    = '';
			$container = ( empty( $atts['align'] ) ) ? ( '%s' ) : ( '<div class="wp-block-wmd-action-block align' . esc_attr( $atts['align'] ) . '">%s</div>' );
			$context   = ( empty( $atts['context'] ) ) ? ( null ) : ( (string) $atts['context'] );


		// Processing

			ob_start();
			do_action( trim( (string) $atts['name'] ), esc_attr( $context ) );
			$output = trim( ob_get_clean() );

			if ( ! empty( $output ) ) {
				$output = sprintf( $container, $output );
			}


		// Output

			return $output;

	} // /render

	/**
	 * Register block editor assets.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function assets() {

		// Variables

			$handle  = 'action-block';
			$version = 'v' . ACTION_BLOCK_VERSION;
			$hooks   = Hooks::get();

			$editor_preview_info = wp_parse_args(
				/**
				 * Filters block editor preview content.
				 *
				 * Allows themes and plugins adding a text information into
				 * top and bottom of block preview in editor.
				 *
				 * @since  1.0.0
				 *
				 * @param  array $editor_preview_info
				 */
				(array) apply_filters( 'action-block/hooks/get', array() ),
				array(
					'top'    => '',
					'bottom' => '',
				)
			);


		// Processing

			wp_register_script(
				$handle,
				ACTION_BLOCK_URL . 'blocks/action/block.js',
				array(
					'wp-blocks',
					'wp-element',
					'wp-components',
					'wp-i18n',
					'wp-block-editor',
					'wp-polyfill',
				),
				$version
			);

				wp_add_inline_script(
					$handle,
					'var wmdActionBlock = {'
						. 'hooks: [ ' . implode( ',',
							array_map(
								function( $name, $label ) {
									return '{ label:"' . esc_html( $label ) . '", value:"' . esc_attr( $name ) . '" }';
								},
								array_keys( $hooks ),
								$hooks
							)
						) . ' ],'
						. 'info: {'
							. 'top: "' . esc_html( $editor_preview_info['top'] ) . '",'
							. 'bottom: "' . esc_html( $editor_preview_info['bottom'] ) . '",'
						. '},'
					. '};',
					'before'
				);

			wp_register_style(
				$handle,
				ACTION_BLOCK_URL . 'blocks/action/block.css',
				array(
					'wp-components',
				),
				$version
			);

	} // /assets

}
