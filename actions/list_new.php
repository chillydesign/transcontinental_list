<?php

include('../includes/connect.php');
include('../includes/functions.php');

$redirect = (has_valid_admin_cookie()) ? 'adminarea' : 'userarea';


if ( isset($_POST['submit_new_list']) &&   isset($_POST['name'])   )  {

    // if user id has been posted, add that, otherwise take the logged in users id
    if (isset($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);
        $user = get_user($user_id);
    } else {
        $user  = current_user();
        $user_id = ($user)  ? intval($user->id) : 0;
    }

    $name = $_POST['name'];
    $active = (isset($_POST['active']))  ? 1 : 0;
    $description = $_POST['description'];
    $picture = (isset($_POST['picture'])) ? $_POST['picture'] : 1;
    $category = (isset($_POST['category'])) ? $_POST['category'] : 'anniversaire';
    $deadline = $_POST['deadline'];



    if ( $name != '' && $user_id > 0  ) {

        $list = new stdClass();
        $list->name = $name;
        $list->description = $description;
        $list->picture = $picture;
        $list->user_id = $user_id;
        $list->category = $category;
        $list->deadline = $deadline;
        $list->active = 1;

        $list_id = insert_new_list($list);

        if(  $list_id ) { // if list saves fine

            // need to add list number so email with proper links will send
            $list->list_number = $list_id;
            send_list_created_email( $list, $user );


            header('Location: ' .  site_url() . '/'. $redirect.'/list?id=' . $list_id  );
        } else { // if for some reason the list doesnt save
            header('Location: ' .  site_url() . '/'. $redirect.'/newlist?error=listnotsave'  );
        };
    } else { // if list name is blank
        header('Location: ' .  site_url() . '/'. $redirect.'/newlist?error=listnameblank'  );
    }
} else { // if not all post variables have been sent
    header('Location: ' .  site_url() . '/'. $redirect.'/newlist?error=unspecified'  );
}

?>
