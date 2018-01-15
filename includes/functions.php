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
        if ( strpos(  WEBSITE_URL, 'localhost') > -1 )  {
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


function has_error() {
    return isset($_GET['error']);
}

function show_error_message() {
    if (has_error() ) {
        echo '<p>' . $_GET['error'] . '</p>';;
    }
}


function encrypt_password($password) {
    $salt = PW_SALT;
    $encrypted_password =  crypt( $password, $salt  );
    return $encrypted_password;
}


function insert_new_user($user) {
    global $conn;
    if ($user->email != '' && $user->password_digest != ''){
        try {
            $query = "INSERT INTO tcg_users (email, first_name, last_name, password_digest) VALUES (:email, :first_name, :last_name, :password_digest)";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':email', $user->email);
            $user_query->bindParam(':first_name', $user->first_name);
            $user_query->bindParam(':last_name', $user->last_name);
            $user_query->bindParam(':password_digest', $user->password_digest);
            $user_query->execute();
            $user_id = $conn->lastInsertId();
            unset($conn);

            return $user_id;

        } catch(PDOException $err) {

            return false;

        };

    } else {
        return false;
    }


}


function has_valid_user_cookie() {
    if  ( isset( $_COOKIE['tcg_user'] ) ) {
        $user_id = decrypt_id($_COOKIE['tcg_user']);
        if ( is_numeric($user_id) && $user_id > 0  ) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

function only_allow_users() {
    if ( current_user() === null ) {
        header('Location: ' .  site_url() . '?error=notallowedhere'  );

    } else {
        return true;
    }
}


function current_user() {

    global $conn;
    if ( has_valid_user_cookie() ) {

        $user_id =  decrypt_id($_COOKIE['tcg_user']);



        try {
            $query = "SELECT * FROM tcg_users WHERE id = :id LIMIT 1";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':id', $user_id);
            $user_query->setFetchMode(PDO::FETCH_OBJ);
            $user_query->execute();

            $users_count = $user_query->rowCount();

            if ($users_count == 1) {
                $user =  $user_query->fetch();
                return $user;
            } else {
                header('Location: ' .  site_url() . '/actions/user_logout.php'  );
            }

            unset($conn);



        } catch(PDOException $err) {

            header('Location: ' .  site_url() . '/actions/user_logout.php'  );

        };


    } else {
        return null;
    }
}


function log_in_user($user) {
    global $conn;
    if ($user->email != '' && $user->password_digest != ''){
        try {
            $query = "SELECT id FROM tcg_users WHERE email = :email AND  password_digest = :password_digest LIMIT 1";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':email', $user->email);
            $user_query->bindParam(':password_digest', $user->password_digest);
            $user_query->setFetchMode(PDO::FETCH_OBJ);
            $user_query->execute();

            $users_count = $user_query->rowCount();

            if ($users_count == 1) {
                $user_id =  $user_query->fetch()->id;
            } else {
                $user_id = false;
            }

            unset($conn);

            return $user_id;

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



?>
