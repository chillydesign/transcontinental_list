<?php

include('../includes/connect.php');
include('../includes/functions.php');



if ( isset($_POST['list_id'])  && isset($_POST['submit_new_donation']) &&   isset($_POST['email'])  &&   isset($_POST['amount'])  )  {

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $amount = floatval($_POST['amount']);
    $list_id = $_POST['list_id'];

    $list = get_list( $list_id );

    if ( $list !== null &&  $email != '' && $amount > 0   ) {


        if (  is_valid_email($email)) {

            $donation = new stdClass();

            $donation->email = $email;
            $donation->first_name = $first_name;
            $donation->last_name = $last_name;
            $donation->address = $address;
            $donation->phone = $phone;
            $donation->message = $message;
            $donation->amount = convert_to_amount_in_cents($amount);
            $donation->list_id = ($list_id);
            $donation->status = 'créé';


            // if form being submitted by admin
            // let them choose the status
            if (has_valid_admin_cookie()) {
                if (isset($_POST['status'])) {
                    $donation->status = $_POST['status'];
                }
            }


            $donation_id = insert_new_donation($donation);

            if(  $donation_id ) { // if donation saves fine


                // if form being submitted by admin
                // dont need to redirec thtem to PAYPAL
                if (has_valid_admin_cookie()) {
                    header('Location: ' .  site_url() . '/adminarea/list?id='. $list_id  . '?success='. $donation_id  );

                } else { // if submitted by normal user


                    // here do paypal stuff
                    // set up paypal payment and generate a link to send the user to
                    $donation_payment_redirect_link = getDonationPaymentLink($donation_id,  $donation->amount );
                    if ($donation_payment_redirect_link) {
                        //redirect user to paypal
                        header("HTTP/1.1 402 Payment Required");
                        header('Location: ' . ($donation_payment_redirect_link) );
                    } else {
                        header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=paypalnotwork');
                    }


                } // end if submitted by normal user





            } else { // if for some reason the donation doesnt save
                header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=donationnotsave'  );
            };

        } else {
            header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=emailnotvalid'  );
        }
    } else { // if list is not valid, or amount is not big enough or first name blank
        header('Location: ' .  site_url() . '/list/'. $list_id  . '?error=donationnamountblank'  );
    }
} else { // if not all post variables have been sent
    header('Location: ' .  site_url() . '?error=unspecified'  );
}

?>
