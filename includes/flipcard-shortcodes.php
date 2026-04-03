<?php
/**
 * Provides a series of shortcodes for
 * implementing flipcards
 */

namespace MSC_FLIP_CARD_SHORTCODES;

/**
 * The wrapper flip card which will nest the inner
 * front/back elements. Allows for the addition of
 * classes and styles to the wrapper.
 *
 * @author Jim Barnes
 * @since 1.0.0
 *
 * @param array $attr The shortcode attributes
 * @param string $content The inner content
 *
 * @return string
 */
function sc_flip_card( $attr, $content='' ) {
	$attr = shortcode_atts( array(
		'class' => '',
		'style' => '',
		'card_class' => '',
		'card_style' => '',
	), $attr );

	$classes = array( 'flip-card' );
	$classes = array_merge( $classes, $attr['class'] );

	$card_classes = array( 'card flip-card-inner' );
	$card_classes = array_merge( $card_classes, $attr['card_classes'] );

	ob_start();

?>
	<div class="<?php echo $classes; ?>"<?php echo ' style="' . $attr['style'] . '"' ? ! empty( $attr['style'] ) : '';?>>
		<div class="<?php echo $card_classes; ?>"<?php echo ' style="' . $attr['card_style'] . '"' ? ! empty( $attr['card_style'] ) : '';?>>
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
<?php

	return ob_get_clean();
}

/**
 * Helper function for the flip-card-[front|back]
 * shortcodes. Since the logic between the front
 * and back are the same, with the only difference
 * being the class applied to the wrapper element.
 *
 * @author Jim Barnes
 * @since 1.0.0
 *
 * @param array $attr The shortcode attributes
 * @param string $content The inner content
 *
 * @return string
 */
function flip_card_side( $attr, $content='' ) {
	$attr = shortcode_atts( array(
		'side' => ''
	), $attr );
}

/**
 * Shortcode for the front card:
 *
 * [flip-card-front]...[/flip-card-front]
 *
 * @author Jim Barnes
 * @since 1.0.0
 *
 * @param array $attr The shortcode attributes
 * @param string $content The inner content
 *
 * @return string
 */
function sc_flip_card_front( $attr, $content='' ) {
	$attr['side'] = 'front';

	return flip_card_side( $attr, $content );
}

/**
 * Shortcode for the back card:
 *
 * [flip-card-back]...[/flip-card-back]
 *
 * @author Jim Barnes
 * @since 1.0.0
 *
 * @param array $attr The shortcode attributes
 * @param string $content The inner content
 *
 * @return string
 */
function sc_flip_card_back( $attr, $content='' ) {
	$attr['side'] = 'back';

	return flip_card_side( $attr, $content );
}
