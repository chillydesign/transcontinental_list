<?php
include('includes/connect.php');
include('includes/functions.php');

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


    include('includes/header.php');
    include(current_page() );

else :
    include('includes/header.php');
    include('404.php');
endif;



include('includes/footer.php');

?>
