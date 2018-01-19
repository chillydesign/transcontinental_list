<?php $list = get_list(); ?>
<?php if ($list): ?>
    <h1><?php echo $list->name; ?></h1>

<div class="row">

    <div class="col-sm-6">

        <p>List made by <a  href="<?php get_site_url(); ?>/adminarea/user?id=<?php echo $list->user_id; ?>"><?php echo $list->users_name; ?></a></p>


        <p>The public list number is  <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php echo $list->list_number; ?></a></p>


            <?php $donations = get_donations( $list->id  ); ?>

            <table>
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donations as $donation) : ?>
                        <tr>
                            <td><?php echo $donation->first_name;?> <?php echo $donation->last_name;?></td>
                            <td><?php echo  convert_cents_to_currency($donation->amount); ?></td>
                            <td><?php echo $donation->status;?></td>
                            <td><?php echo timeAgoInWords($donation->created_at);?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>





    </div>

    <div class="col-sm-6">

            <?php if (has_error()) : ?>
                <?php show_error_message(); ?>
            <?php endif; ?>

            <?php include('includes/edit_list_form.php'); ?>

    </div>
</div>




<?php endif; ?>
