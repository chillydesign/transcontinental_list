<?php

include('../includes/connect.php');
include('../includes/functions.php');

if ( isset($_POST['submit_new_user']) && isset($_POST['email'])   && isset($_POST['password']) && isset($_POST['password_confirmation'] )) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';

    if ( $password == $password_confirmation  ) {


        $user = new stdClass();
        $user->password_digest = encrypt_password($password);
        $user->email = $email;
        $user->first_name = $first_name;
        $user->last_name = $last_name;

        $user_id = insert_new_user($user);

        if(  $user_id ) {

            if (has_valid_admin_cookie()) {
                header('Location: ' .  site_url() . '/adminarea?success'  );
            } else { // if not an admin creating a new user
                header('Location: ' .  site_url() . '/login?success'  );
            }

        } else { // if for some reason the user doesnt save
            header('Location: ' .  site_url() . '/register?error=usernotsave'  );
        };
    } else { // if password doesnt match confirmation
        header('Location: ' .  site_url() . '/register?error=passwordnotmatch'  );
    }
} else { // if not enough post info
    header('Location: ' .  site_url() . '/register?error=unspecified'  );
}

?>
