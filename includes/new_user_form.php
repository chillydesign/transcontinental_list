<form action="<?php get_site_url(); ?>/actions/user_new.php" method="post">
    <p><input autocomplete="given-name" type="text" name="first_name" required placeholder="<?php t('prenom'); ?> *" /></p>
    <p><input autocomplete="family-name" type="text" name="last_name" required placeholder="<?php t('nom'); ?> *" /></p>
    <p><input autocomplete="email" type="text" name="email" required placeholder="<?php t('adresse_email'); ?> *" /></p>
    <p><input autocomplete="tel" type="text" name="phone" placeholder="<?php t('telephone'); ?>" /></p>
    <p><textarea autocomplete="address-level1" name="address" required placeholder="<?php t('votre_adresse'); ?> * "></textarea></p>
    <p><input autocomplete="new-password" type="password" name="password" required placeholder="<?php t('mot_de_passe'); ?> *" /></p>
    <p><input autocomplete="new-password" type="password" name="password_confirmation" required placeholder="<?php t('confirmez_le_mot_de_passe'); ?> *" /></p>
    <p> <input type="submit" name="submit_new_user" value="<?php t('envoyer'); ?> " /></p>

</form>