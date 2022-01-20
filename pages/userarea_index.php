<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>

<div class="container">
    <h1><?php t('vos_listes'); ?></h1>
    <?php $lists = user_lists(); ?>
    <?php if (sizeof($lists) > 0) : ?>
        <p><?php t('view_lists_status'); ?>.</p>
        <ul>
            <?php foreach ($lists as $list) : ?>
                <li class="list_list_item">
                    <a href="<?php get_site_url(); ?>/userarea/list?id=<?php echo $list->id; ?>">
                        <div class="list_list list_list_img">
                            <img src="<?php echo site_url(); ?>/images/lists/<?php echo $list->picture; ?>.jpg">
                        </div>
                        <div class="list_list list_list_desc">
                            <strong><?php echo $list->name; ?></strong>
                            <!-- (<?php t('creee_le'); ?> <?php echo timeAgoInWords($list->created_at); ?>) -->
                            <span class="creation_date"><?php t('creee_le'); ?> <?php echo nice_date($list->created_at); ?></span>
                        </div>
                        <div class="list_list list_list_amount">
                            <?php $donations = get_donations($list->id, 'payé'); ?>
                            <?php echo sum_donations($donations); ?>
                        </div>
                    </a>

                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p><em><?php t('no_lists_yet'); ?>.</em></p>
    <?php endif; ?>
    <p><a class="list_button" href="<?php get_site_url(); ?>/userarea/newlist"><?php t('creer_une_liste'); ?></a></p>

</div>