<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Transcontintental</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="<?php get_site_url(); ?>/css/style.css?v=<?php echo current_version(); ?>"  rel="stylesheet" />
</head>
<body>

    <header>
        <div class="container">

            <nav>
                <ul>
                    <li><a href="<?php get_site_url(); ?>">Home</a></li>
                    <li><a href="<?php get_site_url(); ?>/giftcard">Buy a gift card</a></li>
                    <?php if (current_user() ): ?>
                    <li><a href="<?php get_site_url(); ?>/userarea">User area</a></li>
                    <li> <a href="<?php get_site_url(); ?>/actions/user_logout.php">Logout</a></li>
                    <?php else: ?>
                    <li><a href="<?php get_site_url(); ?>/login">Login</a></li>
                    <li><a href="<?php get_site_url(); ?>/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>


    <div class="container">
