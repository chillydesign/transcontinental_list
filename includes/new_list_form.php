<?php $pictures = find_pictures('lists'); ?>


<div class="row">

    <div class="col-sm-6">

        <form action="<?php get_site_url(); ?>/actions/list_new.php" method="post">


            <?php if(has_valid_admin_cookie()): ?>
            <p>
                <select id="user_id" name="user_id">
                    <?php foreach (  get_users() as $user) : ?>
                        <?php $selected = ( $user->id == get_var('user_id')  ) ? 'selected="selected"' : ''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
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

                <?php foreach ($pictures as $picture) : ?>
                    <figure class="change_picture" data-picture="<?php echo $picture->id; ?>">
                        <img src="<?php echo $picture->url; ?>"  alt="Picture <?php echo $picture->id; ?>" />
                        <figcaption>
                            Picture <?php echo $picture->id; ?>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>

                <input type="hidden" value="<?php echo $pictures[0]->id; ?>" name="picture" id="picture" />

            <?php endif; ?>
            <p>
                <input type="submit" name="submit_new_list" value="Submit" />
            </p>


        </form>


    </div>
    <div class="col-sm-6">



    </div>
</div>
