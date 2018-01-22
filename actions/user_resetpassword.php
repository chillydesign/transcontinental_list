<?php

include('../includes/connect.php');
include('../includes/functions.php');

$redirect =  site_url() . "/resetpassword";

if ( isset($_POST['reset_code'])   && isset($_POST['user_resetpassword'])  ) {
    $reset_code = $_POST['reset_code'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $user = get_user_from_reset_code($reset_code);

    if ($user) {
        if ( $password == $password_confirmation  ) {
            if ( strlen($password) > 5 ){

                // add four hours to when the reset token was made
                $reset_token_date_plus_four =  strtotime( $user->reset_password_sent_at   ) + (4 * 60 * 60) ;
                $now_timestamp = intval(date( "U" ));

                // is the token at most four hours old
                if (  $reset_token_date_plus_four > $now_timestamp  ) {
                    $user->password_digest = encrypt_password($password);
                    $update_user_password = update_user_password($user);

                    if ($update_user_password) {
                        header('Location: ' . $redirect .  "/" . $reset_code . '?success' );
                    } else {
                        header('Location: ' . $redirect .  "/" . $reset_code . '?error=couldntupdatepassword'  );
                    }
                } else { // reset token is old
                    header('Location: ' . $redirect .  "/" . $reset_code . '?error=resettokenold'  );
                }


            } else {  // if password is not long enough
                header('Location: ' . $redirect .  "/" . $reset_code . '?error=passwordtooshort'  );
            }
        } else { // if password doesnt match confirmation
            header('Location: ' . $redirect .  "/" . $reset_code . '?error=passwordnotmatch'  );
        }


    } else {
        header('Location: ' . $redirect .  "/" . $reset_code . '?error=codeisinvalid'  );
    }

} else {
    header('Location: ' .  $redirect .  "?error"  );
}





?>
