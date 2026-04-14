<?php
/*
Plugin Name: Main Site Components
Description: Provides shortcodes and blocks to be used on ucf.edu
Version: 1.0.0
Author: UCF Web Communications
License: GPL3
GitHub Plugin URI: UCF/main-site-components
*/

namespace MSC;

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'MSC__PLUGIN_URL', plugins_url( basename( dirname( __FILE__ ) ) ) );
define( 'MSC__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MSC__STATIC_URL', MSC__PLUGIN_URL . '/static' );
define( 'MSC__PLUGIN_FILE', __FILE__ );

require_once MSC__PLUGIN_DIR . 'includes/config.php';
require_once MSC__PLUGIN_DIR . 'includes/brackets-shortcodes.php';
require_once MSC__PLUGIN_DIR . 'includes/flipcard-shortcodes.php';

add_action( 'plugins_loaded', function() {
	add_action( 'wp_enqueue_scripts', 'MSC\Config\enqueue_assets', 10, 0 );
	add_action( 'init', 'MSC\Flip_Card\Shortcodes\register_shortcodes', 10, 0 );
	add_action( 'init', 'MSC\Brackets\Shortcodes\register_shortcodes', 10, 0 );

	// Add the filter using your plugin's base name
	add_filter( 'plugin_action_links_' . MSC__PLUGIN_FILE, 'MSC\Config\add_docs_link', 10, 1 );
} );
