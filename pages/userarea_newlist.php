<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">
  <h1>Créer une liste</h1>
  <?php if (has_error()) : ?>
      <?php show_error_message(); ?>
  <?php endif; ?>
  <?php $pictures = find_pictures('lists'); ?>


  <div class="row">

      <div class="col-sm-6">
        <div class="half_block">
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
                  <label for="name">Nom de la liste</label>
                  <input type="text" name="name" placeholder="Nom" />
              </p>
              <p>
                  <label for="description">Description</label>
                  <textarea name="description" placeholder="Description"></textarea>
              </p>
              <p>
                  <label for="active">
                      <input type="checkbox" checked="checked" id="active" name="active" value="1"  />
                      Active
                  </label>
              </p>
              <?php if (sizeof($pictures) > 0) : ?>
                <p><label>Image</label></p>
                <div class="allfigs">
                    <?php foreach ($pictures as $picture) : ?>
                        <figure class="change_picture" data-picture="<?php echo $picture->id; ?>">
                            <img src="<?php echo $picture->url; ?>"  alt="Image <?php echo $picture->id; ?>" />
                            <figcaption>
                                Image <?php echo $picture->id; ?>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>
                  </div>

                  <input type="hidden" value="<?php echo $pictures[0]->id; ?>" name="picture" id="picture" />

              <?php endif; ?>
              <p>
                  <input type="submit" name="submit_new_list" value="Créer la liste" />
              </p>


          </form>


        </div>
      </div>
      <div class="col-sm-6">



      </div>
  </div>
</div>






<?php //include('includes/new_list_form.php'); ?>
