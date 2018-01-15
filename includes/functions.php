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



function current_subpage_is($slug) {
    if ( isset($_GET['subpage']) ) {
        return ($_GET['subpage'] == $slug);
    } else {
        return false;
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

function is_valid_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function has_success() {
    return isset($_GET['success']);
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




// return all the lists that belong to the current user
function user_lists() {
    global $conn;
    if ( has_valid_user_cookie() ) {

        $user_id =  decrypt_id($_COOKIE['tcg_user']);

        try {
            $query = "SELECT * FROM tcg_lists WHERE user_id = :id  ORDER BY created_at DESC ";
            $lists_query = $conn->prepare($query);
            $lists_query->bindParam(':id', $user_id);
            $lists_query->setFetchMode(PDO::FETCH_OBJ);
            $lists_query->execute();

            $lists_count = $lists_query->rowCount();

            if ($lists_count > 0) {
                $lists =  $lists_query->fetchAll();
                // process every list to add extra properties
                foreach ($lists as $list ) {
                    $list = process_list($list);
                }
                return $lists;
            } else {
                return [];
            }

            unset($conn);

        } catch(PDOException $err) {
            return [];
        };
    } else {
        return [];
    }
}


function get_donations($list_id) {
    if ($list_id) {
        global $conn;
        try {
            $query = "SELECT * FROM tcg_donations WHERE list_id = :id  ORDER BY created_at DESC ";
            $donations_query = $conn->prepare($query);
            $donations_query->bindParam(':id', $list_id);
            $donations_query->setFetchMode(PDO::FETCH_OBJ);
            $donations_query->execute();

            $donations_count = $donations_query->rowCount();

            if ($donations_count > 0) {
                $donations =  $donations_query->fetchAll();
                return $donations;
            } else {
                return [];
            }

            unset($conn);

        } catch(PDOException $err) {
            return [];
        };
    } else {
        return [];
    }
}


function sum_donations($donations) {
    $total = 0;
    foreach ($donations as $donation) {
        $total = $total + $donation->amount;
    }
    return convert_cents_to_currency($total);
}


function get_list($list_id = null) {

    if ($list_id == null) {
        if( current_subpage_is('list')) {
            $list_id = intval($_GET['id']);
        } else {
            $list_id =  $_GET['subpage'];
        }
    }
    if ($list_id == null) {
        $list_id = intval($_GET['id']);
    }

    // $subpage = $_GET['subpage'];
    // if ($list_id == null && $subpage > 0 ) {
    //     $list_id = $subpage;
    // }
    // if ($list_id == null && isset($_GET['id'])) {
    //
    // }



    global $conn;
    if ( $list_id > 0) {
        $list_id = deconvert_list_id($list_id);
        try {
            $query = "SELECT *, tcg_lists.id as id FROM tcg_lists
            LEFT JOIN tcg_users ON tcg_users.id = tcg_lists.user_id
            WHERE tcg_lists.id = :id
            LIMIT 1";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':id', $list_id);
            $list_query->setFetchMode(PDO::FETCH_OBJ);
            $list_query->execute();

            $list_count = $list_query->rowCount();

            if ($list_count == 1) {
                $list =  $list_query->fetch();
                return process_list($list);
            } else {
                return null;
            }

            unset($conn);
        } catch(PDOException $err) {
            return null;
        };
    } else { // if list id is not greated than 0
        return null;
    }
}


function process_list($list) {

    $list->list_number = convert_list_id($list->id); // obfuscate the list id a bit
    if (isset($list->first_name)) {
        $list->users_name = $list->first_name . ' ' .  $list->last_name;
    }
    return $list;
}


// obfuscate the list id a bit
function convert_list_id($list_id) {
    return intval($list_id)  * 83  + 1777;
}
function deconvert_list_id($list_id) {
    return ($list_id - 1777) / 83;
}


function insert_new_list($list) {
    global $conn;
    if ($list->name != '' && $list->user_id > 0 ){

        try {
            $query = "INSERT INTO tcg_lists (name, description, picture, user_id) VALUES (:name, :description, :picture, :user_id)";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':name', $list->name);
            $list_query->bindParam(':description', $list->description);
            $list_query->bindParam(':picture', $list->picture);
            $list_query->bindParam(':user_id', $list->user_id);
            $list_query->execute();
            $list_id = $conn->lastInsertId();
            unset($conn);


            return convert_list_id($list_id);

        } catch(PDOException $err) {

            return false;

        };

    } else { // list name was blank
        return false;
    }


}



function insert_new_donation($donation) {
    global $conn;
    if ($donation->amount > 0 && $donation->list_id > 0 ){

        try {
            $query = "INSERT INTO tcg_donations (first_name, last_name, email, message, amount, list_id) VALUES (:first_name, :last_name, :email, :message,  :amount, :list_id)";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':first_name', $donation->first_name);
            $donation_query->bindParam(':last_name', $donation->last_name);
            $donation_query->bindParam(':email', $donation->email);
            $donation_query->bindParam(':message', $donation->message);
            $donation_query->bindParam(':amount', $donation->amount);
            $donation_query->bindParam(':list_id', $donation->list_id);
            $donation_query->execute();
            $donation_id = $conn->lastInsertId();
            unset($conn);
            return $donation_id;

        } catch(PDOException $err) {

            return false;

        };

    } else { // donation name was blank
        return false;
    }


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


function convert_to_amount_in_cents($string) {
    return   round(  floatval($string) * 100);
}

function convert_cents_to_currency($integer) {
    return   money_format( '%i', ($integer / 100)  );
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

function has_valid_admin_cookie() {
    if  ( isset( $_COOKIE['tcg_admin'] ) ) {
        $admin_id = decrypt_id($_COOKIE['tcg_admin']);
        if ( is_numeric($admin_id) && $admin_id > 0  ) {
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

function only_allow_admins() {
    if ( current_admin() === null ) {
        header('Location: ' .  site_url() . '?error=notallowedhereadmin'  );
    } else {
        return true;
    }
}



function current_admin() {

    global $conn;
    if ( has_valid_admin_cookie() ) {

        $admin_id =  decrypt_id($_COOKIE['tcg_admin']);



        try {
            $query = "SELECT * FROM tcg_admins WHERE id = :id LIMIT 1";
            $admin_query = $conn->prepare($query);
            $admin_query->bindParam(':id', $admin_id);
            $admin_query->setFetchMode(PDO::FETCH_OBJ);
            $admin_query->execute();

            $admins_count = $admin_query->rowCount();

            if ($admins_count == 1) {
                $admin =  $admin_query->fetch();
                return $admin;
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




function log_in_admin($admin) {
    global $conn;
    if ($admin->email != '' && $admin->password_digest != ''){
        try {
            $query = "SELECT id FROM tcg_admins WHERE email = :email AND  password_digest = :password_digest LIMIT 1";
            $admin_query = $conn->prepare($query);
            $admin_query->bindParam(':email', $admin->email);
            $admin_query->bindParam(':password_digest', $admin->password_digest);
            $admin_query->setFetchMode(PDO::FETCH_OBJ);
            $admin_query->execute();

            $admins_count = $admin_query->rowCount();

            if ($admins_count == 1) {
                $admin_id =  $admin_query->fetch()->id;
            } else {
                $admin_id = false;
            }

            unset($conn);

            return $admin_id;

        } catch(PDOException $err) {

            return false;

        };

    } else {
        return false;
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
