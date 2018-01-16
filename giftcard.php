<h1>Buy a giftcard</h1>


<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php elseif ( has_giftcard_cookie()) : ?>
    <?php $cookie = get_giftcard_cookie(); ?>
    <p>Thanks for buying the <?php echo $cookie->amount; ?> giftcard for  <?php echo $cookie->name; ?>.</p>
<?php endif; ?>
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
    <p>
        <select id="picture" name="picture">
            <option value="1">Picture 1</option>
            <option value="2">Picture 2</option>
            <option value="3">Picture 3</option>
        </select>
    </p>
    <p>
        <input type="text" name="amount" placeholder="Amount">
    </p>


    <p>
        <input type="submit" name="submit_new_giftcard" value="Submit" />
    </p>


</form>
