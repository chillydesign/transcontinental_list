<?php $list = get_list(); ?>


<a href="<?php get_site_url(); ?>/userarea/">Back to user area</a>
<?php if ($list): ?>
    <h2><?php echo $list->name; ?></h2>
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

            </li>
        <?php endforeach; ?>
    </ul>





<?php endif; ?>
