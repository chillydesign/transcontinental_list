<?php
if (current_subpage_is('newlist')):
    include('userarea_newlist.php');
elseif (current_subpage_is('list')):
    include('userarea_list.php');
elseif (current_subpage_is('account')):
    include('userarea_account.php');
else:
    include('userarea_index.php');
endif;

?>
