<?php $pictures = find_pictures('lists'); ?>



<form action="<?php get_site_url(); ?>/actions/list_new.php" method="post">


    <?php if(has_valid_admin_cookie()): ?>
    <p>
        <select id="user_id" name="user_id">
            <?php foreach (  get_users() as $user) : ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php endif; ?>
    <p>
        <input type="text" name="name" placeholder="name" />
    </p>
    <p>
        <textarea name="description" placeholder="description"></textarea>
    </p>
    <p>
        <label for="active">
            <input type="checkbox" id="active" name="active" value="1"  />
            Active
        </label>
    </p>
    <?php if (sizeof($pictures) > 0) : ?>
    <p>
        <select id="picture" name="picture">
            <?php foreach ($pictures as $picture) : ?>
                <option value="<?php echo $picture->id; ?>">Picture <?php echo $picture->id; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php endif; ?>
    <p>
        <input type="submit" name="submit_new_list" value="Submit" />
    </p>


</form>


<?php foreach ($pictures as $picture) : ?>
    <figure>
        <img src="<?php echo $picture->url; ?>"  alt="Picture <?php echo $picture->id; ?>" />
        <figcaption>
            Picture <?php echo $picture->id; ?>
        </figcaption>
    </figure>
<?php endforeach; ?>
