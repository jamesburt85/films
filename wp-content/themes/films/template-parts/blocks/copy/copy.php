<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$header       = get_field( 'header' ) ?? null;
$column_one   = get_field( 'column_one' ) ?? null;
$column_two   = get_field( 'column_two' ) ?? null;
$column_three = get_field( 'column_three' ) ?? null;
$quote_name   = get_field( 'quote_name' ) ?? null;
$extra_text   = get_field( 'extra_text' ) ?? null;
$options      = get_field( 'options' );
$id           = get_field( 'id' ); 

// Create id attribute allowing for custom "anchor" value.
// $id = 'copy-' . $block['id'];
// if ( ! empty($block['anchor'] ) ) {
//     $id = $block['anchor'];
// }

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-copy';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
if ( ! empty( $orientation ) ) {
    $classes .= ' ' . $orientation;
}

?>

<style type="text/css">
  <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
  }
</style>

<div class="[ wrapper ]">
    <div id="<?php echo esc_attr( $id ); ?>" class="block-copy <?php //echo esc_attr( $classes ); ?><?php if($options){ echo ' '.implode(" ", $options); } ?>">

        <?php if ( $header ) { ?>
            <h2>
                <?php echo $header; ?>
            </h2>
            <br />
        <?php } ?>
        <div class="[ side-by-side ] flow">
            <?php if ( $column_one ) { ?>
                <div class="copy-column column-one [ flow ] fade-in-up">

                    <?php echo $column_one; ?>

                    <?php if ( $options && in_array('quote', $options) ) { ?>
                        <div class="quote--marks">
                            <?php get_template_part('dist/svg_php/inline', 'speech.svg'); ?>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>

            <?php if ( $column_two ) { ?>
                <div class="copy-column column-two [ flow ] fade-in-up">

                    <?php echo $column_two; ?>
                    
                    <?php if ( $quote_name ) { ?>
                        <div>
                            <span class="tiny medium">
                                <?php echo $quote_name; ?>
                            </span>
                        </div>
                    <?php } ?>
                    
                </div>
            <?php } ?>

            <?php if ( $column_three ) { ?>
                <div class="copy-column column-three [ flow ] fade-in-up">

                    <?php echo $column_three; ?>
                    
                    <?php if ( $quote_name ) { ?>
                        <div>
                            <span class="tiny medium">
                                <?php echo $quote_name; ?>
                            </span>
                        </div>
                    <?php } ?>
                    
                </div>
            <?php } ?>

        </div>

        <?php if ( $extra_text ) { ?>
            <br />
            
            <div class="flow extra-text tiny medium">
                <?php echo $extra_text; ?>
            </div>
            
        <?php } ?>
    </div>
</div>