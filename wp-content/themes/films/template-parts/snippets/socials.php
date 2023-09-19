<div class="socials">
  <?php
    if ( get_field('twitter_url', 'option') ) {
  ?>
      <a href="<?php the_field('twitter_url', 'option'); ?>" target="_blank" title="twitter link opens in new tab">
        <?php get_template_part('dist/svg_php/inline', 'icon-twitter.svg'); ?>
      </a>
  <?php
    }
  ?>

  <?php
    if ( get_field('facebook_url', 'option') ) {
  ?>
      <a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank" title="facebook link opens in new tab">
        <?php get_template_part('dist/svg_php/inline', 'icon-facebook.svg'); ?>
      </a>
  <?php
    }
  ?>

  <?php
    if ( get_field('instagram_url', 'option') ) {
  ?>
      <a href="<?php the_field('instagram_url', 'option'); ?>" target="_blank" title="Instagram link opens in new tab">
        <?php get_template_part('dist/svg_php/inline', 'icon-instagram.svg'); ?>
      </a>
  <?php
    }
  ?>

  <?php
    if ( get_field('linked_in_url', 'option') ) {
  ?>
      <a href="<?php the_field('linked_in_url', 'option'); ?>" target="_blank" title="Linked In link opens in new tab">
        <?php get_template_part('dist/svg_php/inline', 'icon-linkedin.svg'); ?>
      </a>
  <?php
    }
  ?>

</div>