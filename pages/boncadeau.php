<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/giftcard.jpg'); overflow: hidden;"></div>
<div class="container">

    <h1><?php t('offrir_un_bon_cadeau'); ?></h1>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>


    <?php elseif (isset($_GET['giftcard_id'])) : ?>
        <?php $giftcard = get_giftcard($_GET['giftcard_id']); ?>
        <?php if (has_success()) : ?>
            <?php if ($giftcard) : ?>
                <div class="row">
                    <div class="col-sm-9">
                        <p class="success_message">Merci d'avoir offert ce bon cadeau d'une valeur de <?php echo convert_cents_to_currency($giftcard->amount); ?> pour <?php echo $giftcard->receiver_first_name; ?>. <a target="_blank" href="<?php echo  giftcard_print_url($giftcard); ?>"><?php t('Imprimer le bon cadeau'); ?>.</a> </p>
                    </div>
                    <div class="col-sm-3">
                        <p><a href="<?php echo site_url(); ?>/" class="button"><?php t('Retour'); ?></a></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>


    <div class="row">

        <div class="col-sm-6">
            <div class="half_block">

                <?php include('includes/new_giftcard_form_saferpay.php'); ?>
            </div>
        </div>
        <div class="col-sm-6">



        </div>

    </div>
</div>