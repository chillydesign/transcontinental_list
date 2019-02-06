<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
    <?php $list_id = $_GET['list_id']; ?>
    <?php $list = get_list($list_id); ?>
    <?php if ($list): ?>
        <h1>Créer une new donation pour <a href="<?php echo site_url();?>/adminarea/list?id=<?php echo $list->id; ?>">list #<?php echo $list->id;?></a></h1>


        <?php if (has_error()) : ?>
            <?php show_error_message(); ?>
        <?php endif; ?>


        <div class="row">
            <div class="col-sm-6">
                <div class="half_block">
                    <?php include('includes/new_donation_form.php'); ?>

                </div>
            </div>
        </div>


    <?php endif;  # end if list ?>
</div>
