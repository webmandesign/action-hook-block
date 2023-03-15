<?php
/**
 * Plugin Name:  Action Hook Block
 * Plugin URI:   https://www.webmandesign.eu/portfolio/action-hook-block-wordpress-plugin/
 * Description:  A block to provide PHP action hook execution (such as Theme Hook Alliance hooks).
 * Version:      1.0.0
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GNU General Public License v3
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  action-hook-block
 * Domain Path:  /languages
 *
 * Requires PHP:       7.0
 * Requires at least:  6.1
 *
 * GitHub Plugin URI:  https://github.com/webmandesign/action-hook-block
 *
 * @copyright  WebMan Design, Oliver Juhas
 * @license    GPL-3.0, https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link  https://github.com/webmandesign/action-hook-block
 * @link  https://www.webmandesign.eu
 *
 * @package  Action Hook Block
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Constants.
define( 'ACTION_HOOK_BLOCK_VERSION', '1.0.0' );
define( 'ACTION_HOOK_BLOCK_FILE', __FILE__ );
define( 'ACTION_HOOK_BLOCK_PATH', plugin_dir_path( ACTION_HOOK_BLOCK_FILE ) ); // Trailing slashed.
define( 'ACTION_HOOK_BLOCK_URL', plugin_dir_url( ACTION_HOOK_BLOCK_FILE ) ); // Trailing slashed.

// Load the functionality.
require_once ACTION_HOOK_BLOCK_PATH . 'includes/Autoload.php';
WebManDesign\Block\Action_Hook\Block::init();
WebManDesign\Block\Action_Hook\Options::init();
WebManDesign\Block\Action_Hook\Theme_Hook_Alliance::init();
