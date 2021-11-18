<?php

include('../includes/connect.php');
include('../includes/functions.php');



if (isset($_GET['id'])) :

  $giftcard = get_giftcard($_GET['id']);

  if ($giftcard) :

?>
    <!DOCTYPE html>
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
          font: normal 62.5% 'Roboto Condensed', helvetica, arial
        }

        .pic {
          position: relative;
        }

        img {
          width: 100%;
          height: auto;
          margin: 0 0 30px;
        }

        img.white {
          position: absolute;
          bottom: -10px;
          left: 0;
          right: 0;
        }

        #inner {
          width: 80%;
          margin: 0 10%;
          position: absolute;
          top: 150px;
          background: rgba(255, 255, 255, 0.7);
          /* padding: 20px 50px 50px; */
          padding: 50px 50px;
          box-sizing: border-box;
          min-height: calc(100vh - 400px);
          border-top: solid 8px #e30129;



        }

        h1 {
          font-size: 25px;
          padding: 30px 50px;
          text-align: center;
          background: rgba(255, 255, 255, 0.8);
          margin: -40px -50px 50px;
        }

        span.tagline {
          display: block;
          font-size: 0.8em;
          font-weight: normal;
          font-style: italic;
        }

        .logo {
          margin-top: 30px;
          width: 200px;
          float: right;
        }

        .logo img {
          width: 200px;
        }

        .line {
          width: calc(100% + 100px);
          margin: 0 -50px;
          float: right;
          background: #e30129;
          height: 5px;
        }

        .col {
          width: calc(50% - 50px);
          display: inline-block;
          vertical-align: top;
          margin-top: -20px;
          padding: 20px 0 20px 22px;
          border-left: solid 2px #e30129;
          margin-bottom: 30px;
        }

        .first-col {
          padding: 20px 0 20px 0;
          border-left: none;
          margin-right: 22px;
        }

        blockquote {
          font-size: 2em;
          text-align: justify;
          font-style: italic;
          color: #555;
          position: relative;
          margin-bottom: 40px;
        }

        blockquote:before,
        blockquote:after {
          content: '';
          background-image: url('https://transcontinental.ch/wp-content/themes/transcontinental2/img/quote.png');
          background-repeat: no-repeat;
          background-position: top left;
          background-size: contain;
          height: 90px;
          width: 80px;
          position: absolute;
          opacity: 0.6;
          top: -10px;
          left: -10px;

        }

        blockquote:after {
          left: auto;
          right: 30px;
          top: auto;
          bottom: -20px;
          transform: rotate(180deg);
        }

        p {
          font-size: 1.6em;
        }

        h2 {

          font-size: 1.8em;
          margin-bottom: 20px;
          color: hsla(349, 60%, 40%, 1);
          text-align: center;
        }
      </style>
    </head>

    <body id="giftcard_body">

      <?php if (picture_exists($giftcard->picture, 'giftcards')) : ?>
        <div class="pic">
          <img src="<?php echo get_picture_url($giftcard->picture, 'giftcards'); ?>" alt="">
          <img src="https://transcontinental.ch/wp-content/themes/transcontinental2/img/white-gradient.png" alt="" class="white">
        <?php endif; ?>

        <div id="inner">
          <!-- <div class="line"></div> -->
          <h1><?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?>, vous avez reçu un bon cadeau d'une valeur de <?php echo convert_cents_to_currency($giftcard->amount); ?> <span style="display:inline-block;"><span class="tagline">pour le voyage de vos rêves organisé par l'agence Transcontinental.ch</span></h1>

          <div class="col first-col">

            <p>
              <strong>De la part de :</strong><br>
              <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> <br />
              <?php echo $giftcard->sender_email; ?><br>
              <!-- <?php echo $giftcard->sender_address; ?> <br> -->
              <!-- <?php echo $giftcard->sender_phone; ?><br /> -->
            </p>
            <p>
              <strong>Bon cadeau numéro <?php echo $giftcard->id; ?></strong><br>
              Montant : <?php echo convert_cents_to_currency($giftcard->amount); ?><br>
              Valide jusqu'au: <?php echo nice_date($giftcard->expires_at); ?>



          </div>

          <div class="col">
            <blockquote>
              <?php echo $giftcard->message; ?>
            </blockquote>
          </div>
          <h2>Venez organiser votre voyage à notre agence à l'adresse
            <?php if (zenith_site()) { ?>
              Zénith Voyages Gland 9, avenue du Mont-Blanc 1196 Gland <br> ou contactez-nous par email à l'adresse info@zenithvoyages.ch ou par téléphone au+41 22 364 46 91.
            <?php } else { ?>
              Transcontinental, route de Florissant 66 à Genève <br>ou contactez-nous par email à l'adresse info@transcontinental.ch ou par téléphone au +41 22 347 27 27.
            <?php } ?>
          </h2>
          <!--
        <ul>
          <li>Bon cadeau #<?php echo $giftcard->id; ?></li>
            <li><strong>Pour:</strong> <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?> <br />
                <strong>Email</strong>: <?php echo $giftcard->receiver_email; ?><br> <br> </li>
            <li><strong>De la part de:</strong> <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?> <br />
                <strong>Email</strong>: <?php echo $giftcard->sender_email; ?> <br />
                <strong>Téléphone</strong>: <?php echo $giftcard->sender_phone; ?><br />
                <strong>Adresse</strong>: <?php echo $giftcard->sender_address; ?> <br><br>
                <strong>Message</strong>: <?php echo $giftcard->message; ?> <br><br>

            </li>

            <li><strong>Montant:</strong> <?php echo convert_cents_to_currency($giftcard->amount); ?></li>
            <li><strong>Créé:</strong> <?php echo nice_date($giftcard->created_at); ?></li>
            <li><strong>Valide jusqu'au:</strong> <?php echo nice_date($giftcard->expires_at); ?></li>
        </ul> -->

          <a class="logo" href="https://transcontinental.ch/"><img src="https://transcontinental.ch/wp-content/themes/transcontinental2/img/logo.png" alt="" /></a>


        </div>


    </body>

    </html>

<?php


  else :
    header('Location: ' .  site_url() . '&error=nogiftcard');
  endif;


else :
  header('Location: ' .  site_url() . '?error=nogiftcard');
endif;

?>