<h1>User area</h1>


<ul>
    <?php foreach (  user_lists() as $list) : ?>
        <li>
            <a href="<?php get_site_url(); ?>/userarea/list?id=<?php echo $list->list_number; ?>">
                <strong><?php echo $list->name; ?></strong>
                (Created <?php  echo $list->created_at; ?>)
            </a>

        </li>
    <?php endforeach; ?>

    <li><a href="<?php get_site_url(); ?>/userarea/newlist">Create a new list</a></li>
</ul>
