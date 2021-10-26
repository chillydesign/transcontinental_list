<?php


include('../includes/connect.php');
include('../includes/functions.php');


ini_set('default_charset', 'UTF-8');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header('Content-Type: application/json;charset=UTF-8');

$tid = generate_saferpay_transaction_id(1000);
echo json_encode($tid);
