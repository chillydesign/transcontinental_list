<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo THEME_DIRECTORY; ?>/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_DIRECTORY; ?>/img/favicon/favicon-16x16.png">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href="<?php echo THEME_DIRECTORY; ?>/css/reset.css?ver=<?php echo current_version(); ?>"  rel="stylesheet" />
    <link href="<?php echo THEME_DIRECTORY; ?>/style.css?v=<?php echo current_version(); ?>"  rel="stylesheet" />
    <link href="<?php get_site_url(); ?>/css/style.css?v=<?php echo current_version(); ?>"  rel="stylesheet" />
    <?php if (zenith_site()) : ?>
        <link href="<?php echo THEME_DIRECTORY; ?>/zenith.css?v=<?php echo current_version(); ?>"  rel="stylesheet" />
    <?php endif; ?>
</head>
<body>



  <header class="header clear" id="header">
    <div class="container-fluid" >
    <div class="row">
      <div class="col-md-3">
          <a class="logo" href="<?php site_homepage(); ?>">
             <?php  chilly_list_site_logo(); ?>
          </a>
      </div>
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
