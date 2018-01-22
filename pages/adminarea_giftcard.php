<?php $giftcard = get_giftcard(); ?>
<?php if ($giftcard): ?>
    <h1>Giftcard #<?php echo $giftcard->id; ?></h1>

    <div class="row">

        <div class="col-sm-6">

            <ul>
                <li><strong>Sender:</strong> <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> ( <?php echo $giftcard->sender_email; ?>)</li>
                <li><strong>Receiver:</strong> <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?> ( <?php echo $giftcard->receiver_email; ?>)</li>
                <li><strong>Amount:</strong> <?php echo convert_cents_to_currency($giftcard->amount); ?></li>
                <li><strong>Status:</strong> <?php echo $giftcard->status; ?></li>
                <li><strong>Date:</strong> <?php echo $giftcard->created_at; ?></li>
            </ul>
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
