<?php

include('../includes/connect.php');
include('../includes/functions.php');

if ( isset($_POST['email'])   && isset($_POST['user_forgotpassword'])  ) {

    $email = $_POST['email'];


    if ( is_valid_email($email) ) {

        $generate_password_token = generate_password_token($email);
        if( $generate_password_token ) {

            //TODO SEND EMAIL HERE

            header('Location: ' .  site_url() . "/forgotpassword/?success"  );
        } else {
            header('Location: ' .  site_url() . "/forgotpassword?error=couldntresetpassword"  );
        };


    } else {
        header('Location: ' .  site_url() . "/forgotpassword?error=emailnotvalid"  );
    }



} else {
    header('Location: ' .  site_url() . "/forgotpassword?error"  );
}

?>
