<?php

include('../includes/connect.php');
include('../includes/functions.php');

$giftcard_id =  get_var('id');
if ( $giftcard_id ) {

    $giftcard = get_giftcard( $giftcard_id );
    $redirect = site_url() .  '/adminarea/giftcards';

    if ( $giftcard !== null )  {


        if ( has_valid_admin_cookie() ) {

            $giftcard_deleted = delete_giftcard($giftcard);

            if(  $giftcard_deleted ) { // if giftcard deletes fine
                header('Location: ' .  $redirect . '?success'  );
            } else { // if for some reason the giftcard doesnt delete
                header('Location: ' .  $redirect .'?error=giftcardnotdeleted'  );
            };

        } else {
            header('Location: ' . $redirect. '?error=notallowed'  );
        } /// end of cant delete


    } else { // if giftcard is null
        header('Location: ' .   $redirect .'?error=nosuchgiftcard'  );
    }
} else {
    header('Location: ' . $redirect . '?error=nogiftcardidgiven'  );
}

?>
