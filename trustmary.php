<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/trustmary/trustmary-wordpress
 * @since             1.0.0
 * @package           Trustmary
 *
 * @wordpress-plugin
 * Plugin Name:       Trustmary
 * Plugin URI:        https://github.com/trustmary/trustmary-wordpress
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Teppo Kallio
 * Author URI:        https://github.com/trustmary/trustmary-wordpress
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       trustmary
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TRUSTMARY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-trustmary-activator.php
 */
function activate_trustmary() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trustmary-activator.php';
	Trustmary_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-trustmary-deactivator.php
 */
function deactivate_trustmary() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trustmary-deactivator.php';
	Trustmary_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_trustmary' );
register_deactivation_hook( __FILE__, 'deactivate_trustmary' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-trustmary.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_trustmary() {

	$plugin = new Trustmary();
	$plugin->run();

}
run_trustmary();
