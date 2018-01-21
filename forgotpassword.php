<div class="page_image" style="background-image:url('<?php echo get_site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
    <h1>Forgot your password?</h1>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php elseif ( has_success() ):  ?>
    <p class="success_message">An email has been sent to you with a link you can use to change your email</p>
    <?php endif; ?>

    <form action="<?php get_site_url(); ?>/actions/user_forgotpassword.php" method="post">

        <p><input type="text" name="email" placeholder="email" /></p>
        <p><input type="submit" name="user_forgotpassword" value="Reset" /></p>
    </form>

</div>
