<?php

include('../includes/connect.php');
include('../includes/functions.php');


$redirect = (has_valid_admin_cookie()) ? '/adminarea/newgiftcard' : '/giftcard';


if (
    isset($_POST['submit_new_giftcard']) &&
    isset($_POST['receiver_email']) &&
    isset($_POST['sender_email'])  &&
    isset($_POST['amount'])
) {

    $sender_first_name = $_POST['sender_first_name'];
    $sender_last_name = $_POST['sender_last_name'];
    $sender_email = $_POST['sender_email'];
    $sender_phone = $_POST['sender_phone'];
    $sender_address = $_POST['sender_address'];
    $receiver_first_name = $_POST['receiver_first_name'];
    $receiver_last_name = $_POST['receiver_last_name'];
    $receiver_email = $_POST['receiver_email'];
    $message = $_POST['message'];
    $picture = (isset($_POST['picture'])) ? $_POST['picture'] : 1;
    $amount = floatval($_POST['amount']);


    if ($amount > 0) {


        if (is_valid_email($sender_email)  && is_valid_email($receiver_email)) {

            $giftcard = new stdClass();

            $giftcard->sender_first_name = $sender_first_name;
            $giftcard->sender_last_name = $sender_last_name;
            $giftcard->sender_email = $sender_email;
            $giftcard->sender_phone = $sender_phone;
            $giftcard->sender_address = $sender_address;
            $giftcard->receiver_first_name = $receiver_first_name;
            $giftcard->receiver_last_name = $receiver_last_name;
            $giftcard->receiver_email = $receiver_email;
            $giftcard->message = $message;
            $giftcard->picture = $picture;
            $giftcard->amount = convert_to_amount_in_cents($amount);
            $giftcard->status =  (has_valid_admin_cookie()) ? 'actif' :  'non payé';



            $giftcard_id = insert_new_giftcard($giftcard);

            if ($giftcard_id) { // if giftcard saves fine

                $giftcard->id = $giftcard_id;

                // if an admin making it, dont do paypal stuff
                if (has_valid_admin_cookie()) {
                    // send emails now if an admin is cretaing it
                    $giftcard = get_giftcard($giftcard_id);
                    send_giftcard_email($giftcard);
                    header('Location: ' .  site_url() .  '/adminarea/giftcard/?id=' .  $giftcard_id);
                } else {


                    // SAFERPAY
                    // SAFERPAY
                    // SAFERPAY
                    $redirect_base = site_url() . '/actions/saferpay_giftcard_payment_finish.php?giftcard_id=' . $giftcard_id;
                    $tid = generate_saferpay_payment_page('giftcard', $giftcard->amount, 'giftcard', $redirect_base, $giftcard_id);
                    if (isset($tid->RedirectUrl)) {

                        $giftcard->saferpay_token = $tid->Token;
                        $giftcard->id = $giftcard_id;
                        if (update_giftcard_saferpay_token($giftcard)) {
                            header("HTTP/1.1 402 Payment Required");
                            header('Location: ' . ($tid->RedirectUrl));
                        } else {
                            header('Location: ' .  site_url() . $redirect  . '/?error=saferpaynotwork1');
                        }
                    } else {
                        var_dump($tid);
                        // header('Location: ' .  site_url() . $redirect  . '/?error=saferpaynotwork2');
                    }
                    // SAFERPAY
                    // SAFERPAY
                    // SAFERPAY

                    // // PAYPAL
                    // // PAYPAL
                    // // PAYPAL
                    // // if a normal user making it, send them to paypal
                    // // here do paypal stuff
                    // // set up paypal payment and generate a link to send the user to
                    // $giftcard_payment_redirect_link = getPaypalGiftCardPaymentLink($giftcard_id,  $giftcard->amount);
                    // if ($giftcard_payment_redirect_link) {
                    //     //redirect user to paypal
                    //     header("HTTP/1.1 402 Payment Required");
                    //     header('Location: ' . ($giftcard_payment_redirect_link));
                    // } else {
                    //     header('Location: ' .  site_url() .  $redirect . '/?error=paypalnotwork');
                    // }
                    // // PAYPAL
                    // // PAYPAL
                    // // PAYPAL


                };
            } else { // if for some reason the giftcard doesnt save
                // header('Location: ' .  site_url() .  $redirect . '/?error=giftcardnotsave');
            };
        } else {
            header('Location: ' .  site_url() .  $redirect . '/?error=emailnotvalid');
        }
    } else { // if amount not big enough
        header('Location: ' .  site_url() .  $redirect . '/?error=giftcardamountlow');
    }
} else { // if not all post variables have been sent
    header('Location: ' .  site_url() .  $redirect . '/?error=unspecified');
}
