<?php 
    $title   = $link['title'];
    $url     = $link['url'];
    $target  = $link['target'] ?? null;
    if ($target != '_blank') {
        $target = '_self';
    }

    if (empty($linkClasses)) {
        $linkClasses = '';
    }

    if( strpos( $url, "#" ) === false ) {
        // no hash (arrow)
        $linkClasses .= ' button__page-link';
        $svgName = 'arrow-right';
    } else {
        // has hash (down chevron)
        $linkClasses .= ' button__anchor-link';
        $svgName = 'chevron-down';
    };

?>

<a href="<?= $url;?>" <?php if ($target == '_blank') { echo 'rel="noreferrer"'; } ?> target="<?php echo $target;?>" class="button <?php echo $linkClasses; ?>">
    <?= $title;?>
    <?php get_template_part('dist/svg_php/inline', 'icon-'.$svgName.'.svg'); ?>
</a>
