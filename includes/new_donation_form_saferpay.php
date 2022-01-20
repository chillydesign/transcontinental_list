<form id="saferpay_donation_form" action="<?php get_site_url(); ?>/actions/donation_new_saferpay.php" method="post">

    <p>
        <label for="email"><?php t('votre_adresse_email'); ?> *</label>
        <input type="email" required name="email" autocomplete='email' placeholder="<?php t('adresse_email'); ?> *">
    </p>
    <p>
        <label for="first_name"><?php t('votre_prenom'); ?> *</label>
        <input type="text" required name="first_name" autocomplete='given-name' placeholder="<?php t('prenom'); ?> *">
    </p>
    <p>
        <label for="last_name"><?php t('votre_nom'); ?> *</label>
        <input type="text" required name="last_name" autocomplete='family-name' placeholder="<?php t('nom'); ?> *">
    </p>
    <p>
        <label for="message"><?php t('message'); ?> (<?php t('optionnel'); ?>)</label>
        <textarea name="message" placeholder="<?php t('message'); ?>"></textarea>
    </p>
    <p id="amount_container">
        <label for="amount"><?php t('montant'); ?> *</label>
        <input required step="0.01" min="0" max="1000" type="number" name="amount" id="amount" /><span style="margin-top: 13px;">CHF</span>
    </p>

    <p>
        <label for="phone"><?php t('telephone'); ?></label>
        <input type="text" autocomplete="tel" id="phone" name="phone" placeholder="<?php t('telephone'); ?>" />
    </p>
    <p>
        <label for="address"><?php t('votre_adresse'); ?> *</label>
        <input required type="text" autocomplete="address-level1" id="address" name="address" placeholder="<?php t('votre_adresse'); ?>" />
    </p>
    <p>
        <label for="post_code"><?php t('code_postal'); ?> *</label>
        <input required type="text" autocomplete="postal-code" id="post_code" name="post_code" placeholder="<?php t('code_postal'); ?>" />
    </p>
    <p>
        <label for="town"><?php t('ville'); ?> *</label>
        <input required type="text" autocomplete="address-level2" id="town" name="town" placeholder="<?php t('ville'); ?>" />
    </p>
    <p>
        <label for="country"><?php t('pays'); ?> *</label>
        <input required type="text" autocomplete="country" id="country" name="country" placeholder="<?php t('pays'); ?>" />
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
        <label for="accept_terms">
            <input required type="checkbox" name="accept_terms" id="accept_terms"> <?php t('j_ai_lu_et_accepte'); ?> <a target="_blank" href="https://transcontinental.ch/conditions-generales/"><?php t('les_cgv'); ?></a> *
        </label>
    </p>

    <p>
        <input type="submit" id="submit_button" name="submit_new_donation" value="<?php t('envoyer'); ?>" />
        <input type="hidden" name="list_id" value="<?php echo $list->id; ?>" />
    </p>
    <div id="spinner"></div>
    <p class="error_message" id="form_is_invalid">Veuillez remplir tous les champs obligatoires pour continuer.</p>
</form>