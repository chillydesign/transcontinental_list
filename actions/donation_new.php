<?php

include('../includes/connect.php');
include('../includes/functions.php');




if ( isset($_POST['list_id'])  && isset($_POST['submit_new_donation']) &&   isset($_POST['email'])  &&   isset($_POST['amount'])  )  {

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
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
            $donation->message = $message;
            $donation->amount = convert_to_amount_in_cents($amount);
            $donation->list_id = deconvert_list_id($list_id);
            $donation->status = 'started';


            $donation_id = insert_new_donation($donation);

            if(  $donation_id ) { // if donation saves fine


                // here do braintree stuff



                header('Location: ' .  site_url() . '/list/'. $list_id  . '?success');
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
