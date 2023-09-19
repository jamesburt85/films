<?php
/**
 * Block template file: contact.php
 *
 * Contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title     = get_field( 'title' ) ?? null;
$contact   = get_field( 'contact' ) ?? null;
$options   = get_field( 'options' );
$id        = get_field( 'id' );
//$page_colour  = get_field( 'page_colour' );

// Create id attribute allowing for custom "anchor" value.
// $id = 'contact-' . $block['id'];
// if ( ! empty($block['anchor'] ) ) {
//     $id = $block['anchor'];
// }

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-contact';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
    <?php echo '#' . $id; ?> {
        /* Add styles that use ACF values here */
    }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ wrapper ] [ flow--small ] <?php if($options){ echo ' '.implode(" ", $options); } ?>">

    <div class="flow--small fade-in-up">
        <?php if ( $title ) : ?>
            <h2 class="section-header">
                <?php echo $title; ?>
            </h2>
        <?php endif; ?>
    </div>

    <?php
        // if ( $post_type_to_show == 'kit') {
        //     get_template_part( 'template-parts/snippets/category-list--card' );
        // }
    ?>
    
    <div class="[ card-grid ] three-columns">

        <?php
            foreach ($contact as $c) {
                $img        = $c['image'];
                $title      = $c['title'];
                $subtitle   = $c['subtitle'];
                $phone      = $c['phone'];
                $email      = $c['email'];
                $address    = $c['address'];
                $map        = $c['map'];
        ?>
                <div class="flow--small fade-in-up">

                    <div class="flex-column flow--small">

                        <?php include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
                        
                        <div class="flow flex-column">

                            <div>
                                <h3 class="body--large highlighted">
                                    <?php echo $title; ?>
                                </h3>
                                <p class="tiny">
                                    <?php echo $subtitle; ?>
                                </p>
                            </div>
                            
                            <div>
                                <p class="body--large">
                                    <?php echo $phone; ?>
                                </p>
                                <a href="mailto:<?php echo $email; ?>" class="body--large">
                                    <?php echo $email; ?>
                                </a>    
                            </div>
                            
                            <div class="contact--address">
                                <p>
                                    <?php echo $address; ?>
                                </p>
                            </div>

                            <div class="contact--link">
                                <a href="<?php echo $map; ?>" target="_blank" title="Map link opens in a new tab">
                                    Map
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
        <?php
            }
        ?>

    </div>

</div>