<?php $list = get_list(); ?>
<?php if ($list): ?>
    <?php if ($list->user_id == current_user()->id  ): ?>

      <?php if (picture_exists( $list->picture, 'lists' )) : ?>
            <?php $picture =  get_picture_url($list->picture, 'lists'); ?>
      <?php else: ?>
          <?php $picture = get_site_url() . '/images/honeymoon.jpg'; ?>
      <?php endif; ?>
      <div class="page_image" style="background-image:url('<?php echo $picture;?>'); overflow: hidden;"></div>
      <div class="container">


        <div class="row">
          <div class="col-sm-3 col-sm-push-9">
            <a class="list_button right_list_button" href="<?php get_site_url(); ?>/userarea">Retour aux listes</a>
          </div>
          <div class="col-sm-9 col-sm-pull-3">
            <h1><?php echo $list->name; ?><span class="creation_date">Créée le <?php  echo nice_date($list->created_at); ?></span></h1>
          </div>
        </div>

          <div class="row" style="margin-bottom:30px;">
            <div class="col-sm-9">
              <?php if($list->description != ''): ?>
                  <p><?php echo $list->description; ?></p>
              <?php endif ; ?>
              <p><strong>Numéro de liste :</strong>  <a target="_blank" href="<?php get_site_url(); ?>/list/<?php echo $list->id; ?>"><?php echo $list->id; ?></a><br>
              Partagez ce numéro de liste à vos contacts, ou directement l'url suivante : <a target="_blank" href="<?php get_site_url(); ?>/list/<?php echo $list->id; ?>"><?php get_site_url(); ?>/list/<?php echo $list->id; ?></a></p>
            </div>
            <div class="col-sm-3">
              <?php if (picture_exists( $list->picture, 'lists' )) : ?>
                  <figure>
                      <img src="<?php echo get_picture_url($list->picture, 'lists'); ?>" alt="Image for <?php $list->name; ?>" />
                  </figure>
              <?php endif; ?>
            </div>
          </div>



          <div class="row">
            <div class="col-sm-6">
                <div class="half_block">

                  <?php if (has_error()) : ?>
                      <?php show_error_message(); ?>
                  <?php endif; ?>
                  <h2>Modifier la liste</h2>
                  <?php include('includes/edit_list_form.php'); ?>

                  <p><a  class="areyousurelink"  href="<?php get_site_url(); ?>/actions/list_delete.php?id=<?php echo $list->id; ?>">Supprimer cette liste?</a></p>

              </div>
            </div>
            <div class="col-sm-6">
              <div class="half_block">
                <?php $donations = get_donations( $list->id, 'payé'  ); ?>
                <h2>Contributions</h2>
                <?php if (sum_donations($donations) > 0) : ?>
                <p>Montant total contribué sur cette liste: <?php  echo sum_donations($donations);  ?>.</p>
                <table>
                    <thead>
                        <tr>
                            <th>De la part de</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donations as $donation) : ?>
                            <tr>
                                <td><strong><?php echo $donation->first_name;?> <?php echo $donation->last_name;?></strong><br/>
                                    <em><?php echo $donation->message;?></em>
                                </td>
                                <td><?php echo  convert_cents_to_currency($donation->amount); ?></td>

                            </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <p>Pas encore de contributions</p>
                      <?php endif; ?>

                    </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>

        <?php else: ?>
          <?php $picture = site_url() . '/images/honeymoon.jpg'; ?>
          <div class="page_image" style="background-image:url('<?php echo $picture;?>'); overflow: hidden;"></div>
          <div class="container">
                <h1>Aucune liste trouvée </h1>
                <p><a class="list_button" href="<?php get_site_url(); ?>/userarea/newlist">Créer une liste</a></p>
          </div>
    <?php endif; // dont allow other users to see this list ?>
<?php else: ?>
  <?php $picture = site_url() . '/images/honeymoon.jpg'; ?>
  <div class="page_image" style="background-image:url('<?php echo $picture;?>'); overflow: hidden;"></div>
  <div class="container">
        <h1>Aucune liste trouvée </h1>
          <p><a class="list_button" href="<?php get_site_url(); ?>/userarea/newlist">Créer une liste</a></p>
  </div>
<?php endif; ?>
