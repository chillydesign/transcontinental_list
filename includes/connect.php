<?php



error_reporting(E_ALL);
ini_set("display_errors", 1);



if( $_SERVER['SERVER_PORT'] == 8888 ) {

		define("DB_HOST", "localhost");
		define("DB_NAME", "transcontgifts");
		define("DB_USER", "webfactor");
		define("DB_PASSWORD", "webfactor");

		define("PW_SALT",   'JkaasUgZAsJO2bXesHk3ig==')  ;
		define("SECRET_KEY",   1849262118354826  ) ;
		define("INITIALIZATION_VECTOR",  hex2bin('3127d2526716e03292849a8d981c50b798cbd066b8eaaedf7838263d31f290dd')   ) ;
		define("SITE_NAME",  'Transcontinental' );
		define("WEBSITE_URL",  'http://localhost:8888/transcontinentalgifts' );




} else {

		define("DB_HOST",  getenv('DB_HOST') );
		define("DB_NAME",  getenv('DB_NAME') );
		define("DB_USER",  getenv('DB_USER') );
		define("DB_PASSWORD",  getenv('DB_PASSWORD') );

        define("SITE_NAME",   getenv('SITE_NAME')  ) ;
		define("PW_SALT", getenv('PW_SALT')  ) ;
		define("SECRET_KEY", getenv('SECRET_KEY')  ) ;
		define("INITIALIZATION_VECTOR", hex2bin(getenv('INITIALIZATION_VECTOR'))  ) ;
		define("WEBSITE_URL",  getenv('DOMAIN_NAME') );

}






try {

    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME ,  DB_USER , DB_PASSWORD );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET CHARACTER SET utf8");




} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}






?>
