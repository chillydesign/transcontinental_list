<?php

include('../includes/connect.php');
include('../includes/functions.php');


if ( has_valid_admin_cookie() ) {

    $giftcard_id =  get_var('id');
    if ( $giftcard_id ) {
        $redirect =   site_url()  .  '/adminarea/giftcard?id=' . $giftcard_id;

        if ( isset($_POST['submit_edit_giftcard'])  && isset($_POST['status'])  )  {



            $giftcard = get_giftcard( $giftcard_id );
            $status = $_POST['status'];

            $giftcard->status  = $status;

            $giftcard_updated = update_giftcard($giftcard);

            if ($giftcard_updated) {
                header('Location: ' .  $redirect . '&success'  );
            } else { // if for some reason the giftcard doesnt save
                header('Location: ' .  $redirect . '&error=giftcardnotsave'  );
            }


            var_dump($giftcard);



        } else {  // if not all post variables have been sent
            header('Location: ' .  $redirect . '&error=notallvariables'  );
        }
    } else { // if no giftcardid
        header('Location: ' .  site_url() . '?error=nogiftcardid'  );
    }
} else { // non admins not allowed to edit giftcards
    header('Location: ' .  site_url() . '?error=notallowed'  );
}

?>
