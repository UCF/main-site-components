<?php
/**
 * Provides shortcodes for implementing brackets
 */
namespace MSC\Brackets\Shortcodes;

function sc_brackets( $attr, $content='' ) {
	$attr = shortcode_atts( array(
		'type'  => '',
		'class' => '',
		'style' => ''
	), $attr );

	$bracket_class = ! empty( $attr['type'] ) ?
		'brackets-' . $attr['type'] :
		'brackets';

	$classes = array_merge(
		array( $bracket_class ),
		explode( ' ', $attr['class'] )
	);

	$style = ! empty( $attr['style'] ) ?
		" style=\"{$attr['style']}\"" :
		"";

	ob_start();
?>
	<div class="<?php echo implode( ' ', $classes ); ?>"<?php echo $style; ?>>
		<?php echo do_shortcode( $content ); ?>
	</div>
<?php
	return ob_get_clean();
}

function register_shortcodes() {
	add_shortcode( 'brackets', __NAMESPACE__ . '\sc_brackets' );
}
