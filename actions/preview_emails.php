<?php


include('../includes/connect.php');
include('../includes/functions.php');


$donation = get_donation(13);
$list = get_list(1);
$user = get_user(1);
$giftcard = get_giftcard(1);

send_donation_email($donation, $list);

send_list_created_email($list, $user);


send_user_welcome_email($user);


send_user_reset_password_email($user);


send_giftcard_email($giftcard);
