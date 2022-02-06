<form action="<?php get_site_url(); ?>/actions/donation_new.php" method="post">

    <p>
        <label for="email">Votre adresse email *</label>
        <input type="email" required name="email" autocomplete='email' placeholder="Email" />
    </p>
    <p>
        <label for="first_name">Votre prénom *</label>
        <input type="text" required name="first_name" autocomplete='given-name' placeholder="<?php t('prenom'); ?> *" />
    </p>
    <p>
        <label for="last_name">Votre nom *</label>
        <input type="text" required name="last_name" autocomplete='family-name' placeholder="<?php t('nom'); ?> *" />
    </p>
    <p>
        <label for="message">Message (optionnel)</label>
        <textarea name="message" placeholder="Message"></textarea>
    </p>
    <p id="amount_container">
        <label for="amount">Montant *</label>
        <input required step="0.01" min="0" max="10000" type="number" name="amount" id="amount" /><span class="currency_symbol">CHF</span>
    </p>

    <p>
        <label for="phone">Téléphone</label>
        <input type="text" autocomplete="tel" name="phone" name="phone" placeholder="Téléphone" />
    </p>


    <p>
        <label for="address">Adresse</label>
        <input type="text" autocomplete="address-level1" id="address" name="address" placeholder="Votre adresse" />
    </p>
    <p>
        <label for="post_code">Code postal</label>
        <input type="text" autocomplete="postal-code" id="post_code" name="post_code" placeholder="Code postal" />
    </p>
    <p>
        <label for="town">Ville</label>
        <input type="text" autocomplete="address-level2" id="town" name="town" placeholder="Ville" />
    </p>
    <p>
        <label for="country">Pays</label>
        <input type="text" autocomplete="country" id="country" name="country" placeholder="Pays" />
    </p>

    <?php if (has_valid_admin_cookie()) : ?>
        <p>
            <label for="status">Statut </label>
            <select id="status" name="status">
                <option value="créé">créé</option>
                <option value="payé">payé</option>
                <option value="annulé">annulé</option>
            </select>
        </p>
    <?php endif; ?>

    <p>
        <input type="submit" id="submit_button" name="submit_new_donation" value="Envoyer" />
        <input type="hidden" name="list_id" value="<?php echo $list->id; ?>" />
    <div id="spinner"></div>

    </p>

</form>