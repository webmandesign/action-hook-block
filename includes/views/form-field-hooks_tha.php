<?php
/**
 * Form field: Theme Hook Alliance.
 *
 * @package    Action Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\Blocks\Action;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<p class="description">
	<?php esc_html_e( 'By default, plugin allows you to select Theme Hook Alliance action hooks in the block.', 'action-block' ); ?>
	(<a href="https://github.com/zamoose/themehookalliance"><?php esc_html_e( 'Theme Hook Alliance info →', 'action-block' ); ?></a>)
</p>

<p>
	<label>
		<input
			type="checkbox"
			name="<?php echo esc_attr( Options::$option_name . '[hooks_tha]' ); ?>"
			value="true"
			<?php checked( true, Options::get( 'hooks_tha' ) ); ?>
			/>
		<strong><?php esc_html_e( 'Enable Theme Hook Alliance action hooks', 'action-block' ); ?></strong>
	</label>
</p>
