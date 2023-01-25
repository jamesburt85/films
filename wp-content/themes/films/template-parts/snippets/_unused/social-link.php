<?php 

    $title   = $link['title'];
    $url     = $link['url'];
    $target  = $link['target'];

    $social_channel = $social_icon;

    if ($social_channel == 'linkedin') {
        $s = 'linkedin';
    } elseif ($social_channel == 'twitter') {
        $s = 'twitter';
    } elseif ($social_channel == 'instagram') {
        $s = 'insta';
    } elseif ($social_channel == 'youtube') {
        $s = 'youtube';
    } elseif ($social_channel == 'facebook') {
        $s = 'facebook';
    }

    ?>
    <a href="<?= $url;?>" target="<?= $target;?>" class="button">
        <?php get_template_part('svg/inline', 'icon-'.$s.'.svg'); ?>
    </a>
