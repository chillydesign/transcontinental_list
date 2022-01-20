<?php $list = get_list(); ?>
<?php if ($list) : ?>

    <?php if (picture_exists($list->picture, 'lists')) : ?>
        <?php $picture =  get_picture_url($list->picture, 'lists'); ?>
    <?php else : ?>
        <?php $picture = get_site_url() . '/images/honeymoon.jpg'; ?>
    <?php endif; ?>

    <div class="page_image" style="background-image:url('<?php echo $picture; ?>'); overflow: hidden;"></div>
    <div class="container">


        <?php if ($list->status == 'active') : ?>
            <?php $donations = get_donations($list->id, 'payé'); ?>
            <h1><?php echo $list->name; ?></h1>
            <p class="infos_supp"><?php t('liste'); ?> #<?php echo $list->id; ?> <?php t('par'); ?> <?php echo $list->users_name; ?></p>

            <?php if (has_error()) : ?>
                <?php show_error_message(); ?>
            <?php elseif (isset($_GET['donation_id'])) : ?>
                <?php if (has_success()) : ?>
                    <?php $donation = get_donation($_GET['donation_id']); ?>
                    <?php if ($donation) : ?>
                        <div class="row">
                            <div class="col-sm-9">
                                <p class="success_message">Merci pour votre contribution d'un montant de <?php echo convert_cents_to_currency($donation->amount); ?>!</p>
                            </div>
                            <div class="col-sm-3">
                                <p><a href="<?php echo site_url(); ?>/" class="button"><?php t('retour'); ?></a></p>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>




            <div class="row">


                <div class="col-sm-6">
                    <?php if ($list->description != '') : ?>
                        <p><?php echo $list->description; ?></p>
                    <?php endif; ?>
                    <div class="half_block">
                        <h2><?php t('contribuer'); ?></h2>


                        <?php if (false) : ?>
                            <p>Jusqu'à présent <?php echo sum_donations($donations); ?> ont été contribués sur cette liste. </p>
                        <?php endif; ?>

                        <?php include('includes/new_donation_form_saferpay.php'); ?>


                        <?php if (list_has_expired($list)) : // if list has not expired 
                        ?>
                        <?php else : // end of if list has not expired 
                        ?>
                        <?php endif; // end of if list has  expired 
                        ?>




                    </div>
                </div>
            </div>

        <?php else : ?>

            <h1>Liste inactive</h1>
            <p>Cette liste n'est pas active à l'heure actuelle ou a expiré. Il n'est plus possible d'y contribuer, mais vous pouvez si vous le souhaitez envoyer un bon cadeau.</p>
            <p style="padding-bottom: 400px"><a href="<?php echo site_url(); ?>/boncadeau" class="button button_inline">Envoyer un bon cadeau</a></p>

        <?php endif; ?>




    </div>
<?php else : ?>
    <div class="page_image" style="background-image:url('<?php echo site_url() . '/images/honeymoon.jpg'; ?>'); overflow: hidden;"></div>
    <div class="container">
        <p>Ce numéro de correspond à aucune liste. Veuillez réessayer. </p>
    </div>
<?php endif; ?>