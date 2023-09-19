<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// ACF DUMP
$acf_fields = get_fields();

if (!empty($acf_fields)) {
    $role = $acf_fields['role'] ?? null;
	// echo "<pre>"; print_r($acf_fields); echo "</pre>";
	// $post_author		= $acf_fields['post_author'] ?? null;
}

?>
<article class="[ card ] [ flow ] [ flow--small ] fade-in-up">

    <div class="card--lower [ flow--small ]">

        <h2 class="entry-title body--large">
            <?php the_title(); ?>
        </h2>

        <div>
            <a href="<?php the_permalink(); ?>">
                More Details
            </a>
        </div>

    </div>

</article>
