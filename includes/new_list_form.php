<form action="<?php get_site_url(); ?>/actions/list_new.php" method="post">


    <?php if(has_valid_admin_cookie()): ?>
    <p>
        <select id="user_id" name="user_id">
            <option value="-1">-</option>
            <?php foreach (  get_users( array('posts_per_page' => -1) ) as $user) : ?>
                <?php $selected = ( $user->id == get_var('id')  ) ? 'selected="selected"' : ''; ?>
                <option <?php echo $selected; ?> value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php endif; ?>
    <p>
        <label for="name">Nom de la liste</label>
        <input type="text" name="name" placeholder="Nom" />
    </p>
    <p>
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description"></textarea>
    </p>
     <?php $pictures = find_pictures('lists'); ?>
    <?php if (sizeof($pictures) > 0) : ?>
      <p><label>Image</label></p>
      <div class="allfigs">
          <?php foreach ($pictures as $picture) : ?>
              <figure class="change_picture" data-picture="<?php echo $picture->id; ?>">
                  <img src="<?php echo $picture->url; ?>"  alt="Image <?php echo $picture->id; ?>" />
              </figure>
          <?php endforeach; ?>
        </div>

        <input type="hidden" value="<?php echo $pictures[0]->id; ?>" name="picture" id="picture" />

    <?php endif; ?>
    <p>
        <input type="submit" name="submit_new_list" value="Créer la liste" />
    </p>


</form>
