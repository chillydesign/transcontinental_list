<?php

include('../includes/connect.php');
include('../includes/functions.php');

$redirect = (has_valid_admin_cookie()) ? 'adminarea/newuser' : 'register';

if (isset($_POST['submit_new_user']) && isset($_POST['email'])   && isset($_POST['password']) && isset($_POST['password_confirmation'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
    $address = (isset($_POST['address'])) ? $_POST['address'] : '';
    $phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';

    // Fake thing if spam people fill this in ignore the request as field should be hidden
    $city = (isset($_POST['city'])) ? $_POST['city'] : '';

    if ($city == '') {
        if (is_valid_email($email)) {
            if ($password == $password_confirmation) {
                if (strlen($password) > 5) {
                    if ($last_name != '' && $first_name != '' && $address != '') {

                        $user = new stdClass();
                        $user->password_digest = encrypt_password($password);
                        $user->email = $email;
                        $user->first_name = $first_name;
                        $user->last_name = $last_name;
                        $user->address = $address;
                        $user->phone = $phone;

                        $user_id = insert_new_user($user);

                        if ($user_id) {

                            if (has_valid_admin_cookie()) {
                                header('Location: ' .  site_url() . '/adminarea?success');
                            } else { // if not an admin creating a new user
                                send_user_welcome_email($user);
                                header('Location: ' .  site_url() . '/login?success');
                            }
                        } else { // if for some reason the user doesnt save
                            header('Location: ' .  site_url() . '/' . $redirect . '?error=usernotsave');
                        };
                    } else { // if for some reason the user doesnt save
                        header('Location: ' .  site_url() . '/' . $redirect . '?error=nameblank');
                    };
                } else {  // if password is not long enough
                    header('Location: ' .  site_url() . '/' . $redirect . '?error=passwordtooshort');
                }
            } else { // if password doesnt match confirmation
                header('Location: ' .  site_url() . '/' . $redirect . '?error=passwordnotmatch');
            }
        } else { // if email is not valid
            header('Location: ' .  site_url() . '/' . $redirect . '?error=emailnotvalid');
        }
    } else {
        header('Location: ' .  site_url() . '/' . $redirect . '?error=spam');
    }
} else { // if not enough post info
    header('Location: ' .  site_url() . '/' . $redirect . '?error=unspecified');
}
