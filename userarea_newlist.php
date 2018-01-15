<h2>New List</h2>


<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>

<form action="<?php get_site_url(); ?>/actions/list_new.php" method="post">


    <p><input type="text" name="name" placeholder="name" /></p>
    <p><input type="text" name="description" placeholder="description" /></p>
    <p><input type="text" name="picture" placeholder="picture" /></p>
    <p> <input type="submit" name="submit_new_list" value="Submit" /></p>


</form>
