=== Action Block ===

Contributors:      webmandesign
Donate link:       https://www.webmandesign.eu/contact/#donation
Author URI:        https://www.webmandesign.eu
Plugin URI:        https://www.webmandesign.eu/portfolio/action-block-wordpress-plugin/
Requires at least: 6.1
Tested up to:      6.1
Requires PHP:      7.0
Stable tag:        1.0.0
License:           GNU General Public License v3
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
Tags:              webman, webman design, blocks, block editor, block, tha, theme hook alliance, hooks, actions

A block providing WordPress PHP action hook execution on front-end.


== Description ==

A block providing WordPress PHP action hook execution on front-end of your website.

= Is this for non-techie user? =

No, probably not.

You need to know how to use [WordPress action hooks](https://developer.wordpress.org/plugins/hooks/actions/) to your advantage to be able to gain from this plugin and from **Action hook** block.

The plugin helps with execution of your PHP code, so coding knowledge is required.

= What problem does it solve? =

❓ _Do you want to execute PHP code in the page or post content?_
❓ _Do you want to display some additional content on search results page depending on specific search condition?_
❓ _Do you want to conditionally display some information in a sidebar depending on a condition?_
❓ _Do you want to output your functionality, but there is no block for that?_

Action Block plugin provides **Action hook** block solving these cases!

The **Action hook** block allows you to select a predefined [action hook](https://developer.wordpress.org/plugins/hooks/actions/) to execute at the specific place on your website front-end. You can then hook your PHP function onto such action via your theme's `functions.php` file, for example.

By default, plugin provides hooks of [Theme Hook Alliance](https://github.com/zamoose/themehookalliance) project. (There is a 3rd party [helper plugin](https://wordpress.org/plugins/tha-hooks-interface/) for Theme Hook Alliance hooks too.)

You can disable support for Theme Hook Alliance and add your own hook names in theme options.

= Got a question or suggestion? =

In case of any question or suggestion regarding this plugin, feel free to ask at [support section](https://wordpress.org/support/plugin/action-block/), or at [GitHub repository issues](https://github.com/webmandesign/action-block/issues).


== Installation ==

1. Unzip the plugin download file and upload `action-block` folder into the `/wp-content/plugins/` directory.
2. Activate the plugin through the *"Plugins"* menu in WordPress.
3. Plugin works immediately after activation by adding new "Action hook" block into your WordPress block editor. You can customize plugin options on **Settings → Writing** screen.


== Frequently Asked Questions ==

= How does it work? =

1. Insert an **Action hook** block into your page/post content (or into Site Editor) where you want to execute your PHP code.
2. Select an action hook name to be executed at the place.
3. Save the post/page/Site Editor.
4. In your theme's `functions.php` file add your PHP code to execute, such as: `add_action( 'action_hook_name_here', function() { echo 'Hello world!'; } );`
5. Watch your code appear on your website front-end.

= What is Theme Hook Alliance (THA)? =

Theme Hook Alliance (THA) is set of predefined action hook names used in specific places in themes. For more information about this project visit [its GitHub repository](https://github.com/zamoose/themehookalliance).

Although the project is old, there is really nothing to update or change in it. It simply works as intended since its first design and release.

You can use additional [3rd party plugin](https://wordpress.org/support/plugin/action-block/) to execute your code when using THA hooks.

= What is a "context" option? =

= Can I add custom hooks? =

= Can I integrate this with my theme? =


== Screenshots ==

1. Preview of the block functionality


== Changelog ==

Please see the [`changelog.md` file](https://github.com/webmandesign/action-block/blob/master/changelog.md) for details.


== Upgrade Notice ==

= 1.0.0 =
Initial release.
