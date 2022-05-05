<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/trustmary/trustmary-wordpress
 * @since      1.0.0
 *
 * @package    Trustmary
 * @subpackage Trustmary/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Trustmary
 * @subpackage Trustmary/admin
 * @author     Teppo Kallio <teppo.kallio@trustmary.com>
 */
class Trustmary_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trustmary-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trustmary-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register settings fields
	 */
	public function register_admin_settings() {
		register_setting( 'trustmary_options', 'trustmary_options');
    add_settings_section( 'trustmary_tag_section', '', array($this, 'render_trustmary_section_text'), 'trustmary-settings' );
    add_settings_field( 'trustmary_tag_id', 'Tag Id', array($this, 'render_trustmary_tag_id'), 'trustmary-settings', 'trustmary_tag_section' );
    add_settings_field( 'trustmary_disable_tag', 'Disable tag', array($this, 'render_trustmary_disable_tag'), 'trustmary-settings', 'trustmary_tag_section' );
	}

	/**
	 * Add new options page under settings: Trustmary
	 */
	public function register_admin_page() {
		add_options_page('Trustmary Settings', 'Trustmary', 'manage_options', 'trustmary-settings', array($this, 'render_admin_page'));
	}

	public function render_admin_page() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/trustmary-admin-display.php';
	}
	
	public function render_admin_section() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/trustmary-admin-section.php';
	}
	
	public function render_admin_fields() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/trustmary-admin-fields.php';
	}

	public function render_trustmary_section_text() {
		echo '<p>Get Trustmary Tag id from tag script.</p>';
	}

	public function render_trustmary_tag_id() {
		$options = get_option( 'trustmary_options' );
    echo "<input id='trustmary_tag_id' name='trustmary_options[trustmary_tag_id]' type='text' value='" . esc_attr( $options['trustmary_tag_id'] ) . "' />";
	}
	
	public function render_trustmary_disable_tag() {
		$options = get_option( 'trustmary_options' );
    echo "<input id='trustmary_disable_tag' name='trustmary_options[trustmary_disable_tag]' type='checkbox' value='1' " . checked( 1 == $options['trustmary_disable_tag'], true, false ) . " />";
	}

}
