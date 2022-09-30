<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://pixelding.de
 * @since             1.0.0
 * @package           Woo_custom_templates
 *
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Custom Templates
 * Plugin URI:        https://pixelding.de
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            TheRealFilko
 * Author URI:        https://pixelding.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo_custom_templates
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
define( 'WOO_CUSTOM_TEMPLATES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo_custom_templates-activator.php
 */
function activate_woo_custom_templates() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo_custom_templates-activator.php';
	Woo_custom_templates_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo_custom_templates-deactivator.php
 */
function deactivate_woo_custom_templates() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo_custom_templates-deactivator.php';
	Woo_custom_templates_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_custom_templates' );
register_deactivation_hook( __FILE__, 'deactivate_woo_custom_templates' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo_custom_templates.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_custom_templates() {

  $plugin = new Woo_custom_templates();
  $plugin->run();


  add_filter( 'woocommerce_locate_template', 'intercept_wc_template', 10, 3 );
  /**
 * Filter the cart template path to use cart.php in this plugin instead of the one in WooCommerce.
 *
 * @param string $template      Default template file path.
 * @param string $template_name Template file slug.
 * @param string $template_path Template file name.
 *
 * @return string The new Template file path.
 */
  function intercept_wc_template( $template, $template_name, $template_path ) {

    if ( 'dashboard.php' === basename( $template ) ) {
      $template = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'woocommerce/myaccount/dashboard.php';
    }

    return $template;

  }
  add_action('check_admin_referer', 'logout_without_confirm', 10, 2);

  function logout_without_confirm($action, $result)

  {

    /**

      * Allow log out without confirmation

      */

    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {

      $redirect_to = isset($_REQUEST['redirect_to']) ?

      $_REQUEST['redirect_to'] : '';

      $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));;

      header("Location: $location");

      die();

    }
  }
}

run_woo_custom_templates();
