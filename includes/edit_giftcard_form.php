<?php global $giftcard; ?>


<?php if ($giftcard) : ?>

    <form action="<?php get_site_url(); ?>/actions/giftcard_edit.php?id=<?php echo convert_giftcard_id($giftcard->id); ?>" method="post">

        <?php $disabled =  ($giftcard->status === 'utilisé') ? 'disabled' : ''; ?>


        <?php if(has_valid_admin_cookie()): ?>
             <p>
                <select  <?php // echo $disabled; ?> id="status" name="status">
                    <?php foreach   ( valid_giftcard_statuses() as $status_text) : ?>
                        <?php $selected = ( $status_text == $giftcard->status ) ? 'selected="selected"'  : '' ; ?>
                        <option <?php echo $selected; ?>   value="<?php echo $status_text; ?>">
                            <?php echo $status_text; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <input type="submit" name="submit_edit_giftcard" value="Modifier" />
            </p>
        <?php endif; ?>

    </form>

<?php endif; ?>
