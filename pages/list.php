<?php $list = get_list(); ?>


<?php if ($list): ?>

  <?php if (picture_exists( $list->picture, 'lists' )) : ?>
        <?php $picture =  get_picture_url($list->picture, 'lists'); ?>
  <?php else: ?>
      <?php $picture = get_site_url() . '/images/honeymoon.jpg'; ?>
  <?php endif; ?>

  <div class="page_image" style="background-image:url('<?php echo $picture;?>'); overflow: hidden;"></div>
  <div class="container">


    <?php if ($list->status == 'active') : ?>
        <?php $donations = get_donations( $list->id , 'payé' ); ?>
        <h1><?php echo $list->name; ?></h1>
        <p class="infos_supp">Liste #<?php echo $list->list_number; ?> par <?php echo $list->users_name; ?></p>
        <?php if($list->description != ''): ?>
            <p><?php echo $list->description; ?></p>
        <?php endif ; ?>


        <div class="row">

            <div class="col-sm-6">
              <div class="half_block">
                <h2>Contribuer</h2>
                <!-- <p>Jusqu'à présent <?php echo sum_donations($donations); ?> ont été contribués sur cette liste. </p> -->
                <?php if (has_error()) : ?>
                    <?php show_error_message(); ?>
                <?php elseif (isset($_GET['donation_id'])  ) : ?>
                    <?php if (has_success()): ?>
                        <?php $donation = get_donation($_GET['donation_id']); ?>
                        <?php if ($donation) : ?>
                            <p class="success_message">Merci pour votre contribution d'un montant de <?php echo convert_cents_to_currency($donation->amount); ?>!</p>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>




                <form action="<?php get_site_url(); ?>/actions/donation_new.php" method="post">

                    <p>
                      <label for="email">Votre adresse email</label>
                      <input type="email" required name="email" placeholder="Email" />
                    </p>
                    <p>
                      <label for="first_name">Votre prénom</label>
                      <input type="text" name="first_name" placeholder="Prénom" /
                      ></p>
                    <p>
                      <label for="last_name">Votre nom</label>
                      <input type="text" name="last_name" placeholder="Nom" />
                    </p>
                    <p>
                      <label for="message">Message (optionnel)</label>
                      <textarea name="message" placeholder="Message"></textarea>
                    </p>
                    <p id="amount_container">
                      <label for="amount">Montant</label>
                      <input  required step="1"   min="0" max="10000" type="number" name="amount" placeholder="" id="amount"  /><span style="margin-top: 13px;">CHF</span>
                    </p>
                    <p>
                        <input type="submit" id="submit_button" name="submit_new_donation" value="Envoyer" />
                        <input type="hidden" name="list_id" value="<?php echo $list->list_number; ?>" />
                        <div id="spinner"></div>

                    </p>

                </form>


            </div>
        </div>
      </div>


</div>

    <?php else: ?>
        <div class="page_image" style="background-image:url('<?php echo site_url() . '/images/honeymoon.jpg';?>'); overflow: hidden;"></div>
        <div class="container">
          <p>Cette liste n'est pas active à l'heure actuelle.</p>
        </div>
    <?php endif; ?>
<?php else: ?>
  <div class="page_image" style="background-image:url('<?php echo site_url() . '/images/honeymoon.jpg';?>'); overflow: hidden;"></div>
  <div class="container">
    <p>Ce numéro de correspond à aucune liste. Veuillez réessayer. </p>
  </div>
<?php endif; ?>
