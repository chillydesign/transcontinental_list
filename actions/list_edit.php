<?php

include('../includes/connect.php');
include('../includes/functions.php');

$list_id =  get_var('id');
if ( $list_id ) {

    $list = get_list( $list_id );
    $redirect = (has_valid_admin_cookie()) ? '/adminarea/list?id=' . $list_id : '/userarea/list?id=' . $list_id;


    if ( isset($_POST['submit_edit_list']) &&  $list !== null )  {

        // if user id has been posted, add that, otherwise take the logged in users id
        if (has_valid_admin_cookie() && isset($_POST['user_id'])) {
            $user_id = intval($_POST['user_id']);
        } else {
            $current_user  = current_user();
            $user_id = ($current_user)  ? intval($current_user->id) : 0;
        }

        $name = $_POST['name'];

        // only change active status if set by an admin
        if ( has_valid_admin_cookie() ) {
            $active = (isset($_POST['active']))  ? 1 : 0;
        } else {
            $active = $list->active;
        }

        $description = $_POST['description'];
        $picture = (isset($_POST['picture'])) ? $_POST['picture'] : 1;
        $category = (isset($_POST['category'])) ? $_POST['category'] : 'anniversaire';
        $deadline =  $_POST['deadline'];


        if ( has_valid_admin_cookie() || $user_id == $list->user_id ) {

            if ($name != '' ) {

                $list->name = $name;
                $list->description = $description;
                $list->picture = $picture;
                $list->user_id = $user_id;
                $list->active = $active;
                $list->category = $category;
                $list->deadline = $deadline;

                $list_updated = update_list($list);

                if(  $list_updated ) { // if list saves fine
                    header('Location: ' .  site_url() . $redirect . '&success'  );
                } else { // if for some reason the list doesnt save
                    header('Location: ' .  site_url() . $redirect .'&error=listnotsave'  );
                };
            } else { // if list name is blank
                header('Location: ' .  site_url() . $redirect .'&error=listnameblank'  );
            }
        } else { // if list name is blank
            header('Location: ' .  site_url() . $redirect .'&error=notabletoedit'  );
        }
    } else { // if not all post variables have been sent
        header('Location: ' .  site_url() . $redirect .'&error=nosuchlist'  );
    }
} else {
    header('Location: ' .  site_url() . '/?error=nolistidgiven'  );
}

?>
