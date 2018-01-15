<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


function current_version(){
    echo '0.1.0';
}




function site_url(){

    if (WEBSITE_URL) {
        return WEBSITE_URL;
    } else {
        return 'http://localhost:8888/transcontinentalgifts';
    }

}

function get_site_url(){
    echo site_url();
}





function current_page(){
    if ( isset($_GET['page']) ) {
        $page = $_GET['page'] .'.php';

    } else {
        $page = 'home.php';
    }
    return $page;


}

function current_page_exists(){
    if ( isset($_GET['page']) ) {
        $page = $_GET['page'];
        if ( substr(  WEBSITE_URL, 'localhost') > -1 )  {
            $file = '/Applications/MAMP/htdocs/transcontinental_list/' .$page . '.php';
        } else {
            $file = '/home/chillyde/webfactor.ch/projets/transcontinental_list/' .$page . '.php';
        }

        return(  file_exists($file) ) ;
    } else {
        return true; // home page does exist
    }
}

function current_page_is($slug){

    if ( isset($_GET['page']) ) {
        return  ($_GET['page'] == $slug  );
    } else {
        return false;
    }

}

function page_link($slug, $text, $classes='') {

    echo '<a href="'. site_url() . '/'  .  $slug   .'" class="'. $classes .'">'. ($text) .'</a>';

}



function encrypt_password($password) {
    $salt = PW_SALT;
    $encrypted_password =  crypt( $password, $salt  );
    return $encrypted_password;
}


function insert_new_client($client) {
    global $conn;
    if ($client->email != '' && $client->password_digest != ''){
        try {
            $query = "INSERT INTO clients (email, company_name, contact_name, password_digest) VALUES (:email, :company_name, :contact_name, :password_digest)";
            $client_query = $conn->prepare($query);
            $client_query->bindParam(':email', $client->email);
            $client_query->bindParam(':company_name', $client->company_name);
            $client_query->bindParam(':contact_name', $client->contact_name);
            $client_query->bindParam(':password_digest', $client->password_digest);
            $client_query->execute();
            $client_id = $conn->lastInsertId();
            unset($conn);

            return $client_id;

        } catch(PDOException $err) {

            return false;

        };

    } else {
        return false;
    }


}


function current_client() {

    global $conn;
    if ( isset( $_COOKIE['client'] ) ) {

        $client_id =  decrypt_id($_COOKIE['client']);



        try {
            $query = "SELECT * FROM clients WHERE id = :id LIMIT 1";
            $client_query = $conn->prepare($query);
            $client_query->bindParam(':id', $client_id);
            $client_query->setFetchMode(PDO::FETCH_OBJ);
            $client_query->execute();

            $clients_count = $client_query->rowCount();

            if ($clients_count == 1) {
                $client =  $client_query->fetch();
                return $client;
            } else {
                header('Location: ' .  site_url() . '/actions/client_logout.php'  );
            }

            unset($conn);



        } catch(PDOException $err) {

            header('Location: ' .  site_url() . '/actions/client_logout.php'  );

        };


    } else {
        return null;
    }
}


function log_in_client($client) {
    global $conn;
    if ($client->email != '' && $client->password_digest != ''){
        try {
            $query = "SELECT id FROM clients WHERE email = :email AND  password_digest = :password_digest LIMIT 1";
            $client_query = $conn->prepare($query);
            $client_query->bindParam(':email', $client->email);
            $client_query->bindParam(':password_digest', $client->password_digest);
            $client_query->setFetchMode(PDO::FETCH_OBJ);
            $client_query->execute();

            $clients_count = $client_query->rowCount();

            if ($clients_count == 1) {
                $client_id =  $client_query->fetch()->id;
            } else {
                $client_id = false;
            }

            unset($conn);

            return $client_id;

        } catch(PDOException $err) {

            return false;

        };

    } else {
        return false;
    }


}



function encrypt_id($string){


    $encrypted_string = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SECRET_KEY , $string, MCRYPT_MODE_CBC,  INITIALIZATION_VECTOR );
    $encrypted_string = bin2hex($encrypted_string);
    return $encrypted_string;


};

function decrypt_id($string){



    $encrypted_string = hex2bin($string);
    $decrypted_string = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SECRET_KEY, $encrypted_string, MCRYPT_MODE_CBC, INITIALIZATION_VECTOR );
    $decrypted = intval($decrypted_string);
    return $decrypted;

}


//
// function create_portfolio_item( $client_id, $image , $name,  $groups,  $url=false ){
// // used on the portfolio.php page to create the boxes
//   $img = 'images/portfolio/medium/' . $image ;
//
//   $ret =  '<li class="col-md-4 col-sm-6 col-xs-12" data-groups=' . "'["  . '"' . implode($groups, '","') . '"' . "]'>";
//     $ret .= '<div class="enclosing_img">';
//       $ret .= '<a class="lightbox_client_anchor" data-featherlight="portfolio-items/' .  $client_id . '.php"  style="background-image:url(' . $img .');"   id="' . $client_id  . '" target="_blank" href="' .  $url  . '">' .  $name  . '</a>';
//     $ret .= '</div>';
//     if($url){
//       $ret .= '<h5><a href="' . $url . '" target="_blank">' . $name  . '</a></h5>';
//     } else {
//       $ret .= '<h5>' . $name  . '</h5>';
//     }
//
//   $ret .= '</li>';
//
//   echo $ret;
// }
//

?>
