<?php
/**
 * All the config related functions, including the
 * enqueuing of assets on the frontend
 */

namespace MSC\Config;

function enqueue_assets() {
	$plugin_data = get_file_data( MSC__PLUGIN_FILE, array( 'Version' => 'Version' ) );
	$version = $plugin_data['Version'];

	// Enqueue the stylesheet
	wp_enqueue_style(
		'msc_styles',
		plugins_url( 'static/css/style.min.css', MSC__PLUGIN_FILE ),
		false,
		$version,
		'all'
	);

	// Enqueue the javascript bundle
	wp_enqueue_script(
		'msc_scripts',
		plugins_url( 'static/js/script.min.js', MSC__PLUGIN_FILE ),
		array( 'jquery' ),
		$version,
		array(
			'strategy'  => 'async',
			'in_footer' => true
		)
	);
}
