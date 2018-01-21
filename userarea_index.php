<h1>Vos listes</h1>


<ul>
    <?php foreach (  user_lists() as $list) : ?>
        <li>
            <a href="<?php get_site_url(); ?>/userarea/list?id=<?php echo $list->list_number; ?>">
                <strong><?php echo $list->name; ?></strong>
                <!-- (Créée le <?php  echo timeAgoInWords($list->created_at); ?>) -->
                <span class="creation_date">Créée le <?php  echo date('d/m/Y', strtotime($list->created_at)); ?></span>
            </a>

        </li>
    <?php endforeach; ?>

    <li><a href="<?php get_site_url(); ?>/userarea/newlist">Créer une liste</a></li>
</ul>
