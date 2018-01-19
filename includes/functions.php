<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);






function current_version(){
    echo '0.1.1';
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

function error_message_list() {
    return array(
        'paypalnotwork' => 'We couldnt process this payment at this time. Please try again ',
        'paymentcancelled' => 'You cancelled the payment. ',
        'notallowedhere' => 'You are not allowed to visit this page. Please try logging in.',
        'notallowedhereadmin' => 'You are not allowed to visit this page.',
        'usernotsave' => 'User account did not save. Please try again.',
        'passwordnotmatch' => 'Passwords do not match. Please try again.',
        'passwordtooshort' => 'Password must be at least 6 characters. Please try again.',
        'couldntlogin' => 'Could not log in. Please try again.',
        'donationnotsave' => 'Donation did not save. Please try again.',
        'emailnotvalid' => 'Email address is not valid. Please try again.',
        'donationnamountblank' => 'Amount and email cannot be blank',
        'listnotsave' => 'List did not save. Please try again.',
        'listnameblank' => 'List name cannot be blank.',
        'giftcardamountlow' => 'Amount is too low. Please try again',
        'unspecified' => 'An error occured. Please try again.',
    );
}

function show_error_message() {
    if (has_error() ) {
        $list = error_message_list();
        $message =  (isset( $list[$_GET['error']] )) ? $list[$_GET['error']] : $list['unspecified'];
        echo '<p class="error_message">' . $message . '</p>';;
    }
}


function encrypt_password($password) {
    $salt = PW_SALT;
    $encrypted_password =  crypt( $password, $salt  );
    return $encrypted_password;
}


function get_var($str) {
    if (isset( $_GET[$str] )) {
        return $_GET[$str];
    } else {
        return false;
    }
}



function get_giftcard($giftcard_id = null) {


    if ($giftcard_id == null) {
        $giftcard_id =  (isset($_GET['id']))  ? intval($_GET['id']) : null;
    }

    global $conn;
    if ( $giftcard_id > 0) {

        try {
            $query = "SELECT *FROM tcg_giftcards WHERE tcg_giftcards.id = :id LIMIT 1";
            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':id', $giftcard_id);
            $giftcard_query->setFetchMode(PDO::FETCH_OBJ);
            $giftcard_query->execute();

            $giftcard_count = $giftcard_query->rowCount();

            if ($giftcard_count == 1) {
                $giftcard =  $giftcard_query->fetch();
                return $giftcard;
            } else {
                return null;
            }
            unset($conn);
        } catch(PDOException $err) {
            return null;
        };
    } else { // if giftcard id is not greated than 0
        return null;
    }
}



function get_giftcards(){
    global $conn;

    try {
        $query = "SELECT * FROM tcg_giftcards  ORDER BY created_at DESC ";
        $giftcards_query = $conn->prepare($query);
        $giftcards_query->setFetchMode(PDO::FETCH_OBJ);
        $giftcards_query->execute();

        $giftcards_count = $giftcards_query->rowCount();

        if ($giftcards_count > 0) {
            $giftcards =  $giftcards_query->fetchAll();
            return $giftcards;
        } else {
            return [];
        }

        unset($conn);

    } catch(PDOException $err) {
        return [];
    };
}



function get_users(){
    global $conn;

    try {
        $query = "SELECT * FROM tcg_users ORDER BY created_at DESC ";
        $users_query = $conn->prepare($query);
        $users_query->setFetchMode(PDO::FETCH_OBJ);
        $users_query->execute();

        $users_count = $users_query->rowCount();

        if ($users_count > 0) {
            $users =  $users_query->fetchAll();
            return $users;
        } else {
            return [];
        }

        unset($conn);

    } catch(PDOException $err) {
        return [];
    };
}



function get_lists(){
    global $conn;

    try {
        $query = "SELECT *, tcg_lists.id as id FROM tcg_lists
        LEFT JOIN tcg_users ON tcg_users.id = tcg_lists.user_id
        ORDER BY tcg_lists.created_at DESC ";
        $lists_query = $conn->prepare($query);
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
}


// return all the lists that belong to the current user
function user_lists($user_id = null) {
    global $conn;


    if ($user_id == null) {
        if ( has_valid_user_cookie()  ) {
            $user_id =  decrypt_id($_COOKIE['tcg_user']);
        }
    }


    if ($user_id) {
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



function get_user($user_id = null) {

    if ($user_id == null) {
        if( current_subpage_is('user')) {
            $user_id = intval($_GET['id']);
        } else {
            $user_id =  $_GET['subpage'];
        }
    }
    if ($user_id == null) {
        $user_id = intval($_GET['id']);
    }

    global $conn;
    if ( $user_id > 0) {

        try {
            $query = "SELECT * FROM tcg_users WHERE id = :id LIMIT 1";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':id', $user_id);
            $user_query->setFetchMode(PDO::FETCH_OBJ);
            $user_query->execute();

            $user_count = $user_query->rowCount();

            if ($user_count == 1) {
                $user =  $user_query->fetch();
                return $user;
            } else {
                return null;
            }

            unset($conn);
        } catch(PDOException $err) {
            return null;
        };
    } else { // if user id is not greater than 0
        return null;
    }
}


function get_list($list_id = null) {

    if ($list_id == null) {
        if( current_subpage_is('list')) {
            $list_id = (isset($_GET['id']))  ? intval($_GET['id']) : null;
        } else {
            $list_id =  $_GET['subpage'];
        }
    }
    if ($list_id == null) {
        $list_id =  (isset($_GET['id']))  ? intval($_GET['id']) : null;
    }

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
    $list->status  = ($list->active == 1) ? 'active' : 'inactive';
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
            $query = "INSERT INTO tcg_lists (name, description, picture, user_id, active) VALUES (:name, :description, :picture, :user_id, :active)";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':name', $list->name);
            $list_query->bindParam(':description', $list->description);
            $list_query->bindParam(':picture', $list->picture);
            $list_query->bindParam(':user_id', $list->user_id);
            $list_query->bindParam(':active', $list->active);
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



function update_giftcard_status($giftcard) {
    global $conn;
    if ( $giftcard->id > 0 ){
        try {



            $query = "UPDATE tcg_giftcards SET `status` = :status,
            `payment_id` = :payment_id,
            `payer_id` = :payer_id
            WHERE id = :id";
            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':status', $giftcard->status);
            $giftcard_query->bindParam(':payment_id', $giftcard->payment_id);
            $giftcard_query->bindParam(':payer_id', $giftcard->payer_id);
            $giftcard_query->bindParam(':id', $giftcard->id);
            $giftcard_query->execute();
            unset($conn);

            return true;

        } catch(PDOException $err) {
            return false;

        };

    } else { // giftcard name was blank
        return false;
    }

}


function update_list($list) {
    global $conn;
    if ($list->name != '' && $list->user_id > 0 ){


        try {
            $query = "UPDATE tcg_lists
            SET `name` = :name,
            `description` = :description,
            `picture` = :picture,
            `user_id` = :user_id,
            `active` = :active
            WHERE id = :id";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':name', $list->name);
            $list_query->bindParam(':description', $list->description);
            $list_query->bindParam(':picture', $list->picture);
            $list_query->bindParam(':user_id', $list->user_id);
            $list_query->bindParam(':active', $list->active);
            $list_query->bindParam(':id', $list->id);
            $list_query->execute();
            unset($conn);

            return true;

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
            $query = "INSERT INTO tcg_donations (first_name, last_name, email, message, amount, list_id, status) VALUES (:first_name, :last_name, :email, :message,  :amount, :list_id, :status)";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':first_name', $donation->first_name);
            $donation_query->bindParam(':last_name', $donation->last_name);
            $donation_query->bindParam(':email', $donation->email);
            $donation_query->bindParam(':message', $donation->message);
            $donation_query->bindParam(':amount', $donation->amount);
            $donation_query->bindParam(':list_id', $donation->list_id);
            $donation_query->bindParam(':status', $donation->status);
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



function insert_new_giftcard($giftcard) {
    global $conn;

    if ($giftcard->receiver_email != '' && $giftcard->amount > 0 ){


        try {
            $query = "INSERT INTO tcg_giftcards ( sender_first_name, sender_last_name, sender_email, receiver_first_name, receiver_last_name, receiver_email, message, picture, amount, status) VALUES (:sender_first_name, :sender_last_name, :sender_email, :receiver_first_name, :receiver_last_name, :receiver_email, :message, :picture, :amount, :status)";

            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':sender_first_name', $giftcard->sender_first_name);
            $giftcard_query->bindParam(':sender_last_name', $giftcard->sender_last_name);
            $giftcard_query->bindParam(':sender_email', $giftcard->sender_email);
            $giftcard_query->bindParam(':receiver_first_name', $giftcard->receiver_first_name);
            $giftcard_query->bindParam(':receiver_last_name', $giftcard->receiver_last_name);
            $giftcard_query->bindParam(':receiver_email', $giftcard->receiver_email);
            $giftcard_query->bindParam(':message', $giftcard->message);
            $giftcard_query->bindParam(':picture', $giftcard->picture);
            $giftcard_query->bindParam(':amount', $giftcard->amount);
            $giftcard_query->bindParam(':status', $giftcard->status);
            $giftcard_query->execute();
            $giftcard_id = $conn->lastInsertId();
            unset($conn);

            return $giftcard_id;

        } catch(PDOException $err) {

            return false;

        };

    } else { // giftcard name was blank
        return false;
    }


}


function convert_gift_to_cookie($gift) {
    $cookie = new stdClass();
    $cookie->name = $gift->receiver_first_name . ' ' . $gift->receiver_last_name;
    $cookie->amount = $gift->amount;
    $cookie->id = $gift->id;
    return json_encode( $cookie );
}

function get_giftcard_cookie() {
    $lgc = json_decode($_COOKIE['latest_giftcard']);
    return $lgc;
}

function  has_giftcard_cookie() {
    if (isset($_COOKIE['latest_giftcard'])) {
        $lgc = get_giftcard_cookie();
        return  ( isset($lgc->name)  ); // $cookie must have 3 items in array;
    } else {
        return false;
    }
}



function get_giftcard_paypal_url_cookie() {
    $lgc = ($_COOKIE['giftcard_paypal_url']);
    return $lgc;
}

function  has_giftcard_paypal_url_cookie() {
    if (isset($_COOKIE['giftcard_paypal_url'])) {
        return true;
    } else {
        return false;
    }
}




function convert_to_amount_in_cents($string) {
    return   round(  floatval($string) * 100);
}

function convert_cents_to_currency($integer) {
    return   money_format( 'CHF %i', ($integer / 100)  );
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


function get_picture_url($id, $type) {
    if ($id && $type) {
        $file = site_url() . '/images/' . $type . '/' .  $id  . '.jpg';
        return $file;
    }
}


function get_picture_location($id, $type) {
    if ($id && $type) {
        $file = __DIR__ . '/../images/' . $type . '/' .  $id  . '.jpg';
        return  $file;
    }
}


function picture_exists($id, $type) {
    if ($id && $type) {
        $file = get_picture_location($id, $type);
        return  file_exists($file);
    } else {
        return false;
    }
}



function find_pictures($type='lists') {
    // find all the jpg or jpeg images in the image folder requested
    // filename is the id of the image
    if ($type == 'giftcards') {
        $path =  __DIR__ . '/../images/giftcards/';
        $site_url = site_url() . '/images/giftcards/';
    } else {
        $path =  __DIR__ . '/../images/lists/';
        $site_url = site_url() . '/images/lists/';
    }

    $pictures = array();
    foreach (new DirectoryIterator($path) as $file) {

        if($file->isDot()) continue;
        if($file->isDir()) continue;
        if($file->isFile()){
            $extension = $file->getExtension();
            if ($extension == 'jpg' || $extension == 'jpeg') {
                $filename = $file->getFilename();
                $id = intval(explode( '.' , $filename)[0]);
                $picture = new stdClass();
                $picture->id = $id;
                $picture->url = $site_url . $file->getFilename();
                array_push($pictures, $picture);
            }

        }
    }

    usort($pictures, "sort_object_by_ids");
    return $pictures;

}


function sort_object_by_ids($a, $b) {
    return strcmp($a->id, $b->id);
}



function send_php_mail($to, $subject, $content) {

    $email_header = file_get_contents(dirname(__FILE__) . '/../emails/email_header.html');
    $email_footer = file_get_contents(dirname(__FILE__) . '/../emails/email_footer.html');

    global $mail;

    try {
        //Server settings
        //$mail->SMTPDebug = 2;                     // Enable verbose debug output
        $mail->isSMTP();                          // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                   // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;          // SMTP username
        $mail->Password = MAIL_PASSWORD;          // SMTP password
        $mail->SMTPSecure = 'tls';                // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        //Recipients
        $mail->setFrom('noreply@transcontinental.ch', 'Transcontinental');
        $mail->addAddress( $to );     // Add a recipient
        $mail->addReplyTo('noreply@transcontinental.ch', 'Transcontinental');
        $mail->addBCC('harvey.charles@gmail.com');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $email_header . $content . $email_footer;
        $mail->AltBody = $content;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

}



function send_giftcard_email( $giftcard  ) {

    $sender = $giftcard->sender_email;
    $sender_subject = 'Thanks for sending a giftcard';
    $sender_content = 'Thanks for sending a giftcard to ' .  $giftcard->receiver_first_name;
    send_php_mail($sender, $sender_subject, $sender_content);

    $receiver = $giftcard->receiver_email;
    $receiver_subject = 'You just got a giftcard';
    $receiver_content = $giftcard->sender_first_name . ' just send you a giftcard.';
    send_php_mail($receiver, $receiver_subject, $receiver_content);


}





//COMPOSER PACKAGES
// TIME DATE TEXT AGO
$timeZone  = null; // just use the system timezone
$timeAgo = new Westsworld\TimeAgo($timeZone, 'en'); // default language is en (english)

function timeAgoInWords($time) {
    global $timeAgo;
    return $timeAgo->inWords($time);
}
// END OF TIME DATE TEXT AGO




// PAYPAL AND PAYMENTS

// // credit card integration with paypal
function get_paypal_api_context() {
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            PAYPAL_CLIENT_ID,     // ClientID
            PAYPAL_CLIENT_SECRET     // ClientSecret
            )
        );
        return $apiContext;
    }



    function getGiftCardPaymentLink($giftcard_id, $amount_in_cents) {

        $amountInCHF = money_format( '%i', ($amount_in_cents / 100)  );
        $apiContext = get_paypal_api_context();
        $baseURL = site_url() . '/actions/giftcard_payment_finish.php';
        $returnURL = $baseURL . '?return=true&giftcard_id=' . $giftcard_id;
        $cancelURL = $baseURL . '?cancel=true&giftcard_id=' . $giftcard_id;


        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal( $amountInCHF  );
        $amount->setCurrency('CHF');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl($returnURL)
        ->setCancelUrl($cancelURL);

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);


        try {
            $payment->create($apiContext);
            // echo $payment;
            return  $payment->getApprovalLink();
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            //echo $ex->getData();
            return false;
        }

    }

    // END OF PAYPAL AND PAYMENTS


    ?>
