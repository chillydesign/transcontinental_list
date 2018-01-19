<?php $list = get_list(); ?>
<?php if ($list): ?>
    <?php if ($list->user_id == current_user()->id  ): ?>
        <h1><?php echo $list->name; ?></h1>

        <div class="row">

            <div class="col-sm-6">



                <p>Your list number is  <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php echo $list->list_number; ?></a></p>


                <?php if($list->description != ''): ?>
                    <p><?php echo $list->description; ?></p>
                <?php endif ; ?>

                <?php if (picture_exists( $list->picture, 'lists' )) : ?>
                    <figure>
                        <img src="<?php echo get_picture_url($list->picture, 'lists'); ?>" alt="Image for <?php $list->name; ?>" />
                    </figure>
                <?php endif; ?>


                <?php $donations = get_donations( $list->id, 'paid'  ); ?>
                <h2>List of donators</h2>
                <p>Total donations to this list: <?php  echo sum_donations($donations);  ?>.</p>
                <table>
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donations as $donation) : ?>
                            <tr>
                                <td><strong><?php echo $donation->first_name;?> <?php echo $donation->last_name;?> (<?php echo timeAgoInWords($donation->created_at);?>)</strong><br/>
                                    <em><?php echo $donation->message;?></em>
                                </br/></td>
                                <td><?php echo  convert_cents_to_currency($donation->amount); ?></td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>




            </div>
            <div class="col-sm-6">

                <?php if (has_error()) : ?>
                    <?php show_error_message(); ?>
                <?php endif; ?>
                <h2>Edit list</h2>
                <?php include('includes/edit_list_form.php'); ?>

            </div>
        </div>


    <?php endif; // dont allow other users to see this list ?>
<?php else: ?>
    <p>Sorry, no list found. </p>
<?php endif; ?>
