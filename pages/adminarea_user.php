<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">


  <?php $user = get_user(); ?>
  <?php if ($user): ?>
    <h1><?php echo $user->first_name . ' ' . $user->last_name; ?></h1>



    <div class="col-sm-6">
      <div class="half_block">


        <h2>Informations personnelles</h2>
        <p><strong>Nom: </strong><?php echo $user->last_name; ?>
          <p><strong>Prénom: </strong><?php echo $user->first_name; ?>
            <p><strong>Email: </strong><?php echo $user->email; ?>
              <p><a class="list_button" href="<?php get_site_url(); ?>/adminarea/useredit?id=<?php echo $user->id; ?>">Modifier</a></p>
              <h2>Listes</h2>
              <ul>
                <?php foreach (  user_lists($user->id) as $list) : ?>
                  <li>
                    <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                      <strong><?php echo $list->name; ?></strong>
                      (Créée le <?php  echo nice_date($list->created_at); ?>)
                    </a>

                  </li>
                <?php endforeach; ?>

              </ul>

            </div>
          </div>
          <div class="col-sm-6">
            <div class="half_block">
              <h2>Ajouter une liste</h2>
              <?php include('includes/new_list_form.php'); ?>
            </div>
          </div>


        <?php endif; ?>
      </div>
