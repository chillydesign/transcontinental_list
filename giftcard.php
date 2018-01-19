<h1>Buy a giftcard</h1>
<?php $pictures = find_pictures('giftcards'); ?>

<?php if (has_error()) : ?>
    <?php show_error_message(); ?>


<?php elseif (isset($_GET['giftcard_id'])  ) : ?>
    <?php $giftcard = get_giftcard(  $_GET['giftcard_id'] ); ?>
    <?php if (has_success()): ?>
        <?php if ($giftcard) : ?>
            <p class="success_message">Thanks for buying the <?php echo convert_cents_to_currency($giftcard->amount); ?> giftcard for  <?php echo $giftcard->receiver_first_name; ?>.</p>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>


<div class="row">

    <div class="col-sm-6">

        <form action="<?php get_site_url(); ?>/actions/giftcard_new.php" method="post">

            <p>
                <input type="text" name="sender_first_name" placeholder="Your first name">
            </p>
            <p>
                <input type="text" name="sender_last_name" placeholder="Your last name">
            </p>
            <p>
                <input type="email" name="sender_email" required placeholder="Your email">
            </p>
            <p>
                <input type="text" name="receiver_first_name" placeholder="Their first name">
            </p>
            <p>
                <input type="text" name="receiver_last_name" placeholder="Their last name">
            </p>
            <p>
                <input type="email" name="receiver_email" required  placeholder="Their email">
            </p>
            <p>
                <textarea name="message" placeholder="Message"></textarea>
            </p>
            <?php if (sizeof($pictures) > 0) : ?>
                    <?php foreach ($pictures as $picture) : ?>
                        <figure class="change_picture" data-picture="<?php echo $picture->id; ?>">
                            <img src="<?php echo $picture->url; ?>"  alt="Picture <?php echo $picture->id; ?>" />
                            <figcaption>
                                Picture <?php echo $picture->id; ?>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>

                    <input type="hidden" value="<?php echo $pictures[0]->id; ?>" name="picture" id="picture" />

            <?php endif; ?>
            <p id="amount_container"><input step="1" required  min="0" max="10000" type="number" name="amount" placeholder="amount" id="amount"  /><span>CHF</span></p>

            <p>
                <input type="submit"  id="submit_button"  name="submit_new_giftcard" value="Submit" />
                <div id="spinner"></div>
            </p>

        </form>

    </div>
    <div class="col-sm-6">



    </div>

</div>
