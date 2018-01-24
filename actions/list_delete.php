<?php

include('../includes/connect.php');
include('../includes/functions.php');

$list_id =  get_var('id');
if ( $list_id ) {

    $list = get_list( $list_id );
    $redirect = (has_valid_admin_cookie()) ? site_url() . '/adminarea/lists' :  site_url() . '/userarea/';

    if ( $list !== null )  {


        $can_delete = false;
        if (has_valid_admin_cookie()) {
            $can_delete = true;
        } else if (  current_user()   ) {
            if (  current_user()->id ==  $list->user_id  ) {
                $can_delete = true; // only allow if user is owner of list
            }
        }

        if ($can_delete) {

            $list_deleted = delete_list($list);

            if(  $list_deleted ) { // if list deletes fine
                header('Location: ' .  $redirect . '?success'  );
            } else { // if for some reason the list doesnt delete
                header('Location: ' .  $redirect .'?error=listnotdeleted'  );
            };

        } else {
            header('Location: ' . $redirect. '?error=notallowed'  );
        } /// end of cant delete


    } else { // if list is null
        header('Location: ' .   $redirect .'?error=nosuchlist'  );
    }
} else {
    header('Location: ' . $redirect . '?error=nolistidgiven'  );
}

?>
