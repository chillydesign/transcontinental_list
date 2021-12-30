<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
    <h1><?php t('listes_de_mariage_et_d_anniversaire'); ?></h1>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="half_block">
                <h2><?php t('creer_un_compte'); ?></h2>
                <p>Aimeriez-vous que vos proches vous offrent un voyage pour votre mariage, votre anniversaire ou une autre occasion? Inscrivez-vous sur <?php echo SITE_NAME; ?>, créez une ou plusieurs listes, et partagez-les avec vos proches, puis profitez de vos vacances de rêve!</p>
                <?php include('includes/new_user_form.php'); ?>
                <p><?php t('vous_avez_deja_un_compte'); ?> <a href="<?php echo site_url(); ?>/login"><?php t('connectez_vous_ici'); ?>.</a></p>
            </div>
        </div><!--  END OF COL-SM-6 -->


        <div class="col-sm-6">
            <div class="half_block">
                <h2><?php t('saisir_le_numero_de_la_liste'); ?></h2>
                <p>Si un de vos proches vous a communiqué le numéro de leur liste de mariage, d'anniversaire ou pour une autre occasion saisissez le ici pour faire une contribution.</p>
                <?php include('includes/list_search.php'); ?>
            </div>
        </div><!--  END OF COL-SM-6 -->

    </div><!--  END OF ROW -->
</div><!--  END OF CONTAINER -->