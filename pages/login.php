<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
  <h1><?php t('listes_de_mariage_et_d_anniversaire'); ?></h1>

  <?php if (has_error()) : ?>
    <?php show_error_message(); ?>
  <?php elseif (has_success()) :  ?>
    <p class="success_message">Votre compte a bien été créé! Veuillez vous connecter pour créer votre liste.</p>
  <?php endif; ?>

  <div class="row">
    <div class="col-sm-6">
      <div class="half_block">
        <h2><?php t('connexion'); ?></h2>
        <p>Connectez-vous ici pour créer une liste ou accéder à vos listes existantes</p>

        <form action="<?php get_site_url(); ?>/actions/user_connect.php" method="post">

          <p><input autocomplete="email" type="text" name="email" placeholder="email" /></p>
          <p><input autocomplete="current-password" type="password" name="password" placeholder="mot de passe" /></p>
          <p><input type="submit" name="connect_user" value="Connexion" /></p>
        </form>

        <p><?php t('pas_encore_de_compte'); ?> <a href="<?php echo site_url(); ?>"><?php t('crez_le_ici'); ?>.</a> <a href="<?php echo site_url(); ?>/forgotpassword"><?php t('mot_de_passe_oublie'); ?></a> </p>
      </div>
    </div>


    <div class="col-sm-6">
      <div class="half_block">
        <h2><?php t('saisir_le_numero_de_la_liste'); ?></h2>
        <p><?php t('si_un_de_vos_proches'); ?></p>
        <?php include('includes/list_search.php'); ?>
      </div>
    </div>

  </div>