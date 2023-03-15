<?php
/**
 * Form field: Custom hooks.
 *
 * @package    Action Hook Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Block\Action_Hook\;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<p class="description">
	<?php esc_html_e( 'You can add your own custom action hooks to choose from.', 'action-hook-block' ); ?>
	<?php

	printf(
		/* translators: %s: comma presented in HTML code. */
		esc_html__( 'Simply list your custom hook names below and separate them with comma (%s).', 'action-hook-block' ),
		'<code>,</code>'
	);

	?>
</p>

<p>
	<label>
		<strong style="display: block;margin-bottom:.25em;"><?php esc_html_e( 'Action hook names separated with comma:', 'action-hook-block' ); ?></strong>
		<textarea
			name="<?php echo esc_attr( Options::$option_name . '[hooks_custom]' ); ?>"
			cols="100"
			rows="4"
			><?php

			echo esc_textarea( Options::get( 'hooks_custom' ) );

		?></textarea>
	</label>
</p>
