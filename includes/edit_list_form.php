<?php global $list; ?>

<?php if ($list) : ?>
    <form action="<?php get_site_url(); ?>/actions/list_edit.php?id=<?php echo $list->list_number; ?>" method="post">


        <?php if(has_valid_admin_cookie()): ?>
            <p>
                <select id="user_id" name="user_id">
                    <?php foreach ( get_users() as $user) : ?>
                        <?php $selected = ( $user->id == $list->user_id ) ? 'selected="selected"'  : '' ; ?>
                        <option <?php echo $selected; ?>   value="<?php echo $user->id; ?>">
                            <?php echo $user->first_name . ' ' . $user->last_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
        <?php endif; ?>

        <p>
            <input type="text" name="name" placeholder="name" value="<?php echo $list->name; ?>"  />
        </p>
        <p>
            <textarea name="description" placeholder="description"><?php echo $list->description; ?></textarea>
        </p>
        <p>
            <label for="active">
                <input type="checkbox" name="active" id="active"  <?php echo ($list->active == 1) ? 'checked' : ''; ?> />
                Active
            </label>
        </p>
        <p>
            <select id="picture" name="picture">
                <option <?php echo ($list->picture ==1 ) ? 'selected' : ''; ?> value="1">Picture 1</option>
                <option <?php echo ($list->picture ==2 ) ? 'selected' : ''; ?> value="2">Picture 2</option>
                <option <?php echo ($list->picture ==3 ) ? 'selected' : ''; ?> value="3">Picture 3</option>
            </select>
        </p>
        <p>
            <input type="submit" name="submit_edit_list" value="Edit" />
        </p>


    </form>

<?php endif; ?>
