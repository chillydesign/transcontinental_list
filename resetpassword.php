<div class="page_image" style="background-image:url('<?php echo get_site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
    <h1>Reset your password?</h1>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php elseif ( has_success() ):  ?>
    <p class="success_message">Your password has been reset. Please log in. </p>
    <?php endif; ?>

    <?php $reset_code = get_var('subpage');  ?>
    <?php if ($reset_code) : ?>

    <form action="<?php get_site_url(); ?>/actions/user_resetpassword.php" method="post">

        <p><input type="password" name="password" placeholder="New password" /></p>
        <p><input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" /></p>
        <p><input type="submit" name="user_resetpassword" value="Submit" /></p>
        <input type="hidden" name="reset_code" value="<?php echo $reset_code; ?>" />
    </form>

<?php else: ?>

<?php endif; ?>

</div>
