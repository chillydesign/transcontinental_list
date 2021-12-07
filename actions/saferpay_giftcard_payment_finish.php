<?php


include('../includes/connect.php');
include('../includes/functions.php');


if (isset($_GET['giftcard_id'])) {

    $giftcard_id = ($_GET['giftcard_id']);
    $giftcard = get_giftcard($giftcard_id);

    if (isset($_GET['success'])) {

        $token = $giftcard->saferpay_token;
        $tid = saferpay_assert_payment($token);
        if ($tid->Transaction->Status == 'AUTHORIZED') {
            $transaction_id = $tid->Transaction->Id;
            $cap = saferpay_capture_transaction($transaction_id);

            if ($cap) {
                // send email to recipient and sender;
                $giftcard->status = 'actif';
                $giftcard->payment_id = $tid->Transaction->Id;
                $giftcard->payer_id = '-';
                update_giftcard_status($giftcard);
                send_giftcard_email($giftcard);



                header('Location: ' .  site_url() . '/boncadeau/?success&giftcard_id=' . $giftcard_id);
            } else {
                header('Location: ' .  site_url() . '/boncadeau/?error=paymentnotexecuted1');
            }
        } else {
            header('Location: ' .  site_url() . '/boncadeau/?error=paymentnotexecuted2');
        }
    } else if (isset($_GET['error'])) {

        $giftcard->status = 'annulé';
        // change status to cancelled
        if (update_giftcard_status($giftcard)) {
            header('Location: ' .  site_url() . '/boncadeau/?error=paymentcancelled');
        } else {
            header('Location: ' .  site_url() . '/boncadeau/?error=statusnotupdated');
        };
    }
} else {
    header('Location: ' .  site_url() . '/boncadeau/?error=nogiftcardid');
}
