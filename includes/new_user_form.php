<form action="<?php get_site_url(); ?>/actions/user_new.php" method="post">
    <p><input type="text" name="email" placeholder="Email" /></p>
    <p><input type="text" name="first_name" placeholder="Prénom" /></p>
    <p><input type="text" name="last_name" placeholder="Nom" /></p>
    <p><input type="password" name="password" placeholder="Mot de passe" /></p>
    <p><input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" /></p>
    <p> <input type="submit" name="submit_new_user" value="Envoyer" /></p>


</form>
