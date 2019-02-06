<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">

<?php $list = get_list(); ?>
<?php if ($list): ?>


    <div class="row">
      <div class="col-sm-3 col-sm-push-9">
        <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
      </div>
      <div class="col-sm-9 col-sm-pull-3">
        <h1><?php echo $list->name; ?></h1>
      </div>
    </div>

<div class="row">

    <div class="col-sm-8">
      <div class="half_block">

        <p><?php echo ucfirst($list->category); ?> liste crée par <a  href="<?php get_site_url(); ?>/adminarea/user?id=<?php echo $list->user_id; ?>"><?php echo $list->users_name; ?></a></p>


        <p>Le numéro de la liste est  <a href="<?php get_site_url(); ?>/list/<?php echo $list->id; ?>">#<?php echo $list->id; ?></a></p>

        <?php $donations = get_donations( $list->id  ); ?>
        <p>Montant total contribué sur cette liste: <?php  echo sum_donations($donations);  ?>.</p>



            <table>
                <thead>
                    <tr>
                        <th>De la part de</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donations as $donation) : ?>
                        <tr>
                            <td>
                                <?php echo $donation->first_name;?> <?php echo $donation->last_name;?>
                                <div class="donation_address">
                                    <?php echo $donation->address; ?>. <?php echo $donation->phone; ?>
                                </div>

                            </td>
                            <td><?php echo  convert_cents_to_currency($donation->amount); ?></td>
                            <td><?php echo $donation->status;?></td>
                            <td><?php echo nice_datetime($donation->created_at);?></td>
                            <td><input class="update_donation_validated" type="checkbox" name="validated" data-id="<?php echo $donation->id; ?>" <?php echo ( $donation->validated  ) ? 'checked'  : '' ;   ?>  ></td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="5"><a href="<?php echo site_url(); ?>/adminarea/newdonation?list_id=<?php echo $list->id; ?>">Add Donation</a></td>
                        </tr>
                </tbody>
            </table>

            <script>
                var donation_edit_url = '<?php echo  site_url(); ?>/actions/donation_validate.php';
            </script>



    </div>
    </div>

    <div class="col-sm-4">
      <div class="half_block">
            <?php if (has_error()) : ?>
                <?php show_error_message(); ?>
            <?php endif; ?>

            <?php include('includes/edit_list_form.php'); ?>


            <p><a  class="areyousurelink"  href="<?php get_site_url(); ?>/actions/list_delete.php?id=<?php echo $list->id; ?>">Supprimer</a></p>

    </div>
    </div>
</div>




<?php endif;  # end if list ?>
</div>
