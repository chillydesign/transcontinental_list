<form action="<?php get_site_url(); ?>/actions/list_new.php" method="post">


    <?php if(has_valid_admin_cookie()): ?>
    <p>
        <select id="user_id" name="user_id">
            <option value="-1">-</option>
            <?php foreach (  get_users( array('posts_per_page' => -1) ) as $user_for_list) : ?>
                <?php $selected = ( $user_for_list->id == get_var('id')  ) ? 'selected="selected"' : ''; ?>
                <option <?php echo $selected; ?> value="<?php echo $user_for_list->id; ?>"><?php echo $user_for_list->first_name . ' ' . $user_for_list->last_name; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php endif; ?>
    <p>
        <label for="name">Nom de la liste</label>
        <input id="name" type="text" name="name" placeholder="Nom" />
    </p>
    <p>
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Description"></textarea>
    </p>


    <p>
        <label for="deadline">Deadline</label>
        <input type="date" name="deadline" id="deadline" />
    </p>


    <p>
        <label for="category">Categorie</label>
        <span class="radio_container">
            <label>
                <input type="radio" value="anniversaire" name="category" />
                Anniversaire
            </label>
        </span>
        <span class="radio_container">
            <label >
                <input type="radio" value="mariage" name="category" />
                Mariage
            </label>
        </span>
    </p>

     <?php $pictures = find_pictures('lists'); ?>
    <?php if (sizeof($pictures) > 0) : ?>
      <p><label>Image <br> <em>Choisissez une photo en cliquant dessus.</em></label> </p>
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
