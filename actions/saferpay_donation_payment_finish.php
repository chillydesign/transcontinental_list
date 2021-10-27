<?php


include('../includes/connect.php');
include('../includes/functions.php');



if (isset($_GET['donation_id'])) {

    $donation_id = ($_GET['donation_id']);
    $donation = get_donation($donation_id);
    $list_id = ($donation->list_id);
    $list = get_list($list_id);


    if (isset($_GET['success'])) {

        $token = $donation->saferpay_token;
        $tid = saferpay_assert_payment($token);
        if ($tid->Transaction->Status == 'AUTHORIZED') {
            $transaction_id = $tid->Transaction->Id;
            $cap = saferpay_capture_transaction($transaction_id);

            if ($cap) {
                // send email to recipient and sender;
                $donation->status = 'payé';
                $donation->payment_id = $tid->Transaction->Id;
                $donation->payer_id = '-';
                update_donation_status($donation);
                send_donation_email($donation, $list);
                header('Location: ' . site_url() . '/list/' . $list_id  . '?success&donation_id=' . $donation_id);
            } else {
                header('Location: ' . site_url() . '/list/' . $list_id  . '?error=paymentnotexecuted1');
            }
        } else {
            header('Location: ' . site_url() . '/list/' . $list_id  . '?error=paymentnotexecuted2');
        }
    } else if (isset($_GET['error'])) {

        $donation->status = 'annulé';
        // change status to cancelled
        if (update_donation_status($donation)) {
            header('Location: ' .  site_url() . '/list/' . $list_id  . '?error=paymentcancelled');
        } else {
            header('Location: ' .  site_url() . '/list/' . $list_id  . '?error=statusnotupdated');
        };
    }
} else {
    header('Location: ' .  site_url() . '/list/' . $list_id  . '?error=nodonationid');
}
