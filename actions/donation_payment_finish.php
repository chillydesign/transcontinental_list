<?php


include('../includes/connect.php');
include('../includes/functions.php');



if (isset($_GET['donation_id'])) {

    $donation_id = ($_GET['donation_id']);
    $donation = get_donation($donation_id );
    $list_id = convert_list_id($donation->list_id);
    $list = get_list($list_id);


    if (isset($_GET['return'])) {

            //$token = $_GET['token'];
            $payment_id = (isset($_GET['paymentId'])) ? $_GET['paymentId'] : '-';
            $payer_id = (isset($_GET['PayerID'])) ? $_GET['PayerID'] : '-';

            $payment_executed  = executeDonationPayment( $payment_id, $payer_id, $donation );


            if ( $payment_executed  ) {
                // send email to recipient and sender;
                $donation->status = 'payé';
                $donation->payment_id = $payment_id;
                $donation->payer_id = $payer_id;
                update_donation_status($donation)
                send_donation_email($donation, $list);
                header('Location: ' . site_url() . '/list/'. $list_id  . '?success&donation_id='. $donation_id  );
            } else {
                header('Location: ' . site_url() . '/list/'. $list_id  . '?error=paymentnotexecuted'  );
            };



    } else if (  isset($_GET['cancel']) ) {

        $donation->status = 'annulé';
        // change status to cancelled
        if (update_donation_status($donation)) {
            header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=paymentcancelled'  );
        } else {
            header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=statusnotupdated'  );
        };


    }



} else {
    header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=nodonationid'  );
}


?>
