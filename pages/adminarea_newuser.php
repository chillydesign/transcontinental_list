<h1>Register a new user</h1>


<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>


<?php include('includes/new_user_form.php'); ?>
