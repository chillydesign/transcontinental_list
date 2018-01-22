<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
    <h1>Réinitialiser votre mot de passe</h1>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php elseif ( has_success() ):  ?>
    <p class="success_message">Nous vous avons envoyé un lien pour modifier votre mot de passe par email.</p>
    <?php endif; ?>

    <form action="<?php get_site_url(); ?>/actions/user_forgotpassword.php" method="post">

        <p><input type="text" name="email" placeholder="Email" /></p>
        <p><input type="submit" name="user_forgotpassword" value="Réinitialiser" /></p>
    </form>

</div>
