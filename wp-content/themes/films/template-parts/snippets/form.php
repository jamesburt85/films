<div class="form-content">
  <div class="form-content--inner-wrapper">

    <?php if(!empty($form_heading)):?>
      <div class="form-content--heading">
        <h3 class="block--form_heading"><?= $form_heading;?></h3> 
      </div>
    <?php endif;?>

    <div class="form-content--copy">
  
      <?php if(!empty($form_copy)):?>

          <div class="block--copy"><?= $form_copy;?></div>

      <?php endif;?>

    </div>

    <?php if( !empty($form_embed_code) ):?>
      <div id="myFrame" class="form-content--form <?php if($form_embed_type == 'webto'){ echo 'webtoform'; } ?>">
        <?php echo $form_embed_code; ?>
      </div> 
    <?php endif;?>
  </div>
</div>