<?php

include('../includes/connect.php');
include('../includes/functions.php');



if (isset($_GET['id'])  ) :

    $giftcard = get_giftcard(  $_GET['id'] );

    if ($giftcard):

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giftcard</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <style>
    * {
        margin: 0;
        padding: 0;
        border: 0;
    }
    body#giftcard_body {
        font: normal 62.5%  'Roboto Condensed',  helvetica,arial
    }

    img {
        width: 500px;
        height: auto;
        margin: 0  0 30px;
    }

    #inner {
        width: 300px;


    }
    h1 {
        font-size: 5em;
        padding: 30px 0 ;
    }

    </style>
</head>
<body id="giftcard_body">

    <?php if (picture_exists( $giftcard->picture, 'giftcards' )) : ?>
        <img src="<?php echo get_picture_url($giftcard->picture, 'giftcards'); ?>" alt="">
    <?php endif; ?>

    <div id="inner">
        <h1>Giftcard #<?php echo $giftcard->id; ?></h1>

        <ul>
            <li><strong>Pour:</strong> <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?> <br />
                <strong>Email</strong>: <?php echo $giftcard->receiver_email; ?><br> <br> </li>
            <li><strong>De la part de:</strong> <?php echo $giftcard->sender_first_name ; ?> <?php echo $giftcard->sender_last_name; ?> <br />
                <strong>Email</strong>: <?php echo $giftcard->sender_email; ?> <br />
                <strong>Téléphone</strong>: <?php echo $giftcard->sender_phone; ?><br />
                <strong>Adresse</strong>: <?php echo $giftcard->sender_address; ?> <br><br>

            </li>

            <li><strong>Montant:</strong> <?php echo convert_cents_to_currency($giftcard->amount); ?></li>
            <li><strong>Créé:</strong> <?php echo nice_date($giftcard->created_at); ?></li>
            <li><strong>Valide jusqu'au:</strong> <?php echo nice_date($giftcard->expires_at); ?></li>
        </ul>


    </div>


</body>
</html>

        <?php


    else:
        header('Location: ' .  site_url() . '&error=nogiftcard'  );
    endif;


else:
    header('Location: ' .  site_url() . '?error=nogiftcard'  );
endif;

?>
