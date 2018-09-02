<?php

include('../includes/connect.php');
include('../includes/functions.php');




if ( has_valid_admin_cookie() && isset($_POST['submit_new_withdrawal']) &&   isset($_POST['amount']) && isset($_POST['giftcard_id'] )  )  {

    $giftcard_id = $_POST['giftcard_id'];
    $amount = floatval($_POST['amount']);
    $message = $_POST['message'];




    $withdrawal = new stdClass();
    $withdrawal->amount = convert_to_amount_in_cents($amount);
    $withdrawal->message = $message;
    $withdrawal->giftcard_id = $giftcard_id;

    $withdrawal_id = insert_new_withdrawal($withdrawal);

    if(  $withdrawal_id ) { // if list saves fine

        header('Location: ' .  site_url() . '/adminarea/giftcard?id=' . $giftcard_id  );
    } else { // if for some reason the list doesnt save
        header('Location: ' .  site_url() . '/adminarea/giftcard?error=nowithdrawal&id=' . $giftcard_id  );
    };

} else { // if not all post variables have been sent
    header('Location: ' .  site_url() . '/adminarea/giftcard?error=unspecified&id=' . $giftcard_id  );
}

?>
