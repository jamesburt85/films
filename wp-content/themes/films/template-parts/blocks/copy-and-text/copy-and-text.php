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
$title = get_field( 'title' ) ?? null;
$copy_and_text_blocks = get_field( 'copy_and_text_blocks' ) ?? null;
$extra_text = get_field( 'extra_text' ) ?? null;
$options    = get_field( 'options' );
$id         = get_field( 'id' ); 

// $copy_and_text_blocks = $block['data']['copy_and_text_blocks'] ?? null;
// echo "<pre>"; print_r($copy_and_text_blocks); echo "</pre>";

// Create id attribute allowing for custom "anchor" value.
// $id = 'copy_and_text-' . $block['id'];
// if ( ! empty($block['anchor'] ) ) {
//     $id = $block['anchor'];
// }

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-copy_and_text';
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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?><?php if($options){ echo ' '.implode(" ", $options); } ?>">
    
    <?php if (!empty($copy_and_text_blocks)) {
    ?>

        <div class="[ wrapper ] [ flow ]">
            
            <?php
                if ( $title ) {
            ?>
                    <h2 class="section-header">
                        <?php echo $title; ?>
                    </h2>
            <?php
                }
            ?>
            
            <div class="[ flow ]">
                
                <?php
                $i = 0;
                // echo "<pre>"; print_r($copy_and_text_blocks); echo "</pre>";
                foreach ($copy_and_text_blocks as $b) {
                    $copy         = $b['content_copy'] ?? null;
                    $image        = $b['image'] ?? null;
                    //$ctas      = $b['content_ctas_ctas_ctas'] ?? null;

                    $i++;
                    ?>
                        
                        <div class="copy-and-text--row fade-in-up">

                            <div class="[ side-by-side ]" <?php if ($i % 2 == 0) { echo 'data-state="reversed"'; } ?>>
                                <div class="copy-and-text--image">

                                    <?php
                                        if (!empty($image)) {
                                            $img = $image;
                                            //$imgModifiers = 'curved-corners overflow-hidden';
                                            include( get_template_directory() . '/template-parts/snippets/img.php');
                                        } else {
                                           include( get_template_directory() . '/template-parts/logic/default-img.php');
                                           include( get_template_directory() . '/template-parts/snippets/img.php');
                                        }
                                    ?>
                                    
                                </div>

                                <div class="copy-and-text--text big-padding-top-bottom flow--small">

                                    <?php if ( $copy ) : ?>
                                        <?php echo $copy; ?>
                                    <?php endif; ?>

                                    <?php if ( !empty($ctas) ) :
                                      foreach ($ctas as $link):
                                        $link = $link['cta'];
                                        $linkClasses = 'large';
                                        include( get_template_directory() . '/template-parts/snippets/link__button.php');
                                      endforeach;
                                    endif; ?>
                                </div>
                            </div>

                        </div>

                    <?php
                }
            ?>
            </div>                
            
        </div>

    <?php } ?>

    <?php if ( $extra_text ) { ?>
        <div class="wrapper">
            <div class="flow extra-text borders--top flex-center tiny medium">
                <div class="grid--half center">
                    <?php echo $extra_text; ?>
                </div>
            </div>
        </div>
    <?php } ?>

</div>