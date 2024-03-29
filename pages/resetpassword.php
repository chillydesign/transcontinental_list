<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
    <h1><?php t('reinitialiser_votre_mot_de_passe'); ?></h1>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php elseif (has_success()) :  ?>
        <p class="success_message"><a href="<?php get_site_url(); ?>/login">Votre mot de passe a bien été réinitialisé. Veuillez vous connecter <strong style="color: black">ici</strong> pour continuer.</a></p>
    <?php endif; ?>

    <?php $reset_code = get_var('subpage');  ?>
    <?php if ($reset_code) : ?>

        <form action="<?php get_site_url(); ?>/actions/user_resetpassword.php" method="post">

            <p><input type="password" name="password" placeholder="<?php t('nouveau_mot_de_passe'); ?>" /></p>
            <p><input type="password" name="password_confirmation" placeholder="<?php t('confirmez_le_mot_de_passe'); ?>" /></p>
            <p><input type="submit" name="user_resetpassword" value="<?php t('envoyer'); ?>" /></p>
            <input type="hidden" name="reset_code" value="<?php echo $reset_code; ?>" />
        </form>

    <?php else : ?>

    <?php endif; ?>

</div>