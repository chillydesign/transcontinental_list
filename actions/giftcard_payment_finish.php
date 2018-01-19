<?php


include('../includes/connect.php');
include('../includes/functions.php');



if (isset($_GET['giftcard_id'])) {

    $giftcard_id = ($_GET['giftcard_id']);
    $giftcard = get_giftcard($giftcard_id );

    if (isset($_GET['return'])) {

        // send email to recipient and sender;
        send_giftcard_email($giftcard);

        $giftcard->status = 'paid';
        $giftcard->payment_id = (isset($_GET['paymentId'])) ? $_GET['paymentId'] : '-';
        $giftcard->payer_id = (isset($_GET['PayerID'])) ? $_GET['PayerID'] : '-';
        // changes status to paid
        if (update_giftcard_status($giftcard)) {
            header('Location: ' .  site_url() . '/giftcard/?success&giftcard_id='. $giftcard_id  );
        } else {
            header('Location: ' .  site_url() . '/giftcard/?error=statusnotupdated'  );
        };



    } else if (  isset($_GET['cancel']) ) {

        $giftcard->status = 'cancelled';
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


 ?>
