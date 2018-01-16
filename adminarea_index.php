


<h1>Admin area</h1>


<h2>Users</h2>
<ul>
    <?php foreach (  get_users() as $user) : ?>
        <li>
            <a href="<?php get_site_url(); ?>/adminarea/user?id=<?php echo $user->id; ?>">
                <strong><?php echo $user->first_name . ' ' . $user->last_name; ?></strong>
                (Created <?php  echo $user->created_at; ?>)
            </a>
        </li>
    <?php endforeach; ?>

    <li><a href="<?php get_site_url(); ?>/adminarea/newuser">Register a new user</a></li>
</ul>

<br>
<br>
<br>


<h2>Lists</h2>

<ul>
    <?php foreach (  get_lists() as $list) : ?>
        <li>
            <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                <strong><?php echo $list->name; ?></strong>
                (Created <?php  echo $list->created_at; ?>)
            </a>

        </li>
    <?php endforeach; ?>

    <li><a href="<?php get_site_url(); ?>/adminarea/newlist">Create a new list</a></li>
</ul>
