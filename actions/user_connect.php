<?php

include('../includes/connect.php');
include('../includes/functions.php');

if ( isset($_POST['email'])   && isset($_POST['password'])  ) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new stdClass();
    $user->password_digest = encrypt_password($password);
    $user->email = $email;
    $user_id = log_in_user($user);

    if(  $user_id ) {

        $encrypted_id = encrypt_id($user_id);
        setcookie('user', $encrypted_id, time()+60*60,  '/'  );
        header('Location: ' .  site_url() . '/userarea'  );

    } else {
        header('Location: ' .  site_url() . '/login?error=couldntlogin'  );
    };






} else {
    header('Location: ' .  site_url() . '/userarea?error'  );
}

?>
