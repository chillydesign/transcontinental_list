<?php global $user; ?>


<?php if ($user) : ?>
    <form action="<?php get_site_url(); ?>/actions/user_edit.php?id=<?php echo $user->id; ?>" method="post">


        <?php if(has_valid_admin_cookie()): ?>

        <?php endif; ?>

        <p>
            <label for="email">Email</label>
            <input type="email"  required name="email"  requiredname="email"  value="<?php echo $user->email; ?>"  />
        </p>
        <p>
            <label for="first_name">Prénom</label>
            <input type="text"  required name="first_name" required name="first_name"  value="<?php echo $user->first_name; ?>"  />
        </p>
        <p>
            <label for="last_name">Nom</label>
            <input type="text"  required  name="last_name" required name="last_name"  value="<?php echo $user->last_name; ?>"  />
        </p>
        <p>
            <label for="phone">Téléphone</label>
                <input type="text"  autocomplete="tel"  name="phone"  name="phone"  value="<?php echo $user->phone; ?>"  />
        </p>
        <p>
            <label for="address">Adresse</label>
            <textarea autocomplete="address-level1" name="address"  placeholder="Votre adresse "><?php echo $user->address; ?></textarea>
        </p>
        <p>
            <input type="submit" name="submit_edit_user" value="Modifier" />
        </p>


    </form>

<?php endif; ?>
