

<?php $user = get_user(); ?>
<?php if ($user): ?>
    <h1><?php echo $user->first_name . ' ' . $user->last_name; ?></h1>

    <h2>Lists</h2>
    <ul>
        <?php foreach (  user_lists($user->id) as $list) : ?>
            <li>
                <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                    <strong><?php echo $list->name; ?></strong>
                    (Created <?php  echo timeAgoInWords($list->created_at); ?>)
                </a>

            </li>
        <?php endforeach; ?>

        <li><a class="tc_button" href="<?php get_site_url(); ?>/adminarea/newlist?user_id=<?php echo $user->id; ?>">Create a new list for this user</a></li>
    </ul>



<?php endif; ?>
