<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/giftcard.jpg'); overflow: hidden;"></div>
<div class="container">
<?php $giftcard = get_giftcard(); ?>
<?php send_giftcard_email($giftcard); ?>
<?php if ($giftcard): ?>


    <div class="row">
      <div class="col-sm-3 col-sm-push-9">
        <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
      </div>
      <div class="col-sm-9 col-sm-pull-3">
            <h1>Bon cadeau #<?php echo   $giftcard->number; ?></h1>
      </div>
    </div>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>


    <div class="row">

        <div class="col-sm-6">

            <?php if ($giftcard->expires_at  < date('Y-m-d')  ): ?>
                <p class="error_message">Ce bon cadeau est expiré.</p>
            <?php endif; ?>

            <ul>
                <li><strong>Pour:</strong> <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?> <br />
                    <strong>Email</strong>: ( <?php echo $giftcard->receiver_email; ?>) <br> <br> </li>
                <li><strong>De la part de:</strong> <?php echo $giftcard->sender_first_name ; ?> <?php echo $giftcard->sender_last_name; ?> <br />
                    <strong>Email</strong>: <?php echo $giftcard->sender_email; ?> <br />
                    <strong>Téléphone</strong>: <?php echo $giftcard->sender_phone; ?><br />
                    <strong>Adresse</strong>: <?php echo $giftcard->sender_address; ?> <br><br>

                </li>

                <li><strong>Montant:</strong> <?php echo convert_cents_to_currency($giftcard->amount); ?></li>
                <li><strong>Créé:</strong> <?php echo nice_datetime($giftcard->created_at); ?></li>
                <li><strong>Valide jusqu'au:</strong> <?php echo nice_date($giftcard->expires_at); ?></li>
            </ul>



            <?php include('includes/edit_giftcard_form.php'); ?>

            <p><a  class="areyousurelink"  href="<?php get_site_url(); ?>/actions/giftcard_delete.php?id=<?php echo  $giftcard->number; ?>">Supprimer</a></p>
        </div>




        <div class="col-sm-6">


            <figure>
                <?php if (picture_exists( $giftcard->picture, 'giftcards' )) : ?>
                    <img src="<?php echo get_picture_url($giftcard->picture, 'giftcards'); ?>" alt="Giftcard image" />
                <?php endif; ?>
                <figcaption><?php echo $giftcard->message; ?></figcaption>
            </figure>


        </div>
    </div>



<?php else: ?>
    <p>No giftcard with this id.</p>
<?php endif; ?>
    </div>
