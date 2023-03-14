<?php
/**
 * Plugin Name:  Action Block
 * Plugin URI:   https://www.webmandesign.eu/portfolio/action-block-wordpress-plugin/
 * Description:  A block to provide PHP action hook execution (such as Theme Hook Alliance hooks).
 * Version:      1.0.0
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GNU General Public License v3
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  action-block
 * Domain Path:  /languages
 *
 * Requires PHP:       7.0
 * Requires at least:  6.1
 *
 * GitHub Plugin URI:  https://github.com/webmandesign/action-block
 *
 * @copyright  WebMan Design, Oliver Juhas
 * @license    GPL-3.0, https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link  https://github.com/webmandesign/action-block
 * @link  https://www.webmandesign.eu
 *
 * @package  Action Block
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Constants.
define( 'ACTION_BLOCK_VERSION', '1.0.0' );
define( 'ACTION_BLOCK_FILE', __FILE__ );
define( 'ACTION_BLOCK_PATH', plugin_dir_path( ACTION_BLOCK_FILE ) ); // Trailing slashed.
define( 'ACTION_BLOCK_URL', plugin_dir_url( ACTION_BLOCK_FILE ) ); // Trailing slashed.

// Load the functionality.
require_once ACTION_BLOCK_PATH . 'includes/Autoload.php';
WebManDesign\Blocks\Action\Block::init();
WebManDesign\Blocks\Action\Options::init();
WebManDesign\Blocks\Action\Theme_Hook_Alliance::init();
