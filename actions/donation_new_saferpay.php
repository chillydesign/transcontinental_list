<?php

include('../includes/connect.php');
include('../includes/functions.php');



if (
    isset($_POST['list_id'])  &&
    isset($_POST['submit_new_donation']) &&
    isset($_POST['email'])  &&
    isset($_POST['amount'])
) {

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $post_code = $_POST['post_code'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $message = $_POST['message'];
    $amount = floatval($_POST['amount']);
    $list_id = $_POST['list_id'];

    $list = get_list($list_id);

    if ($list !== null &&  $email != '' && $amount > 0) {


        if (is_valid_email($email)) {

            $donation = new stdClass();

            $donation->email = $email;
            $donation->first_name = $first_name;
            $donation->last_name = $last_name;
            $donation->address = $address;
            $donation->post_code = $post_code;
            $donation->town = $town;
            $donation->country = $country;
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

            if ($donation_id) { // if donation saves fine


                // if form being submitted by admin
                // dont need to redirec thtem to SAFERPAY
                if (has_valid_admin_cookie()) {
                    header('Location: ' .  site_url() . '/adminarea/list?id=' . $list_id  . '?success=' . $donation_id);
                } else { // if submitted by normal user


                    // SAFERPAY
                    // SAFERPAY
                    // SAFERPAY
                    $redirect_base = site_url() . '/actions/saferpay_donation_payment_finish.php?donation_id=' . $donation_id;
                    $tid = generate_saferpay_payment_page('donation', $donation->amount, 'Liste de Mariage ' . $list_id,  $redirect_base, $donation_id);
                    if (isset($tid->RedirectUrl)) {

                        $donation->saferpay_token = $tid->Token;
                        $donation->id = $donation_id;
                        if (update_donation_saferpay_token($donation)) {
                            header("HTTP/1.1 402 Payment Required");
                            header('Location: ' . ($tid->RedirectUrl));
                        } else {
                            header('Location: ' .  site_url() . '/mariage/' . $list_id  . '?error=saferpaynotwork1');
                        }
                    } else {
                        header('Location: ' .  site_url() . '/mariage/' . $list_id  . '?error=saferpaynotwork2');
                    }
                    // SAFERPAY
                    // SAFERPAY
                    // SAFERPAY



                } // end if submitted by normal user


            } else { // if for some reason the donation doesnt save


                header('Location: ' .  site_url() . '/mariage/' . $list_id  . '?error=donationnotsave');
            };
        } else {
            header('Location: ' .  site_url() . '/mariage/' . $list_id  . '?error=emailnotvalid');
        }
    } else { // if list is not valid, or amount is not big enough or first name blank
        header('Location: ' .  site_url() . '/mariage/' . $list_id  . '?error=donationnamountblank');
    }
} else { // if not all post variables have been sent
    header('Location: ' .  site_url() . '?error=unspecified');
}
