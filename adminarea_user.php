<a href="<?php get_site_url(); ?>/adminarea/">Back to admin area</a>

<?php $user = get_user(); ?>
<?php if ($user): ?>
    <h1><?php echo $user->first_name . ' ' . $user->last_name; ?></h1>


    <ul>
        <?php foreach (  user_lists($user->id) as $list) : ?>
            <li>
                <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                    <strong><?php echo $list->name; ?></strong>
                    (Created <?php  echo $list->created_at; ?>)
                </a>

            </li>
        <?php endforeach; ?>

        <li><a href="<?php get_site_url(); ?>/adminarea/newlist">Create a new list for this user</a></li>
    </ul>



<?php endif; ?>
