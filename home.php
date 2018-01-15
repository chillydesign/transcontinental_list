<h1>Welcome</h1>

<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>


<h2>Find a list by its number</h2>

<form action="<?php get_site_url(); ?>/list" method="get">
    <p><input type="text" name="id" placeholder="list number" /></p>
    <p> <button type="submit">Search</button></p>
</form>
