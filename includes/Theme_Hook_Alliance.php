<?php
/**
 * Theme Hook Alliance compatibility.
 *
 * @link  https://github.com/zamoose/themehookalliance
 *
 * @package    Action Hook Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Blocks\Action_Hook;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Theme_Hook_Alliance {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Requirements check

			if ( ! (bool) Options::get( 'hooks_tha' ) ) {
				return;
			}


		// Processing

			// Actions

				// Has to be hooked early so the theme can override this.
				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme', 0 );

			// Filters

				// Hook priority does not matter here, actually, but keeping it low just in case.
				add_filter( 'current_theme_supports-tha_hooks', __CLASS__ . '::support', 0, 3 );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Processing

			add_theme_support( 'tha_hooks', array(

				// 'all',

				// 'html',
				// 'body',
				// 'head',
				'comments',
				'content',
				'entry',
				'footer',
				'header',
				'sidebar',
				'sidebars',
			) );

	} // /after_setup_theme

	/**
	 * Determines, whether the specific hook type is actually supported.
	 *
	 * This is needed for `all` support option evaluation.
	 *
	 * @since  1.0.0
	 *
	 * @param   bool  $bool       True
	 * @param   array $args       The hook type being checked
	 * @param   array $registered All registered hook types
	 *
	 * @return  bool
	 */
	public static function support( bool $bool, array $args, array $registered ): bool {

		// Output

			return
				in_array( $args[0], $registered[0] )
				|| in_array( 'all', $registered[0] );

	} // /support

	/**
	 * Get list of Theme Hook Alliance hooks.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get(): array {

		// Requirements check

			if ( ! (bool) Options::get( 'hooks_tha' ) ) {
				return array();
			}


		// Output

			return array(

				// 'tha_html_before' => esc_html_x( 'HTML: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				// 'tha_body_top'    => esc_html_x( 'HTML Body: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				// 'tha_body_bottom' => esc_html_x( 'HTML Body: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),
				// 'tha_head_top'    => esc_html_x( 'HTML Head: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				// 'tha_head_bottom' => esc_html_x( 'HTML Head: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_comments_before' => esc_html_x( 'Comments: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_comments_after'  => esc_html_x( 'Comments: After (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_content_before' => esc_html_x( 'Content: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_content_top'    => esc_html_x( 'Content: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_content_bottom' => esc_html_x( 'Content: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_content_after'  => esc_html_x( 'Content: After (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_content_while_after'  => esc_html_x( 'Query Loop: After (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_content_while_before' => esc_html_x( 'Query Loop: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_entry_before' => esc_html_x( 'Entry: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_entry_top'    => esc_html_x( 'Entry: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_entry_bottom' => esc_html_x( 'Entry: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_entry_after'  => esc_html_x( 'Entry: After (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_entry_content_before' => esc_html_x( 'Entry Content: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_entry_content_after'  => esc_html_x( 'Entry Content: After (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_footer_before' => esc_html_x( 'Footer: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_footer_top'    => esc_html_x( 'Footer: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_footer_bottom' => esc_html_x( 'Footer: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_footer_after'  => esc_html_x( 'Footer: After (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_header_before' => esc_html_x( 'Header: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_header_top'    => esc_html_x( 'Header: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_header_bottom' => esc_html_x( 'Header: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_header_after'  => esc_html_x( 'Header: After (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_sidebar_top'    => esc_html_x( 'Sidebar: Top (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_sidebar_bottom' => esc_html_x( 'Sidebar: Bottom (THA)', 'PHP action hook label.', 'action-hook-block' ),

				'tha_sidebars_before' => esc_html_x( 'Sidebars: Before (THA)', 'PHP action hook label.', 'action-hook-block' ),
				'tha_sidebars_after'  => esc_html_x( 'Sidebars: After (THA)', 'PHP action hook label.', 'action-hook-block' ),
			);

	} // /get

}
