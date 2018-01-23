<?php global $list; ?>


<?php if ($list) : ?>
    <?php $pictures = find_pictures('lists'); ?>
    <form action="<?php get_site_url(); ?>/actions/list_edit.php?id=<?php echo $list->list_number; ?>" method="post">


        <?php if(has_valid_admin_cookie()): ?>
            <p>
                <select id="user_id" name="user_id">
                    <?php foreach ( get_users( array('posts_per_page' => -1) ) as $user) : ?>
                        <?php $selected = ( $user->id == $list->user_id ) ? 'selected="selected"'  : '' ; ?>
                        <option <?php echo $selected; ?>   value="<?php echo $user->id; ?>">
                            <?php echo $user->first_name . ' ' . $user->last_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="active">
                    <input type="checkbox" name="active" id="active"  <?php echo ($list->active == 1) ? 'checked' : ''; ?> />
                    Active (décocher pour désactiver la liste)
                </label>
            </p>
        <?php endif; ?>

        <p>
            <label for="name">Nom de la liste</label>
            <input type="text" name="name" placeholder="Nom" value="<?php echo $list->name; ?>"  />
        </p>
        <p>
            <label for="description">Description</label>
            <textarea name="description" placeholder="Description"><?php echo $list->description; ?></textarea>
        </p>
        <?php if (sizeof($pictures) > 0) : ?>
              <p><label>Image</label></p>
              <div class="allfigs">
            <?php foreach ($pictures as $picture) : ?>
                <?php $selected = ( $picture->id == $list->picture ) ? 'selected"'  : '' ; ?>
                <figure class="change_picture <?php echo $selected; ?>" data-picture="<?php echo $picture->id; ?>">
                    <img src="<?php echo $picture->url; ?>"  alt="Image <?php echo $picture->id; ?>" />
                </figure>
            <?php endforeach; ?>
          </div>
            <input type="hidden" value="<?php echo $picture->id; ?>" name="picture" id="picture" />


        <?php endif; ?>
        <p>
            <input type="submit" name="submit_edit_list" value="Modifier" />
        </p>


    </form>

<?php endif; ?>
