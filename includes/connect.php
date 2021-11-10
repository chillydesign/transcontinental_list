<?php


include('env.php');



error_reporting(E_ALL);
ini_set("display_errors", 1);


define("DB_HOST",  getenv('DB_HOST'));
define("DB_NAME",  getenv('DB_NAME'));
define("DB_USER",  getenv('DB_USER'));
define("DB_PASSWORD",  getenv('DB_PASSWORD'));


define("SITE_THEME", getenv('SITE_THEME'));
define("SITE_NAME", getenv('SITE_NAME'));
define("PW_SALT", getenv('PW_SALT'));
define("SECRET_KEY", getenv('SECRET_KEY'));
define("INITIALIZATION_VECTOR", hex2bin(getenv('INITIALIZATION_VECTOR')));
define("WEBSITE_URL",  getenv('WEBSITE_URL'));


define("TLPRIME1",  getenv('TLPRIME1'));
define("TLPRIME2",  getenv('TLPRIME2'));
define("TLPRIME3",  getenv('TLPRIME3'));




define("PAYPAL_CLIENT_ID", getenv('PAYPAL_CLIENT_ID'));
define("PAYPAL_CLIENT_SECRET", getenv('PAYPAL_CLIENT_SECRET'));
define("PAYPAL_MODE", getenv('PAYPAL_MODE'));

define("MAIL_USERNAME", getenv('MAIL_USERNAME'));
define("MAIL_PASSWORD", getenv('MAIL_PASSWORD'));
define("THEME_DIRECTORY", getenv('THEME_DIRECTORY'));


define("SAFERPAY_AUTH_TOKEN", getenv('SAFERPAY_AUTH_TOKEN'));
define("SAFERPAY_CUSTOMER_ID", getenv('SAFERPAY_CUSTOMER_ID'));
define("SAFERPAY_API_TERMINAL_ID", getenv('SAFERPAY_API_TERMINAL_ID'));


try {
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,  DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use JasonGrimes\Paginator;

require_once __DIR__ . '/../vendor/autoload.php';
