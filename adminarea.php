
<?php

if (current_subpage_is('newuser')):
    include('adminarea_newuser.php');
elseif (current_subpage_is('user')):
    include('adminarea_user.php');
elseif (current_subpage_is('newlist')):
    include('adminarea_newlist.php');
elseif (current_subpage_is('list')):
    include('adminarea_list.php');
else:
    include('adminarea_index.php');
endif;

?>
