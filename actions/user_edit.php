<?php

include('../includes/connect.php');
include('../includes/functions.php');

$user_id =  get_var('id');
if ( $user_id ) {

    if (has_valid_admin_cookie() ) {
        $user = get_user( $user_id );
    } else if (current_user() ) {
        $user  = current_user();
        $user_id = $user->id;
    } else {
        $user = null;
    }
    $redirect = (has_valid_admin_cookie()) ? '/adminarea/useredit?id=' . $user_id : '/userarea/account?a';


    if ( isset($_POST['submit_edit_user']) &&  $user !== null )  {



        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
        $last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
        $address = (isset($_POST['address'])) ? $_POST['address'] : '';
        $phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';


        if ($first_name != '' && $last_name != ''  && is_valid_email($email) ) {

            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->address = $address;
            $user->phone = $phone;

            $user_updated = update_user($user);

            if(  $user_updated ) { // if user saves fine
                header('Location: ' .  site_url() . $redirect . '&success'  );
            } else { // if for some reason the user doesnt save
                header('Location: ' .  site_url() . $redirect .'&error=usernotsave'  );
            };
        } else { // if user name is blank
            header('Location: ' .  site_url() . $redirect .'&error=usernameblank'  );
        }

    } else { // if not all post variables have been sent
        header('Location: ' .  site_url() . $redirect .'&error=nosuchuser'  );
    }
} else {
    header('Location: ' .  site_url() . '/?error=nouseridgiven'  );
}

?>
