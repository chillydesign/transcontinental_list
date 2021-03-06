<form action="<?php get_site_url(); ?>/actions/donation_new.php" method="post">

    <p>
        <label for="email">Votre adresse email *</label>
        <input type="email" required name="email" autocomplete='email' placeholder="Email" />
    </p>
    <p>
        <label for="first_name">Votre prénom *</label>
        <input type="text" required name="first_name" autocomplete='given-name' placeholder="Prénom" /
        ></p>
        <p>
            <label for="last_name">Votre nom *</label>
            <input type="text" required name="last_name" autocomplete='family-name' placeholder="Nom" />
        </p>
        <p>
            <label for="message">Message (optionnel)</label>
            <textarea name="message" placeholder="Message"></textarea>
        </p>
        <p id="amount_container">
            <label for="amount">Montant *</label>
            <input  required step="0.01"   min="0" max="10000" type="number" name="amount" id="amount"  /><span style="margin-top: 13px;">CHF</span>
        </p>

        <p>
            <label for="phone">Téléphone</label>
            <input type="text" autocomplete="tel"  name="phone"  name="phone" placeholder="Téléphone"   />
        </p>
        <p>
            <label for="address">Adresse</label>
            <textarea autocomplete="address-level1" name="address"  placeholder="Votre adresse "></textarea>
        </p>

        <?php if(has_valid_admin_cookie()): ?>
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
