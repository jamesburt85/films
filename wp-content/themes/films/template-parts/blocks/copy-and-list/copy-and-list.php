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
$column_one   = get_field( 'column_one' ) ?? null;
$column_two   = get_field( 'column_two' ) ?? null;
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

?>

<style type="text/css">
  <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
  }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="small-text block-copy-list wrapper <?php echo esc_attr( $classes ); ?>">
    
    <div class="<?php if($options){ echo ' '.implode(" ", $options); } ?> [ side-by-side ] fade-in-up">

        <?php if ( $column_one ) { ?>
            <div class="copy-column column-one [ flow ]">
                <?php echo $column_one; ?>
            </div>
        <?php } ?>

        <?php if ( $column_two ) { ?>
            <div class="copy-column copy-list column-two [ flow ]">
                
                <?php
                    $i = 1;
                    foreach ($column_two as $ct) {
                        $content = $ct['content'];
                    ?>

                    <div class="flex copy-list--item">
                        <div class="copy-list--item__number">
                            <?php if ( $options && in_array('downloads', $options) ) { ?>
                                
                                <div class="">
                                    <?php get_template_part('dist/svg_php/inline', 'icon-document.svg'); ?>
                                </div>

                            <?php } else { ?>
                                <span class="highlighted">
                                    <?php echo $i; ?>
                                </span>
                            <?php } ?>
                        </div>
                        <div class="highlighted">
                            <?php echo $content; ?>
                        </div>
                    </div>

                <?php
                    $i++;

                    }
                ?>
            </div>
        <?php } ?>

    </div>

</div>