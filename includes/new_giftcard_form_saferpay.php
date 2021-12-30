<form action="<?php get_site_url(); ?>/actions/giftcard_new_saferpay.php" method="post">
    <p><?php t('de_la_part_de'); ?> : </p>
    <p>
        <input required type="text" name="sender_first_name" placeholder="<?php t('votre_prenom'); ?> *">
    </p>
    <p>
        <input required type="text" name="sender_last_name" placeholder="<?php t('votre_nom'); ?> *">
    </p>
    <p>
        <input required type="email" name="sender_email" placeholder="<?php t('votre_adresse_email'); ?> *">
    </p>

    <p>
        <input required type="text" name="sender_phone" placeholder="<?php t('votre_telephone'); ?> *">
    </p>

    <p>
        <input required type="text" autocomplete="address-level1" id="sender_address" name="sender_address" placeholder="<?php t('votre_adresse'); ?> *">
    </p>
    <p>
        <input required type="text" autocomplete="postal-code" id="sender_post_code" name="sender_post_code" placeholder="<?php t('code_postal'); ?>  *" />
    </p>
    <p>
        <input required type="text" autocomplete="address-level2" id="sender_town" name="sender_town" placeholder="<?php t('ville'); ?> *" />
    </p>
    <p>
        <input required type="text" autocomplete="country" id="sender_country" name="sender_country" placeholder="<?php t('pays'); ?> *" />
    </p>



    <p><?php t('pour'); ?>: </p>
    <p>
        <input required type="text" name="receiver_first_name" placeholder="<?php t('prenom'); ?> *">
    </p>
    <p>
        <input required type="text" name="receiver_last_name" placeholder="<?php t('nom'); ?> *">
    </p>
    <p>
        <input required type="email" name="receiver_email" placeholder="<?php t('adresse_email'); ?> *">
    </p>
    <p>
        <textarea name="message" placeholder="<?php t('message_bon_cadeau'); ?>"></textarea>
    </p>
    <?php $pictures = find_pictures('giftcards'); ?>
    <?php if (sizeof($pictures) > 0) : ?>
        <p><label><?php t('image'); ?> <br> <em><?php t('choisissez_une_photo_en_cliquant_dessus'); ?>.</em></label></p>
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
        <label for="amount"><?php t('montant'); ?> *</label>
        <input required step="0.01" min="0" max="1000" type="number" name="amount" placeholder="" id="amount" /><span style="margin-top: 13px;">CHF</span>
    </p>


    <p>
        <label for="accept_terms">
            <input required type="checkbox" name="accept_terms" id="accept_terms"> <?php t('j_ai_lu_et_accepte'); ?> <a target="_blank" href="https://transcontinental.ch/conditions-generales/"><?php t('les_cgv'); ?></a> *
        </label>
    </p>

    <p>
        <input type="submit" id="submit_button" name="submit_new_giftcard" value="<?php t('offrir'); ?>" />
    </p>
    <div id="spinner"></div>

    <p class="error_message" id="form_is_invalid"><?php t('Veuillez remplir tous les champs obligatoires pour continuer'); ?>.</p>
</form>