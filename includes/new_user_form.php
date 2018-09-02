<form action="<?php get_site_url(); ?>/actions/user_new.php" method="post">
    <p><input autocomplete="given-name" type="text" name="first_name" required placeholder="Prénom *" /></p>
    <p><input autocomplete="family-name" type="text" name="last_name" required placeholder="Nom *" /></p>
    <p><input autocomplete="email" type="text" name="email" required placeholder="Email *" /></p>
    <p><input autocomplete="tel" type="text" name="phone"  placeholder="Téléphone" /></p>
    <p><textarea autocomplete="address-level1" name="address" required placeholder="Votre adresse * "></textarea></p>
    <p><input autocomplete="new-password" type="password" name="password" required placeholder="Mot de passe *" /></p>
    <p><input autocomplete="new-password" type="password" name="password_confirmation" required placeholder="Confirmez le mot de passe *" /></p>
    <p> <input type="submit" name="submit_new_user" value="Envoyer" /></p>

</form>
