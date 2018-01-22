<div class="page_image" style="background-image:url('<?php echo get_site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
  <h1>Listes de mariage et d'anniversaire</h1>

  <?php if (has_error()) : ?>
      <?php show_error_message(); ?>
  <?php endif; ?>

<div class="row">
  <div class="col-sm-6">
    <div class="half_block">
      <h2>Créer un compte</h2>
      <p>Aimeriez-vous que vos proches vous offrent un voyage pour votre mariage, votre anniversaire ou une autre occasion? Inscrivez-vous sur Transcontinental, créez une ou plusieurs listes, et partagez-les avec vos proches, puis profitez de vos vacances de rêve!</p>
      <?php include('includes/new_user_form.php'); ?>
      <p>Vous avez déjà un compte? <a href="<?php echo get_site_url(); ?>/login">Connectez-vous ici.</a></p>
    </div>
  </div>


  <div class="col-sm-6">
    <div class="half_block">
      <h2>Saisir le numéro de la liste</h2>
      <p>Si un de vos proches vous a communiqué le numéro de leur liste de mariage, d'anniversaire ou pour une autre occasion saisissez le ici pour faire une contribution.</p>
      <?php include('includes/list_search.php'); ?>
    </div>
  </div>

</div>
