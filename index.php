<?php

$path = realpath(dirname(__FILE__));
require_once( $path  . '/includes/connect.php');
require_once( $path  . '/includes/functions.php');





if ( current_page_exists()  ) :

    // only allow logged in people to the following pages
    // userarea.php
    if ( current_page_is('userarea')) {
        only_allow_users();
    }

    // only allow logged in admins to the following pages
    // adminarea.php
    if ( current_page_is('adminarea')) {
        only_allow_admins();
    }


    require_once($path  . '/includes/header.php');
    require_once($path  .   current_page() );

else :
    include('includes/header.php');
    include('pages/404.php');
endif;



include('includes/footer.php');

?>
