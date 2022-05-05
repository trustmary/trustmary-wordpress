<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/trustmary/trustmary-wordpress
 * @since      1.0.0
 *
 * @package    Trustmary
 * @subpackage Trustmary/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Trustmary
 * @subpackage Trustmary/public
 * @author     Teppo Kallio <teppo.kallio@trustmary.com>
 */
class Trustmary_Public {

	private $plugin_name;
	private $version;
	private $activate_tag;
	private $tag_id;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->activate_tag = $this->test_activate_tag();

	}

	private function test_activate_tag() {
		$options = get_option( 'trustmary_options' );
		if(isset($options['trustmary_disable_tag']) && $options['trustmary_disable_tag'] === '1') {
			return false;
		}

		if(isset($options['trustmary_tag_id']) && !empty($options['trustmary_tag_id'])) {
			$this->tag_id = $options['trustmary_tag_id'];
			return true;
		}

		return false;
	}

	public function should_activate_tag() {
		return $this->activate_tag;
	}

	public function render_trustmary_tag() {
		echo <<<EOT
		<script>(function (w,d,s,o,r,js,fjs) {
			w[r]=w[r]||function() {(w[r].q = w[r].q || []).push(arguments)}
			w[r]('app', '$this->tag_id');
			if(d.getElementById(o)) return;
			js = d.createElement(s), fjs = d.getElementsByTagName(s)[0];
			js.id = o; js.src = 'https://embed.trustmary.com/embed.js';
			js.async = 1; fjs.parentNode.insertBefore(js, fjs);
		}(window, document, 'script', 'trustmary-embed', 'tmary'));
	</script>
EOT;
	}

}
