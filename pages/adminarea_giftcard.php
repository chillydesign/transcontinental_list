<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/giftcard.jpg'); overflow: hidden;"></div>
<div class="container">
<?php $giftcard = get_giftcard(); ?>
<?php if ($giftcard): ?>


    <div class="row">
      <div class="col-sm-3 col-sm-push-9">
        <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
      </div>
      <div class="col-sm-9 col-sm-pull-3">
            <h1>Giftcard #<?php echo $giftcard->id; ?></h1>
      </div>
    </div>

    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>


    <div class="row">

        <div class="col-sm-6">

            <ul>
                <li><strong>Sender:</strong> <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> ( <?php echo $giftcard->sender_email; ?>)</li>
                <li><strong>Receiver:</strong> <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?> ( <?php echo $giftcard->receiver_email; ?>)</li>
                <li><strong>Amount:</strong> <?php echo convert_cents_to_currency($giftcard->amount); ?></li>
                <li><strong>Date:</strong> <?php echo $giftcard->created_at; ?></li>
            </ul>



            <?php include('includes/edit_giftcard_form.php'); ?>


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



<?php endif; ?>
    </div>
