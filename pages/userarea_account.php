<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">


    <?php $user = current_user(); ?>
    <?php if ($user): ?>
        <h1>Vos informations</h1>


        <?php if (has_error()) : ?>
            <?php show_error_message(); ?>
        <?php elseif (has_success()): ?>
            <p class="success_message">Vos informations ont été mises à jour.</p>
        <?php endif; ?>


        <div class="col-sm-6">
            <div class="half_block">

                <?php include('includes/edit_user_form.php'); ?>


            </div>
        </div>
        <div class="col-sm-6">

        </div>


    <?php endif; ?>
</div>
