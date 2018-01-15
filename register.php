<h1>Register</h1>


<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>

<form action="<?php get_site_url(); ?>/actions/user_new.php" method="post">


    <p><input type="text" name="email" placeholder="email" /></p>
    <p><input type="text" name="first_name" placeholder="first name" /></p>
    <p><input type="text" name="last_name" placeholder="last name" /></p>
    <p><input type="password" name="password" placeholder="password" /></p>
    <p><input type="password" name="password_confirmation" placeholder="password confirmation" /></p>
    <p> <input type="submit" name="submit_new_user" value="Submit" /></p>


</form>
