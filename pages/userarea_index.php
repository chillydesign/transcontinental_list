<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>

<div class="container">
    <h1>Vos listes</h1>
    <?php $lists = user_lists(); ?>
    <?php if ( sizeof($lists) > 0 ) : ?>
        <p>Vous pouvez consulter vos listes et leur statut ou les modifier ici.</p>
        <ul>
            <?php foreach (  $lists as $list) : ?>
                <li class="list_list_item">
                    <a href="<?php get_site_url(); ?>/userarea/list?id=<?php echo $list->list_number; ?>">
                        <div class="list_list list_list_img">
                            <img src="<?php echo site_url();?>/images/lists/<?php echo $list->picture; ?>.jpg">
                        </div>
                        <div class="list_list list_list_desc">
                            <strong><?php echo $list->name; ?></strong>
                            <!-- (Créée le <?php  echo timeAgoInWords($list->created_at); ?>) -->
                            <span class="creation_date">Créée le <?php  echo nice_date($list->created_at); ?></span>
                        </div>
                        <div class="list_list list_list_amount">
                            <?php $donations = get_donations( $list->id , 'payé' ); ?>
                            <?php echo sum_donations($donations); ?>
                        </div>
                    </a>

                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p><em>Vous n'avez pas encore de listes.</em></p>
    <?php endif; ?>
    <p><a class="list_button" href="<?php get_site_url(); ?>/userarea/newlist">Créer une liste</a></p>

</div>
