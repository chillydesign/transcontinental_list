<?php

include('../includes/connect.php');
include('../includes/functions.php');


setcookie('tcg_user', false, time() - 1, '/'  );
header('Location: ' .  site_url() . '/login'  );

 ?>
