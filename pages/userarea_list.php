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
          <div class="col-sm-9">
            <h1><?php echo $list->name; ?><span class="creation_date">Créée le <?php  echo date('d/m/Y', strtotime($list->created_at)); ?></span></h1>
          </div>
          <div class="col-sm-3">
            <a class="list_button right_list_button" href="<?php get_site_url(); ?>/userarea">Retour aux listes</a>
          </div>
        </div>

          <div class="row" style="margin-bottom:30px;">
            <div class="col-sm-9">
              <?php if($list->description != ''): ?>
                  <p><?php echo $list->description; ?></p>
              <?php endif ; ?>
              <p><strong>Numéro de liste :</strong>  <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php echo $list->list_number; ?></a><br>
              Partagez ce numéro de liste à vos contacts, ou directement l'url suivante : <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php get_site_url(); ?>/list/<?php echo $list->list_number; ?></a></p>
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

              </div>
            </div>
            <div class="col-sm-6">
              <div class="half_block">
                <?php $donations = get_donations( $list->id, 'paid'  ); ?>
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
                                <td><strong><?php echo $donation->first_name;?> <?php echo $donation->last_name;?> (<?php echo timeAgoInWords($donation->created_at);?>)</strong><br/>
                                    <em><?php echo $donation->message;?></em>
                                </br/></td>
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
    <?php endif; // dont allow other users to see this list ?>
<?php else: ?>
    <p>Aucune liste trouvée </p>
<?php endif; ?>