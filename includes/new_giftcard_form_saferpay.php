<form action="<?php get_site_url(); ?>/actions/giftcard_new_saferpay.php" method="post">
    <p>De la part de: </p>
    <p>
        <input required type="text" name="sender_first_name" placeholder="Votre prénom *">
    </p>
    <p>
        <input required type="text" name="sender_last_name" placeholder="Votre nom *">
    </p>
    <p>
        <input required type="email" name="sender_email" placeholder="Votre adresse email *">
    </p>

    <p>
        <input required type="text" name="sender_phone" placeholder="Votre téléphone *">
    </p>

    <p>
        <input required type="text" autocomplete="address-level1" id="sender_address" name="sender_address" placeholder="Votre adresse *" />
    </p>
    <p>
        <input required type="text" autocomplete="postal-code" id="sender_post_code" name="sender_post_code" placeholder="Code postal *" />
    </p>
    <p>
        <input required type="text" autocomplete="address-level2" id="sender_town" name="sender_town" placeholder="Ville *" />
    </p>
    <p>
        <input required type="text" autocomplete="country" id="sender_country" name="sender_country" placeholder="Pays *" />
    </p>



    <p>Pour: </p>
    <p>
        <input required type="text" name="receiver_first_name" placeholder="Prénom *">
    </p>
    <p>
        <input required type="text" name="receiver_last_name" placeholder="Nom *">
    </p>
    <p>
        <input required type="email" name="receiver_email" placeholder="Adresse email *">
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
        <label for="amount">Montant *</label>
        <input required step="0.01" min="0" max="1000" type="number" name="amount" placeholder="" id="amount" /><span style="margin-top: 13px;">CHF</span>
    </p>


    <p>
        <label for="accept_terms">
            <input required type="checkbox" name="accept_terms" id="accept_terms"> J'ai lu et accepté <a target="_blank" href="https://transcontinental.ch/conditions-generales/">les CGV</a> *
        </label>
    </p>

    <p>
        <input type="submit" id="submit_button" name="submit_new_giftcard" value="Offrir" />
    </p>
    <div id="spinner"></div>

    <p class="error_message" id="form_is_invalid">Veuillez remplir tous les champs obligatoires pour continuer.</p>
</form>