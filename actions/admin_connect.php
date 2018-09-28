<?php

include('../includes/connect.php');
include('../includes/functions.php');

if ( isset($_POST['email'])   && isset($_POST['password'])  ) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin = new stdClass();
    $admin->password_digest = encrypt_password($password);
    $admin->email = $email;
    $admin_id = log_in_admin($admin);

    if(  $admin_id ) {

        $encrypted_id = encrypt_id($admin_id);
        setcookie('tcg_user', false, time() - 1, '/'  );
        setcookie('tcg_admin', $encrypted_id, time()+60*60,  '/'  );
        header('Location: ' .  site_url() . '/adminarea'  );

    } else {
        header('Location: ' .  site_url() . '/adminlogin?error=couldntloginadmin'  );
    };






} else {
    header('Location: ' .  site_url() . '/adminarea?error'  );
}

?>
