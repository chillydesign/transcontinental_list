<?php

include('../includes/connect.php');
include('../includes/functions.php');

$user_id =  get_var('id');
if ( $user_id ) {

    $user = get_user( $user_id );
    $redirect = site_url() .  '/adminarea/users';

    if ( $user !== null )  {


        if ( has_valid_admin_cookie() ) {

            $user_deleted = delete_user($user);

            if(  $user_deleted ) { // if user deletes fine
                header('Location: ' .  $redirect . '?success'  );
            } else { // if for some reason the user doesnt delete
                header('Location: ' .  $redirect .'?error=usernotdeleted'  );
            };

        } else {
            header('Location: ' . $redirect. '?error=notallowed'  );
        } /// end of cant delete


    } else { // if user is null
        header('Location: ' .   $redirect .'?error=nosuchuser'  );
    }
} else {
    header('Location: ' . $redirect . '?error=nouseridgiven'  );
}

?>
