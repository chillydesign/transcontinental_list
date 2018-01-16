<?php $list = get_list(); ?>


<?php if ($list): ?>
    <?php if ($list->status == 'active') : ?>
        <?php $donations = get_donations( $list->id  ); ?>
        <h1><?php echo $list->name; ?> (List #<?php echo $list->list_number; ?>)</h1>


        <div class="row">

            <div class="col-sm-6">

                <p>List made by <?php echo $list->users_name; ?></p>

                <?php if($list->description != ''): ?>
                    <p><?php echo $list->description; ?></p>
                <?php endif ; ?>

                <?php if (picture_exists( $list->picture, 'lists' )) : ?>
                    <figure>
                        <img src="<?php echo get_picture_url($list->picture, 'lists'); ?>" alt="Image for <?php $list->name; ?>" />
                    </figure>
                <?php endif; ?>


            </div>
            <div class="col-sm-6">
                <h2>Donate now</h2>
                <p>So far this list has had <?php echo sum_donations($donations); ?> donated to it. </p>
                <?php if (has_error()) : ?>
                    <?php show_error_message(); ?>
                <?php elseif ( has_success() ):  ?>
                    <p>Thanks for the donation!</p>
                <?php endif; ?>
                <form action="<?php get_site_url(); ?>/actions/donation_new.php" method="post">

                    <p><input type="text" name="email" placeholder="email" /></p>
                    <p><input type="text" name="first_name" placeholder="first name" /></p>
                    <p><input type="text" name="last_name" placeholder="last name" /></p>
                    <p><textarea name="message" placeholder="message"></textarea></p>
                    <p><input type="text" name="amount" placeholder="amount" /></p>
                    <p>
                        <input type="submit" name="submit_new_donation" value="Submit" />
                        <input type="hidden" name="list_id" value="<?php echo $list->list_number; ?>" />
                    </p>

                </form>


            </div>
        </div>




    <?php else: ?>
        <p>Sorry. This list is currently inactive. </p>
    <?php endif; ?>
<?php else: ?>
    <p>Sorry. No list matches this number. </p>
<?php endif; ?>
