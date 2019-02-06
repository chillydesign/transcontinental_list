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
        <p class="infos_supp">Liste #<?php echo $list->id; ?> par <?php echo $list->users_name; ?></p>

        <?php if (has_error()) : ?>
            <?php show_error_message(); ?>
        <?php elseif (isset($_GET['donation_id'])  ) : ?>
            <?php if (has_success()): ?>
                <?php $donation = get_donation($_GET['donation_id']); ?>
                <?php if ($donation) : ?>
                    <div class="row">
                        <div class="col-sm-9">
                    <p class="success_message">Merci pour votre contribution d'un montant de <?php echo convert_cents_to_currency($donation->amount); ?>!</p>
                        </div>
                        <div class="col-sm-3">
                            <p><a href="<?php echo site_url(); ?>/" class="button">Retour</a></p>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>




        <div class="row">


            <div class="col-sm-6">
              <?php if($list->description != ''): ?>
                  <p><?php echo $list->description; ?></p>
              <?php endif ; ?>
              <div class="half_block">
                <h2>Contribuer</h2>


                <?php if( false) : ?><!--<p>Jusqu'à présent <?php echo sum_donations($donations); ?> ont été contribués sur cette liste. </p>--><?php endif; ?>



                <form action="<?php get_site_url(); ?>/actions/donation_new.php" method="post">

                    <p>
                      <label for="email">Votre adresse email *</label>
                      <input type="email" required name="email" autocomplete='email' placeholder="Email" />
                    </p>
                    <p>
                      <label for="first_name">Votre prénom *</label>
                      <input type="text" required name="first_name" autocomplete='given-name' placeholder="Prénom" /
                      ></p>
                    <p>
                      <label for="last_name">Votre nom *</label>
                      <input type="text" required name="last_name" autocomplete='family-name' placeholder="Nom" />
                    </p>
                    <p>
                      <label for="message">Message (optionnel)</label>
                      <textarea name="message" placeholder="Message"></textarea>
                    </p>
                    <p id="amount_container">
                      <label for="amount">Montant *</label>
                      <input  required step="0.01"   min="0" max="10000" type="number" name="amount" id="amount"  /><span style="margin-top: 13px;">CHF</span>
                    </p>

                    <p>
                        <label for="phone">Téléphone</label>
                            <input type="text" autocomplete="tel"  name="phone"  name="phone" placeholder="Téléphone"   />
                    </p>
                    <p>
                        <label for="address">Adresse</label>
                        <textarea autocomplete="address-level1" name="address"  placeholder="Votre adresse "></textarea>
                    </p>

                    <p>
                        <input type="submit" id="submit_button" name="submit_new_donation" value="Envoyer" />
                        <input type="hidden" name="list_id" value="<?php echo $list->id; ?>" />
                        <div id="spinner"></div>

                    </p>

                </form>


                <?php if ( list_has_expired($list)) : // if list has not expired ?>
                <?php else: // end of if list has not expired ?>
                <?php endif; // end of if list has  expired ?>




            </div>
        </div>
</div>

    <?php else: ?>

          <h1 >Liste inactive</h1>
          <p>Cette liste n'est pas active à l'heure actuelle ou a expiré. Il n'est plus possible d'y contribuer, mais vous pouvez si vous le souhaitez envoyer un bon cadeau.</p>
          <p style="padding-bottom: 400px"><a href="<?php echo site_url(); ?>/giftcard" class="button button_inline" >Envoyer un bon cadeau</a></p>

    <?php endif; ?>




</div>
<?php else: ?>
  <div class="page_image" style="background-image:url('<?php echo site_url() . '/images/honeymoon.jpg';?>'); overflow: hidden;"></div>
  <div class="container">
    <p>Ce numéro de correspond à aucune liste. Veuillez réessayer. </p>
  </div>
<?php endif; ?>
