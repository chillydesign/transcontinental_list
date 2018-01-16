<h1>Buy a giftcard</h1>
<?php $pictures = find_pictures('giftcards'); ?>

<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php elseif ( has_giftcard_cookie()) : ?>
    <?php $cookie = get_giftcard_cookie(); ?>
    <p>Thanks for buying the <?php echo $cookie->amount; ?> giftcard for  <?php echo $cookie->name; ?>.</p>
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
                <input type="text" name="sender_email" placeholder="Your email">
            </p>
            <p>
                <input type="text" name="receiver_first_name" placeholder="Their first name">
            </p>
            <p>
                <input type="text" name="receiver_last_name" placeholder="Their last name">
            </p>
            <p>
                <input type="text" name="receiver_email" placeholder="Their email">
            </p>
            <p>
                <textarea name="message" placeholder="Message"></textarea>
            </p>
            <?php if (sizeof($pictures) > 0) : ?>
                <p>
                    <select id="picture" name="picture">
                        <?php foreach ($pictures as $picture) : ?>
                            <option value="<?php echo $picture->id; ?>">Picture <?php echo $picture->id; ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
            <?php endif; ?>
            <p>
                <input type="text" name="amount" placeholder="Amount">
            </p>


            <p>
                <input type="submit" name="submit_new_giftcard" value="Submit" />
            </p>

        </form>

    </div>
    <div class="col-sm-6">

        <?php foreach ($pictures as $picture) : ?>
            <figure>
                <img src="<?php echo $picture->url; ?>"  alt="Picture <?php echo $picture->id; ?>" />
                <figcaption>
                    Picture <?php echo $picture->id; ?>
                </figcaption>
            </figure>
        <?php endforeach; ?>


    </div>

</div>
