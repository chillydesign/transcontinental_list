<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">

  <div class="row">
    <div class="col-sm-3 col-sm-push-9">
      <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
    </div>
    <div class="col-sm-9 col-sm-pull-3">
      <h1>Clients</h1>
    </div>
  </div>
  <?php if (has_error()) : ?>
    <?php show_error_message(); ?>
  <?php endif; ?>


  <div class="row">
    <div class="col-sm-6">
      <div class="half_block">
        <h2>Liste des clients</h2>
        <?php include('includes/search_user_form.php'); ?>
        <ul>
          <?php foreach (  get_users() as $user) : ?>
            <li>
              <a href="<?php get_site_url(); ?>/adminarea/user?id=<?php echo $user->id; ?>">
                <strong><?php echo $user->last_name . ' ' . $user->first_name; ?></strong></a>
                <br> <em>Créé le <?php  echo nice_date($user->created_at); ?></em>

              </li>
            <?php endforeach; ?>
          </ul>
          <?php
          $totalItems = count_users();
          $itemsPerPage = posts_per_page();
          $currentPage = get_var('p');
          $s = (get_var('s')) ? "&s=" . get_var('s') : '';
          $urlPattern = site_url() . '/adminarea/users?p=(:num)' . $s;
          $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
          $paginator->setMaxPagesToShow(3);
          $paginator->setPreviousText('Précédent');
          $paginator->setNextText('Suivant');
          echo $paginator;
          ?>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="half_block">
          <h2>Ajouter un client</h2>
          <?php include('includes/new_user_form.php'); ?>
        </div>
      </div>
    </div>





  </div>
