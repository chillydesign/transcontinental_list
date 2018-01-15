<?php
include('includes/connect.php');
include('includes/functions.php');

if ( current_page_exists()  ) :

    // only allow logged in people to the following current_page_exists
    // userarea.php
    if ( current_page_is('userarea')) {
        only_allow_users();
    }

    include('includes/header.php');
    include(current_page() );

else :
    include('includes/header.php');
    include('404.php');
endif;



include('includes/footer.php');

?>
