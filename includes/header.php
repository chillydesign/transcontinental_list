<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Transcontintental</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="https://transcontinental.ch/wp-content/themes/transcontinental2/css/reset.css?ver=1.0"  rel="stylesheet" />
    <link href="https://transcontinental.ch/wp-content/themes/transcontinental2/style.css?v=<?php echo current_version(); ?>"  rel="stylesheet" />
    <link href="<?php get_site_url(); ?>/css/style.css?v=<?php echo current_version(); ?>"  rel="stylesheet" />
</head>
<body>



  <header class="header clear" id="header">
    <div class="container-fluid" >
    <div class="row">
      <div class="col-md-3"><a class="logo" href="https://transcontinental.ch/"><img src="https://transcontinental.ch/wp-content/themes/transcontinental2/img/logo.png" alt="" /></a></div>
      <div class="col-md-9">
        <nav id="nav" class="nav" role="navigation">
          <ul>
              <?php if (current_user() ): ?>
              <li><a href="<?php get_site_url(); ?>/giftcard">Bons cadeaux</a></li>
              <li><a href="<?php get_site_url(); ?>/userarea">Mes listes</a></li>
              <li><a href="<?php get_site_url(); ?>">Contribuer à une liste</a></li>
              <li> <a href="<?php get_site_url(); ?>/userarea/account">Compte</a></li>
              <li> <a href="<?php get_site_url(); ?>/actions/user_logout.php">Déconnexion</a></li>
              <?php elseif (has_valid_admin_cookie()): ?>
                <li><a href="<?php get_site_url(); ?>/adminarea/users?p=1">Clients</a></li>
                <li><a href="<?php get_site_url(); ?>/adminarea/lists?p=1">Listes</a></li>
                <li><a href="<?php get_site_url(); ?>/adminarea/giftcards?p=1">Bons cadeaux</a></li>
                <li> <a href="<?php get_site_url(); ?>/actions/user_logout.php">Déconnexion</a></li>
              <?php else: ?>
              <li><a href="<?php get_site_url(); ?>/giftcard">Bons cadeaux</a></li>
              <li><a href="<?php get_site_url(); ?>">Listes de mariage et d'anniversaire</a></li>
              <li><a href="<?php get_site_url(); ?>/login">Connexion</a></li>
              <?php endif; ?>
          </ul>
        </nav>
      </div>

    </div>
    </div>





  </header>
