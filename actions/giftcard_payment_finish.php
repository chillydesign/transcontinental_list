<?php


include('../includes/connect.php');
include('../includes/functions.php');



if (isset($_GET['giftcard_id'])) {

    $giftcard_id = ($_GET['giftcard_id']);
    $giftcard = get_giftcard($giftcard_id );

    if (isset($_GET['return'])) {

        //$token = $_GET['token'];
        $payment_id = (isset($_GET['paymentId'])) ? $_GET['paymentId'] : '-';
        $payer_id = (isset($_GET['PayerID'])) ? $_GET['PayerID'] : '-';
        $payment_executed  = executePayment( $payment_id, $payer_id );

        if ( $payment_executed  ) {
            $giftcard->status = 'actif';
            $giftcard->payment_id = $payment_id;
            $giftcard->payer_id = $payer_id;
            update_giftcard_status($giftcard);
            // send email to recipient and sender;
            send_giftcard_email($giftcard);
            header('Location: ' .  site_url() . '/giftcard/?success&giftcard_id='. $giftcard_id  );
        } else {
            header('Location: ' .  site_url() . '/giftcard/?error=paymentnotexecuted'  );
        };



    // send email to recipient and sender;
    //    send_giftcard_email($giftcard);
    //     $giftcard->status = 'payé';
    //     $giftcard->payment_id = (isset($_GET['paymentId'])) ? $_GET['paymentId'] : '-';
    //     $giftcard->payer_id = (isset($_GET['PayerID'])) ? $_GET['PayerID'] : '-';
    //     // changes status to payé
    //     if (update_giftcard_status($giftcard)) {
    // //        header('Location: ' .  site_url() . '/giftcard/?success&giftcard_id='. $giftcard_id  );
    //     } else {
    // //        header('Location: ' .  site_url() . '/giftcard/?error=statusnotupdated'  );
    //     };



    } else if (  isset($_GET['cancel']) ) {

        $giftcard->status = 'annulé';
        // change status to cancelled
        if (update_giftcard_status($giftcard)) {
           header('Location: ' .  site_url() . '/giftcard/?error=paymentcancelled'  );
        } else {
           header('Location: ' .  site_url() . '/giftcard/?error=statusnotupdated'  );
        };


    }



} else {
    header('Location: ' .  site_url() . '/giftcard/?error=nogiftcardid'  );

}
