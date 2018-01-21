<div class="page_image" style="background-image:url('<?php echo get_site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
  <h1>Listes de mariage et d'anniversaire</h1>

  <?php if (has_error()) : ?>
      <?php show_error_message(); ?>
  <?php endif; ?>

<div class="row">
  <div class="col-sm-6">
    <div class="half_block">
      <h2>Connexion</h2>
      <p>Connectez-vous ici pour créer une liste ou accéder à vos listes existantes</p>
      <?php if (has_error()) : ?>
          <?php show_error_message(); ?>
      <?php elseif ( has_success() ):  ?>
      <p class="success_message">Votre compte a bien été créé! Veuillez vous connecter pour créer votre liste.</p>
      <?php endif; ?>

      <form action="<?php get_site_url(); ?>/actions/user_connect.php" method="post">

          <p><input type="text" name="email" placeholder="email" /></p>
          <p><input type="password" name="password" placeholder="mot de passe" /></p>
          <p><input type="submit" name="connect_user" value="Connexion" /></p>
      </form>
        <p>Pas encore de compte? <a href="<?php echo get_site_url(); ?>">Créez-le ici.</a>  <a href="<?php echo get_site_url(); ?>/forgotpassword">Forgot your password?</a>  </p>
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
