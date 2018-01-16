<a href="<?php get_site_url(); ?>/adminarea/">Back to admin area</a>
<h1>New List</h1>


<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>

<?php include('includes/new_list_form.php'); ?>
