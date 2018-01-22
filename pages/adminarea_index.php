<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">

  <h1>Espace administrateur</h1>


  <div class="row">
    <div class="col-sm-4">
      <div class="third_block">

        <h2>Clients <a class="tc_button" href="<?php get_site_url(); ?>/adminarea/newuser">+</a></h2>
        <form action="<?php get_site_url();?>/adminarea/users" method="get">
          <p>
            <input class="search_input" type="text" name="s" placeholder="Rechercher un client"/>
            <button type="submit" class="search_button">Chercher</button>
          </p>
        </form>
        <ul>
          <?php foreach (  get_users() as $user) : ?>
            <li>
              <a href="<?php get_site_url(); ?>/adminarea/user?id=<?php echo $user->id; ?>">
                <strong><?php echo $user->first_name . ' ' . $user->last_name; ?></strong></a>
                <br> <em>Créé le <?php  echo date('d/m/Y', strtotime($user->created_at)); ?></em>

              </li>
            <?php endforeach; ?>
          </ul>



        </div>
      </div>
      <div class="col-sm-4">
        <div class="half_block">

          <h2>Listes <a class="tc_button"  href="<?php get_site_url(); ?>/adminarea/newlist">+</a></h2>

          <?php include('includes/list_search.php'); ?>

          <ul>
            <?php foreach ( get_lists() as $list) : ?>
              <li>
                <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                  <strong><?php echo $list->name; ?> par <?php echo $list->first_name; ?> <?php echo $list->last_name; ?> </strong></a>
                  <br> <em>Créée le <?php  echo date('d/m/Y', strtotime($list->created_at)); ?></em>


                </li>
              <?php endforeach; ?>
            </ul>





          </div>
        </div>
        <div class="col-sm-4">
          <div class="half_block">

            <h2>Bons cadeaux</h2>
            <ul>
              <?php foreach ( get_giftcards() as $giftcard) : ?>
                <li>
                  <a href="<?php get_site_url(); ?>/adminarea/giftcard?id=<?php echo  convert_giftcard_id($giftcard->id); ?>">
                    <strong><?php echo convert_cents_to_currency($giftcard->amount); ?> from <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> to  <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?></strong></a>
                    <br /> Créé le <?php  echo date('d/m/Y', strtotime($giftcard->created_at)); ?>


                  </li>
                <?php endforeach; ?>
              </ul>



            </div>
          </div>
        </div>
      </div>
