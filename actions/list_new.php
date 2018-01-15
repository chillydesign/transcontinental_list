<?php

include('../includes/connect.php');
include('../includes/functions.php');

$current_user  = current_user();


if ( isset($_POST['submit_new_list']) &&   isset($_POST['name'])   &&  $current_user !== null  )  {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $picture = (isset($_POST['picture'])) ? $_POST['picture'] : 1;

    if ( $name != ''  ) {


        $list = new stdClass();
        $list->name = $name;
        $list->description = $description;
        $list->picture = $picture;
        $list->user_id = intval($current_user->id);

        $list_id = insert_new_list($list);

        if(  $list_id ) { // if list saves fine
            header('Location: ' .  site_url() . '/userarea/list?id=' . $list_id  );
        } else { // if for some reason the list doesnt save
            header('Location: ' .  site_url() . '/userarea/newlist?error=listnotsave'  );
        };
    } else { // if list name is blank
        header('Location: ' .  site_url() . '/userarea/newlist?error=listnameblank'  );
    }
} else { // if not all post variables have been sent
    header('Location: ' .  site_url() . '/userarea/newlist?error=unspecified'  );
}

?>
