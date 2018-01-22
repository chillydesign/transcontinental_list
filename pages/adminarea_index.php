


<h1>Admin area</h1>


<div class="row">
    <div class="col-sm-4">

        <h2>Users</h2>
        <ul>
            <?php foreach (  get_users() as $user) : ?>
                <li>
                    <a href="<?php get_site_url(); ?>/adminarea/user?id=<?php echo $user->id; ?>">
                        <strong><?php echo $user->first_name . ' ' . $user->last_name; ?></strong></a>
                        <br> Created <?php echo timeAgoInWords($user->created_at); ?>

                </li>
            <?php endforeach; ?>

            <li><a class="tc_button" href="<?php get_site_url(); ?>/adminarea/newuser">Register a new user</a></li>
        </ul>



    </div>
    <div class="col-sm-4">

        <h2>Lists</h2>

        <ul>
            <?php foreach ( get_lists() as $list) : ?>
                <li>
                    <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                        <strong><?php echo $list->name; ?> by <?php echo $list->first_name; ?> <?php echo $list->last_name; ?> </strong></a>
                        <br> Created  <?php echo timeAgoInWords($list->created_at); ?>


                </li>
            <?php endforeach; ?>

            <li><a class="tc_button"  href="<?php get_site_url(); ?>/adminarea/newlist">Create a new list</a></li>
        </ul>

        <?php include('includes/list_search.php'); ?>



    </div>
    <div class="col-sm-4">

        <h2>Giftcards</h2>
        <ul>
            <?php foreach ( get_giftcards() as $giftcard) : ?>
                <li>
                    <a href="<?php get_site_url(); ?>/adminarea/giftcard?id=<?php echo  convert_giftcard_id($giftcard->id); ?>">
                        <strong><?php echo convert_cents_to_currency($giftcard->amount); ?> from <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> to  <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?></strong></a>
                        <br /> Created <?php echo timeAgoInWords($giftcard->created_at); ?>


                </li>
            <?php endforeach; ?>
        </ul>



    </div>
</div>
