<h1>New List</h1>


<?php if (has_error()) : ?>
    <?php show_error_message(); ?>
<?php endif; ?>

<form action="<?php get_site_url(); ?>/actions/list_new.php" method="post">


    <p>
        <input type="text" name="name" placeholder="name" />
    </p>
    <p>
        <input type="text" name="description" placeholder="description" />
    </p>
    <p>
            <select id="picture" name="picture">
                <option value="1">Picture 1</option>
                <option value="2">Picture 2</option>
                <option value="3">Picture 3</option>
            </select>
    </p>
    <p>
        <input type="submit" name="submit_new_list" value="Submit" />
    </p>


</form>
