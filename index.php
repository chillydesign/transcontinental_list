<?php
include('includes/connect.php');
include('includes/functions.php');
if ( current_page_exists()  ) :
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
