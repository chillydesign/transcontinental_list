<?php


include('../includes/connect.php');
include('../includes/functions.php');


ini_set('default_charset', 'UTF-8');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header('Content-Type: application/json;charset=UTF-8');
$token = $_GET['token'];
$tid = saferpay_assert_payment($token);



if ($tid->Transaction->Status == 'AUTHORIZED') {
    $transaction_id = $tid->Transaction->Id;
    $cap = saferpay_capture_transaction($transaction_id);
    echo json_encode($cap);
} else {
    echo json_encode($tid);
}
