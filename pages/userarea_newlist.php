<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
  <h1>Créer une liste</h1>
  <?php if (has_error()) : ?>
      <?php show_error_message(); ?>
  <?php endif; ?>
  <?php $pictures = find_pictures('lists'); ?>


  <div class="row">

      <div class="col-sm-6">
        <div class="half_block">
          <?php include('includes/new_list_form.php'); ?>
        </div>
      </div>
      <div class="col-sm-6">



      </div>
  </div>
</div>






<?php //include('includes/new_list_form.php'); ?>
