<h1>Login</h1>


<?php if ( has_success() ):  ?>
<p>Registered sucesfully! Please now log in</p>
<?php endif; ?>

<form action="<?php get_site_url(); ?>/actions/user_connect.php" method="post">

    <p><input type="text" name="email" placeholder="email" /></p>
    <p><input type="password" name="password" placeholder="password" /></p>
    <p><input type="submit" name="connect_user" value="Submit" /></p>
</form>
