<a href="<?php get_site_url(); ?>/adminarea/">Back to admin area</a>

<?php $list = get_list(); ?>
<?php if ($list): ?>
    <h1><?php echo $list->name; ?></h1>

    <p>The public list number is  <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php echo $list->list_number; ?></a></p>




    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>

    <?php include('includes/edit_list_form.php'); ?>

<?php endif; ?>
