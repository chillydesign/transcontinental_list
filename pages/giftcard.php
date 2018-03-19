<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/giftcard.jpg'); overflow: hidden;"></div>
<div class="container">

<h1>Offrir un bon cadeau</h1>
<?php $pictures = find_pictures('giftcards'); ?>

<?php if (has_error()) : ?>
    <?php show_error_message(); ?>


<?php elseif (isset($_GET['giftcard_id'])  ) : ?>
    <?php $giftcard = get_giftcard(  $_GET['giftcard_id'] ); ?>
    <?php if (has_success()): ?>
        <?php if ($giftcard) : ?>
            <p class="success_message">Merci d'avoir offert ce bon cadeau d'une valeur de <?php echo convert_cents_to_currency($giftcard->amount); ?> pour <?php echo $giftcard->receiver_first_name; ?>.</p>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>


<div class="row">

    <div class="col-sm-6">
      <div class="half_block">

        <form action="<?php get_site_url(); ?>/actions/giftcard_new.php" method="post">
            <p>De la part de: </p>
            <p>
                <input type="text" name="sender_first_name" placeholder="Votre prénom">
            </p>
            <p>
                <input type="text" name="sender_last_name" placeholder="Votre nom">
            </p>
            <p>
                <input type="email" name="sender_email" required placeholder="Votre adresse email">
            </p>

            <p>
                <input type="text" name="sender_phone" required placeholder="Votre téléphone">
            </p>
            <p>
                <textarea  name="sender_address" required placeholder="Votre adresse "></textarea>
            </p>


            <p>Pour: </p>
            <p>
                <input type="text" name="receiver_first_name" placeholder="Prénom">
            </p>
            <p>
                <input type="text" name="receiver_last_name" placeholder="Nom">
            </p>
            <p>
                <input type="email" name="receiver_email" required  placeholder="Adresse email">
            </p>
            <p>
                <textarea name="message" placeholder="Message"></textarea>
            </p>
            <?php if (sizeof($pictures) > 0) : ?>
              <p><label>Image <br> <em>Choisissez une photo en cliquant dessus.</em></label></p>
              <div class="allfigs">
                    <?php foreach ($pictures as $picture) : ?>
                        <figure class="change_picture" data-picture="<?php echo $picture->id; ?>">
                            <img src="<?php echo $picture->url; ?>"  alt="Image <?php echo $picture->id; ?>" />
                            <!-- <figcaption>
                                Image <?php echo $picture->id; ?>
                            </figcaption> -->
                        </figure>
                    <?php endforeach; ?>
              </div>

                    <input type="hidden" value="<?php echo $pictures[0]->id; ?>" name="picture" id="picture" />

            <?php endif; ?>
            <p id="amount_container">
              <label for="amount">Montant</label>
              <input step="1" required  min="0" max="10000" type="number" name="amount" placeholder="" id="amount"  /><span style="margin-top: 13px;">CHF</span>
            </p>

            <p>
                <input type="submit"  id="submit_button"  name="submit_new_giftcard" value="Offrir" />
                <div id="spinner"></div>
            </p>

        </form>

    </div>
    </div>
    <div class="col-sm-6">



    </div>

</div>
</div>
