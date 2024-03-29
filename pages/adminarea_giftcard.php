<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/giftcard.jpg'); overflow: hidden;"></div>
<div class="container">
    <?php $giftcard = get_giftcard(); ?>
    <?php if ($giftcard) : ?>

        <?php $withdrawals = get_withdrawals($giftcard->id); ?>
        <?php $withdrawals_total = total_of_withdrawals($withdrawals); ?>
        <?php $money_left = $giftcard->amount  - $withdrawals_total; ?>
        <div class="row">
            <div class="col-sm-3 col-sm-push-9">
                <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
            </div>
            <div class="col-sm-9 col-sm-pull-3">
                <h1>Bon cadeau #<?php echo   $giftcard->id; ?></h1>
            </div>
        </div>

        <?php if (has_error()) : ?>
            <?php show_error_message(); ?>
        <?php endif; ?>


        <div class="row">

            <div class="col-sm-8">

                <?php if ($giftcard->expires_at  < date('Y-m-d')) : ?>
                    <p class="error_message">Ce bon cadeau est expiré.</p>
                <?php endif; ?>

                <ul>
                    <li><strong>Pour:</strong> <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?> <br />
                        <strong>Email</strong>: <?php echo $giftcard->receiver_email; ?><br> <br>
                    </li>
                    <li><strong>De la part de:</strong> <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> <br />
                        <strong>Email</strong>: <?php echo $giftcard->sender_email; ?> <br />
                        <strong>Téléphone</strong>: <?php echo $giftcard->sender_phone; ?><br />
                        <strong>Adresse</strong>: <?php echo $giftcard->sender_address; ?> <br><br>
                        <strong>Code postal</strong>: <?php echo $giftcard->sender_post_code; ?> <br><br>
                        <strong>Ville</strong>: <?php echo $giftcard->sender_town; ?> <br><br>
                        <strong>Pays</strong>: <?php echo $giftcard->sender_country; ?> <br><br>
                    </li>

                    <li><strong>Montant:</strong> <?php echo convert_cents_to_currency($giftcard->amount); ?></li>
                    <li><strong>Montant restant:</strong> <?php echo convert_cents_to_currency($money_left); ?></li>
                    <li><strong>Créé:</strong> <?php echo nice_datetime($giftcard->created_at); ?></li>
                    <li><strong>Valide jusqu'au:</strong> <?php echo nice_date($giftcard->expires_at); ?></li>
                </ul>



                <?php include('includes/edit_giftcard_form.php'); ?>

                <?php if ($giftcard->status != 'non payé') : ?>
                    <br><br>
                    <h2>Utilisations</h2>
                    <form action="<?php get_site_url(); ?>/actions/withdrawal_new.php" method="post">
                        <table>
                            <thead>
                                <tr>
                                    <th>Montant</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($withdrawals as $withdrawal) : ?>
                                    <tr>

                                        <td><?php echo convert_cents_to_currency($withdrawal->amount); ?></td>
                                        <td><?php echo $withdrawal->message; ?></td>
                                        <td><?php echo nice_datetime($withdrawal->created_at); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if ($giftcard->status == 'actif'   && $money_left > 0) : ?>
                                    <tr>
                                        <td><input max="<?php echo (($money_left) / 100); ?>" step="0.01" type="number" required name="amount" id="amount" placeholder="montant" /></td>
                                        <td><input type="text" name="message" id="message" placeholder="notes" /></td>
                                        <td><input type="submit" name="submit_new_withdrawal" value="Ajouter" /><input type="hidden" name="giftcard_id" value="<?php echo $giftcard->id; ?>"></td>
                                    </tr>
                                <?php endif;  // end if status is paye and has money to withdraw 
                                ?>
                            </tbody>
                        </table>
                    </form>
                <?php endif;  // end of if status is not cree 
                ?>

                <!-- <p><a  class="areyousurelink"  href="<?php get_site_url(); ?>/actions/giftcard_delete.php?id=<?php echo  $giftcard->id; ?>">Supprimer</a></p> -->
            </div>




            <div class="col-sm-4">


                <figure>
                    <?php if (picture_exists($giftcard->picture, 'giftcards')) : ?>
                        <img src="<?php echo get_picture_url($giftcard->picture, 'giftcards'); ?>" alt="Giftcard image" />
                    <?php endif; ?>
                    <figcaption><?php echo $giftcard->message; ?> </figcaption>
                </figure>
                <br>
                <br>
                <br>

                <a class="list_button right_list_button" target="printgiftcard" href="<?php echo  giftcard_print_url($giftcard); ?>"><?php t('imprimer_le_bon_cadeau'); ?>.</a>



            </div>
        </div>



    <?php else : ?>
        <p>Aucun bon cadeau avec cet ID.</p>
    <?php endif; ?>
</div>