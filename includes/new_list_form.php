
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
    <p>
        <select id="picture" name="picture">
            <option value="1">Picture 1</option>
            <option value="2">Picture 2</option>
            <option value="3">Picture 3</option>
        </select>
    </p>
    <p>
        <input type="submit" name="submit_new_list" value="Submit" />
    </p>


</form>
