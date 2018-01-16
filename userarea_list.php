<a href="<?php get_site_url(); ?>/userarea/">Back to user area</a>

<?php $list = get_list(); ?>
<?php if ($list): ?>
    <?php if ($list->user_id == current_user()->id  ): ?>
        <h1><?php echo $list->name; ?></h1>
        <p>Your list number is  <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php echo $list->list_number; ?></a></p>


        <?php if($list->description != ''): ?>
            <p><?php echo $list->description; ?></p>
        <?php endif ; ?>


        <?php $donations = get_donations( $list->id  ); ?>
        <h2>List of donators</h2>
        <p>Total donations to this list: <?php  echo sum_donations($donations);  ?>.</p>
        <ul>
            <?php foreach (  $donations as $donation) : ?>
                <li>
                    <strong><?php echo $donation->first_name; ?></strong> donated <?php echo convert_cents_to_currency($donation->amount); ?> on <?php  echo $list->created_at; ?>
                    <blockquote><?php echo $donation->message ?></blockquote>

                </li>
            <?php endforeach; ?>
        </ul>



        <?php if (has_error()) : ?>
            <?php show_error_message(); ?>
        <?php endif; ?>
        <h2>Edit list</h2>
        <?php include('includes/edit_list_form.php'); ?>

    <?php endif; // dont allow other users to see this list ?>
<?php endif; ?>
