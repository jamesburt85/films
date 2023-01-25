<?php 
    $title   = $link['title'] ?? 'link';
    $url     = $link['url'] ?? '#';
    $target  = $link['target'] ?? '_self';
    // if ($target != '_blank') {
    //     $target = '_self';
    // }
?>

<a href="<?= $url;?>" <?php if ($target == '_blank') { echo 'rel="noreferrer"'; } ?> target="<?php echo $target; ?>" class=""><?= $title;?></a>
