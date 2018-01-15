

<h1>User area</h1>


<?php

if (current_subpage_is('newlist')):
    include('userarea_newlist.php');
elseif (current_subpage_is('list')):
    include('userarea_list.php');
else:
    include('userarea_index.php');
endif;

?>
