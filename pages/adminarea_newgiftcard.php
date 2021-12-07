<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">


    <h1>Créer une new giftcard</h1>


    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>


    <div class="row">
        <div class="col-sm-6">
            <div class="half_block">
                <?php include('includes/new_giftcard_form_saferpay.php'); ?>

            </div>
        </div>
    </div>
</div>