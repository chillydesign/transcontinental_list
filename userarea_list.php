<?php $list = get_list(); ?>
<?php if ($list): ?>
    <?php if ($list->user_id == current_user()->id  ): ?>
        <h1><?php echo $list->name; ?></h1>

        <div class="row">

            <div class="col-sm-6">



                <p>
                  Le numéro de votre liste est  <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php echo $list->list_number; ?></a><br>
                  Vous pouvez envoyer ce numéro de liste à vos contacts, ou directement l'url suivante : <a href="<?php get_site_url(); ?>/list/<?php echo $list->list_number; ?>"><?php get_site_url(); ?>/list/<?php echo $list->list_number; ?></a>
                </p>



                <?php if($list->description != ''): ?>
                    <p><?php echo $list->description; ?></p>
                <?php endif ; ?>

                <?php if (picture_exists( $list->picture, 'lists' )) : ?>
                    <figure>
                        <img src="<?php echo get_picture_url($list->picture, 'lists'); ?>" alt="Image for <?php $list->name; ?>" />
                    </figure>
                <?php endif; ?>


                <?php $donations = get_donations( $list->id, 'paid'  ); ?>
                <h2>Donations</h2>
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

                    </tbody>
                </table>




            </div>
            <div class="col-sm-6">

                <?php if (has_error()) : ?>
                    <?php show_error_message(); ?>
                <?php endif; ?>
                <h2>Modifier la liste</h2>
                <?php include('includes/edit_list_form.php'); ?>

            </div>
        </div>


    <?php endif; // dont allow other users to see this list ?>
<?php else: ?>
    <p>Aucune liste trouvée </p>
<?php endif; ?>
