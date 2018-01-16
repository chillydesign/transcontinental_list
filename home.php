<h1>Welcome</h1>

<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>


<h2>Find a list by its number</h2>
<?php include('includes/list_search.php'); ?>
