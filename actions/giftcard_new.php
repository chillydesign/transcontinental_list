<?php

include('../includes/connect.php');
include('../includes/functions.php');




if ( isset($_POST['submit_new_giftcard']) && isset($_POST['receiver_email']) && isset($_POST['sender_email'])  && isset($_POST['amount'])  )  {

    $sender_first_name = $_POST['sender_first_name'];
    $sender_last_name = $_POST['sender_last_name'];
    $sender_email = $_POST['sender_email'];
    $receiver_first_name = $_POST['receiver_first_name'];
    $receiver_last_name = $_POST['receiver_last_name'];
    $receiver_email = $_POST['receiver_email'];
    $message = $_POST['message'];
    $picture = (isset($_POST['picture'])) ? $_POST['picture'] : 1;
    $amount = floatval($_POST['amount']);


    if ( $amount > 0   ) {


        if (  is_valid_email($sender_email)  && is_valid_email($receiver_email) ) {

            $giftcard = new stdClass();

            $giftcard->sender_first_name = $sender_first_name;
            $giftcard->sender_last_name = $sender_last_name;
            $giftcard->sender_email = $sender_email;
            $giftcard->receiver_first_name = $receiver_first_name;
            $giftcard->receiver_last_name = $receiver_last_name;
            $giftcard->receiver_email = $receiver_email;
            $giftcard->message = $message;
            $giftcard->picture = $picture;
            $giftcard->amount = convert_to_amount_in_cents($amount);
            $giftcard->status = 'started';


            $giftcard_id = insert_new_giftcard($giftcard);

            if(  $giftcard_id ) { // if giftcard saves fine

                // here do paypal stuff
                // set up paypal payment and generate a link to send the user to
                $giftcard_payment_redirect_link = getGiftCardPaymentLink($giftcard_id,  $giftcard->amount  );
                if ($giftcard_payment_redirect_link) {
                    //redirect user to paypal
                    header("HTTP/1.1 402 Payment Required");
                    header('Location: ' . ($giftcard_payment_redirect_link) );
                } else {
                    header('Location: ' .  site_url() . '/giftcard/?error=paypalnotwork'  );
                }

            } else { // if for some reason the giftcard doesnt save
                header('Location: ' .  site_url() . '/giftcard/?error=giftcardnotsave'  );
            };
        } else {
            header('Location: ' .  site_url() . '/giftcard/?error=emailnotvalid'  );
        }
    } else { // if amount not big enough
        header('Location: ' .  site_url() . '/giftcard/?error=giftcardamountlow'  );
    }
} else { // if not all post variables have been sent
    header('Location: ' .  site_url() . '/giftcard/?error=unspecified'  );
}

?>
