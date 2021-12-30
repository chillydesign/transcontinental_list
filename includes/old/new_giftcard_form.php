<form action="<?php get_site_url(); ?>/actions/giftcard_new.php" method="post">
    <p>De la part de: </p>
    <p>
        <input type="text" name="sender_first_name" placeholder="<?php t('votre_prenom'); ?>">
    </p>
    <p>
        <input type="text" name="sender_last_name" placeholder="<?php t('votre_nom'); ?> ">
    </p>
    <p>
        <input type="email" name="sender_email" required placeholder="<?php t('votre_adresse_email'); ?> *">
    </p>

    <p>
        <input type="text" name="sender_phone" requiredplaceholder="<?php t('votre_telephone'); ?> *">
    </p>
    <p>
        <input type="text" autocomplete="address-level1" id="sender_address" name="sender_address" placeholder="<?php t('votre_adresse'); ?> *">
    </p>
    <p>
        <input type="text" autocomplete="postal-code" id="sender_post_code" name="sender_post_code" placeholder="Code postal" />
    </p>
    <p>
        <input type="text" autocomplete="address-level2" id="sender_town" name="sender_town" placeholder="Ville" />
    </p>
    <p>
        <input type="text" autocomplete="country" id="sender_country" name="sender_country" placeholder="Pays" />
    </p>


    <p>Pour: </p>
    <p>
        <input type="text" name="receiver_first_name" placeholder="<?php t('prenom'); ?> *">>
    </p>
    <p>
        <input type="text" name="receiver_last_name" placeholder="<?php t('nom'); ?> *">>
    </p>
    <p>
        <input type="email" name="receiver_email" required placeholder="Adresse email">
    </p>
    <p>
        <textarea name="message" placeholder="Message"></textarea>
    </p>
    <?php $pictures = find_pictures('giftcards'); ?>
    <?php if (sizeof($pictures) > 0) : ?>
        <p><label>Image <br> <em>Choisissez une photo en cliquant dessus.</em></label></p>
        <div class="allfigs">
            <?php foreach ($pictures as $picture) : ?>
                <figure class="change_picture" data-picture="<?php echo $picture->id; ?>">
                    <img src="<?php echo $picture->url; ?>" alt="Image <?php echo $picture->id; ?>" />
                    <!-- <figcaption>
                        Image <?php echo $picture->id; ?>
                    </figcaption> -->
                </figure>
            <?php endforeach; ?>
        </div>

        <input type="hidden" value="<?php echo $pictures[0]->id; ?>" name="picture" id="picture" />

    <?php endif; ?>
    <p id="amount_container">
        <label for="amount">Montant (maximum 1000 CHF)*</label>
        <input required step="0.01" min="0" max="1000" type="number" name="amount" placeholder="" id="amount" /><span style="margin-top: 13px;">CHF</span>
    </p>

    <p>
        <input type="submit" id="submit_button" name="submit_new_giftcard" value="Offrir" />
    <div id="spinner"></div>
    </p>

</form>