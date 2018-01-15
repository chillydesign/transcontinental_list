<h1>Login Admin</h1>

<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>
<form action="<?php get_site_url(); ?>/actions/admin_connect.php" method="post">

    <p><input type="text" name="email" placeholder="email" /></p>
    <p><input type="password" name="password" placeholder="password" /></p>
    <p><input type="submit" name="connect_admin" value="Submit" /></p>
</form>
