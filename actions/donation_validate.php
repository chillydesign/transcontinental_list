<?php

// ONLY FOR AJAX
// MUST SUBMIT POST submit_ajax

include('../includes/connect.php');
include('../includes/functions.php');


if ( has_valid_admin_cookie() ) {

    $donation_id =  $_POST['donation_id'];

    if ( $donation_id ) {


        if ( isset($_POST['submit_ajax'])  && isset($_POST['validated'])  )  {



            $donation = get_donation( $donation_id );
            $validated = $_POST['validated'];

            $donation->validated  = $validated;

            $donation_updated = update_donation_validated($donation);

            if ($donation_updated) {
                // echo 'success';
                http_response_code(204);

            } else { // if for some reason the giftcard doesnt save
                // echo 'donationnotsave';
                http_response_code(500);

            }

        } else {  // if not all post variables have been sent
            // echo 'notallvariables' ;
            http_response_code(406);

        }
    } else { // if no giftcardid
        // echo 'nogiftcardid' ;
        http_response_code(406);

    }
} else { // non admins not allowed to edit giftcards
    // echo 'notallowed' ;
    http_response_code(403);

}

?>
