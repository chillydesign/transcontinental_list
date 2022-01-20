<?php global $list; ?>


<?php if ($list) : ?>
    <?php $pictures = find_pictures('lists'); ?>
    <form action="<?php get_site_url(); ?>/actions/list_edit.php?id=<?php echo $list->id; ?>" method="post">


        <?php if (has_valid_admin_cookie()) : ?>
            <p>
                <select id="user_id" name="user_id">
                    <?php foreach (get_users(array('posts_per_page' => -1)) as $user_for_list) : ?>
                        <?php $selected = ($user_for_list->id == $list->user_id) ? 'selected="selected"'  : ''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $user_for_list->id; ?>">
                            <?php echo $user_for_list->first_name . ' ' . $user_for_list->last_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="active">
                    <input type="checkbox" name="active" id="active" <?php echo ($list->active == 1) ? 'checked' : ''; ?> />
                    Active (décocher pour désactiver la liste)
                </label>
            </p>
        <?php endif; ?>

        <p>
            <label for="name"><?php t('nom_de_la_liste'); ?> *</label>
            <input type="text" required name="name" placeholder="<?php t('nom_de_la_liste'); ?>" value="<?php echo $list->name; ?>" />
        </p>
        <p>
            <label for="description"><?php t('description'); ?></label>
            <textarea name="description" placeholder="<?php t('description'); ?>"><?php echo $list->description; ?></textarea>
        </p>


        <p>
            <label for="deadline"><?php t('date_du_mariage_de_l_anniversaire'); ?></label>
            <input type="date" name="deadline" id="deadline" value="<?php echo date_for_input($list->deadline); ?>" />
        </p>

        <p>
            <label for="category"><?php t('categorie'); ?></label>
            <span class="radio_container">
                <label>
                    <input <?php echo ($list->category == 'anniversaire') ? ' checked ' : ''; ?>type="radio" value="anniversaire" name="category" />
                    <?php t('anniversaire'); ?>
                </label>
            </span>
            <span class="radio_container">
                <label>
                    <input <?php echo ($list->category == 'mariage') ? ' checked ' : ''; ?>type="radio" value="mariage" name="category" />
                    <?php t('mariage'); ?>
                </label>
            </span>
        </p>


        <?php if (sizeof($pictures) > 0) : ?>
            <p><label><?php t('image'); ?> <br> <em><?php t('choisissez_une_photo_en_cliquant_dessus'); ?>.</em></label></p>
            <div class="allfigs">
                <?php foreach ($pictures as $picture) : ?>
                    <?php $selected = ($picture->id == $list->picture) ? ' selected '  : ''; ?>
                    <figure class="change_picture <?php echo $selected; ?>" data-picture="<?php echo $picture->id; ?>">
                        <img src="<?php echo $picture->url; ?>" alt="Image <?php echo $picture->id; ?>" />
                    </figure>
                <?php endforeach; ?>
            </div>
            <input type="hidden" value="<?php echo $picture->id; ?>" name="picture" id="picture" />


        <?php endif; ?>
        <p>
            <input type="submit" name="submit_edit_list" value="<?php t('modifier'); ?>" />
        </p>


    </form>

<?php endif; ?>