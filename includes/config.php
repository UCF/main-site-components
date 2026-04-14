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

/**
 * Add a documentation link to the plugin's action links
 *
 * @param array  $links The existing action links.
 * @param string $file  The plugin file.
 * @return array Modified action links.
 */
function add_plugin_documentation_link( $links, $file ) {
    if ( strpos( $file, plugin_basename( MSC__PLUGIN_FILE ) ) !== false ) {
        $new_links = array(
            'docs' => '<a href="https://github.com/UCF/main-site-components/wiki" target="_blank" rel="noopener noreferrer">Documentation</a>',
        );
        $links = array_merge( $links, $new_links );
    }
    return $links;
}
