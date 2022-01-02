<?php


$current_language =  set_current_language();
function set_current_language() {
    return 'fr'; // for now language is always french
    // $current_language = 'fr';
    // if (isset($_GET['lang'])) {
    //     if ($_GET['lang'] == 'en') {
    //         $current_language = 'en';
    //     } else if ($_GET['lang'] == 'it') {
    //         $current_language = 'it';
    //     }
    //     setLanguageCookie($current_language);
    // } elseif (isset($_COOKIE['lang'])) {
    //     $current_language = $_COOKIE['lang'];
    // } else {
    //     $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    //     $acceptLang = allowed_languages();
    //     if (in_array($browser_lang, $acceptLang)) {
    //         $current_language = $browser_lang;
    //     }
    //     setLanguageCookie($current_language);
    // }


    // return $current_language;
}

function allowed_languages() {
    return  ['fr', 'it', 'en'];
}

function other_languages() {
    $langs = allowed_languages();
    return array_filter($langs,   function ($k) {
        global $current_language;
        return $k !=  $current_language;
    });
}



function setLanguageCookie($lang) {
    setcookie('lang', $lang, time() + 36000000, '/');
}



function export_translations() {
    $words = translatable_words();
    foreach ($words as $key => $words) {
        echo $key . ';';
        foreach ($words as $word) {
            echo $word;
            echo ';';
        }
        echo "\n";
    }
    echo "\n";
    echo "\n";
}
// export_translations();



function translatable_words() {
    return    [
        'bons_cadeaux' => [
            'fr' => "Bons cadeaux",
            'en' => "Gift cards",
        ],
        'chercher' => [
            'fr' => "Chercher",
            'en' => "Search",
        ],
        'creer_un_compte' => [
            'fr' => "Créer un compte",
            'en' => "Create an account",
        ],
        'reinitialiser_votre_mot_de_passe' => [
            'fr' => "Réinitialiser votre mot de passe",
            'en' => "Reset your password",
        ],
        'nouveau_mot_de_passe' => [
            'fr' => "Nouveau mot de passe",
            'en' => "New password",
        ],
        'mot_de_passe_oublie' => [
            'fr' => "Mot de passe oublié ?",
            'en' => "Forgot password?",
        ],
        'mot_de_passe' => [
            'fr' => "Mot de passe",
            'en' => "Password",
        ],
        'envoyer' => [
            'fr' => "Envoyer",
            'en' => "Submit",
        ],
        'contribuer' => [
            'fr' => "Contribuer",
            'en' => "From",
        ],
        'optionnel' => [
            'fr' => "optionnel",
            'en' => "optional",
        ],
        'message' => [
            'fr' => "Message",
            'en' => "Message",
        ],
        'reinitialiser' => [
            'fr' => "Réinitialiser",
            'en' => "Reset",
        ],
        'confirmez_le_mot_de_passe' => [
            'fr' => "Confirmez le mot de passe",
            'en' => "Confirm password",
        ],
        'pas_encore_de_compte' => [
            'fr' => "Pas encore de compte ?",
            'en' => "No account?",
        ],
        'crez_le_ici' => [
            'fr' => "Créez-le ici",
            'en' => "Create one here",
        ],
        'message_bon_cadeau' => [
            'fr' => "Message qui figurera sur votre bon cadeau",
            'en' => "Message that will appear on your gift certificate",
        ],
        'vous_avez_deja_un_compte' => [
            'fr' => "Vous avez déjà un compte ?",
            'en' => "Already have an account?",
        ],
        'connectez_vous_ici' => [
            'fr' => "Connectez-vous ici",
            'en' => "Sign in here",
        ],
        'listes_de_mariage_et_d_anniversaire' => [
            'fr' => "Listes de mariage et d'anniversaire",
            'en' => "Listes de mariage et d'anniversaire",
        ],
        'saisir_le_numero_de_la_liste' => [
            'fr' => "Saisir le numéro de la liste",
            'en' => "Enter the number for a list",
        ],
        'numero_de_la_liste' => [
            'fr' => "numéro de la liste",
            'en' => "number of the list",
        ],
        'connexion' => [
            'fr' => "Connexion",
            'en' => "Sign in",
        ],
        'deconnexion' => [
            'fr' => "Déconnexion",
            'en' => "Sign out",
        ],
        'mes_listes'  => [
            'fr' => "Mes listes",
            'en' => "My lists",
        ],
        'contribuer_a_une_liste'  => [
            'fr' => "Contribuer à une liste",
            'en' => "Contribute to a list",
        ],
        'compte'  => [
            'fr' => "Compte",
            'en' => "Account",
        ],
        'clients'  => [
            'fr' => "Clients",
            'en' => "Clients",
        ],
        'listes'  => [
            'fr' => "Listes",
            'en' => "Lists",
        ],
        'liste' => [
            'fr' => "Liste",
            'en' => "List",
        ],
        'par' => [
            'fr' => "par",
            'en' => "by",
        ],
        'offrir'  => [
            'fr' => "Offrir",
            'en' => "Submit",
        ],
        'offrir_un_bon_cadeau'  => [
            'fr' => "Offrir un bon cadeau",
            'en' => "Give a gift card",
        ],
        'montant'  => [
            'fr' => "Montant",
            'en' => "Amount",
        ],
        'les_cgv'  => [
            'fr' => "les CGV",
            'en' => "the terms and conditions",
        ],
        'j_ai_lu_et_accepte'  => [
            'fr' => "J'ai lu et accepté",
            'en' => "I accept",
        ],
        'prenom'  => [
            'fr' => "Prénom",
            'en' => "First name",
        ],
        'nom'  => [
            'fr' => "Nom",
            'en' => "Last name",
        ],
        'votre_telephone'  => [
            'fr' => "Votre téléphone",
            'en' => "Your telephone",
        ],
        'telephone'  => [
            'fr' => "Téléphone",
            'en' => "Telephone",
        ],
        'votre_adresse_email'  => [
            'fr' => "Votre adresse email",
            'en' => "Your email address",
        ],
        'adresse_email'  => [
            'fr' => "Adresse email",
            'en' => "Email address",
        ],
        'votre_adresse'  => [
            'fr' => "Votre adresse",
            'en' => "Your address",
        ],
        'votre_prenom'  => [
            'fr' => "Votre prénom",
            'en' => "Your first name",
        ],
        'votre_nom'  => [
            'fr' => "Votre Nom",
            'en' => "Your last name",
        ],
        'ville'  => [
            'fr' => "Ville",
            'en' => "Town",
        ],
        'code_postal'  => [
            'fr' => "Code postal",
            'en' => "Postcode",
        ],
        'pays'  => [
            'fr' => "Pays",
            'en' => "Country",
        ],
        'pour'  => [
            'fr' => "Pour",
            'en' => "For",
        ],
        'de_la_part_de' => [
            'fr' => 'De la part de',
            'en' => 'On behalf of',
        ],
        'choisissez_une_photo_en_cliquant_dessus' => [
            'fr' => 'Choisissez une photo en cliquant dessus',
            'en' => 'Choose a photo by clicking on it',
        ],
        'image' => [
            'fr' => 'Image',
            'en' => 'Image ',
        ],

        'si_un_de_vos_proches' => [
            'fr' => "Si un de vos proches vous a communiqué le numéro de leur liste de mariage, d'anniversaire ou pour une autre occasion saisissez le ici pour faire une contribution.",
            'en' => "Si un de vos proches vous a communiqué le numéro de leur liste de mariage, d'anniversaire ou pour une autre occasion saisissez le ici pour faire une contribution.",
        ],
        'aimeriez_vous_que_vos_proches' => [
            'fr' => "Aimeriez-vous que vos proches vous offrent un voyage pour votre mariage, votre anniversaire ou une autre occasion? Inscrivez-vous sur " .  SITE_NAME . ", créez une ou plusieurs listes, et partagez-les avec vos proches, puis profitez de vos vacances de rêve!",
            'en' => "Aimeriez-vous que vos proches vous offrent un voyage pour votre mariage, votre anniversaire ou une autre occasion? Inscrivez-vous sur " .  SITE_NAME . ", créez une ou plusieurs listes, et partagez-les avec vos proches, puis profitez de vos vacances de rêve!",
        ],
        'paypalnotwork' => [
            'fr' => 'La transaction a échoué. Veuillez réessayer.'
        ],
        'paymentcancelled' => [
            'fr' => 'Vous avez annulé le paiement.'
        ],
        'notallowedhere' => [
            'fr' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette page. Veuillez vous connecter.'
        ],
        'notallowedhereadmin' => [
            'fr' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette page. <a href="' . site_url() . '/adminlogin">Connexion administrateur</a>'
        ],
        'nameblank' => [
            'fr' => 'Veuillez saisir votre nom et prénom.'
        ],
        'usernotsave' => [
            'fr' => 'Le compte utilisateur n\'a pas pu être enregistré. Veuillez réessayer.',
        ],
        'passwordnotmatch' => [
            'fr' => 'Le mot de passe et sa confirmation doivent être identiques. Veuillez réessayer.'
        ],
        'passwordtooshort' => [
            'fr' => 'Le mot de passe doit comprendre 6 caractères minimum. Veuillez réessayer.'
        ],
        'couldntlogin' => [
            'fr' => 'Echec de connexion. Veuillez réessayer.'
        ],
        'donationnotsave' => [
            'fr' => 'La donation n\'a pas pu être enregistrée. Veuillez réessayer.'
        ],
        'emailnotvalid' => [
            'fr' => 'Cette adresse email n\'est pas valide. Veuillez réessayer.'
        ],
        'donationnamountblank' => [
            'fr' => 'Veuillez saisir un montant et une adresse email.'
        ],
        'listnotsave' => [
            'fr' => 'La liste n\'a pas pu être enregistrée. Veuillez réessayer.'
        ],
        'listnameblank' => [
            'fr' => 'Veuillez saisir le nom de la liste.'
        ],
        'giftcardamountlow' => [
            'fr' => 'Le montant est trop bas. Veuillez réessayer.'
        ],
        'unspecified' => [
            'fr' => 'Une erreur s\'est produite. Veuillez réessayer.'
        ],
    ];
}

function has_translation($word) {
    $words = translatable_words();

    if (!isset($words[$word])) {
        return  false;
    }
    if (sizeof($words[$word]) == 0) {
        return  false;
    }

    return true;
}


function return_t($word) {


    global $current_language;

    $words = translatable_words();


    if (has_translation($word)  == false) {
        return '<span class="untranslated">' . $word . '</span>';
    }

    if (!isset($words[$word][$current_language])) {
        return  $words[$word]['fr'];
    }
    return $words[$word][$current_language];
}

function t($word) {
    echo return_t($word);
}



function saferpay_api_url() {
    return SAFERPAY_API_URL;
}

function saferpay_auth_token() {
    $merchant_id = '';
    $password = '';
    $token =  base64_encode($merchant_id . ":" .  $password);
    return $token;
}

function saferpay_spec_version() {
    return "1.24";
}



function generate_saferpay_transaction_id($amount) {


    $url = saferpay_api_url() . '/Payment/v1/Transaction/Initialize';
    $request_id = 'transaction_' . getRandomHex(8);
    $data = array(
        "RequestHeader" => array(
            "SpecVersion" => saferpay_spec_version(),
            "CustomerId" => SAFERPAY_CUSTOMER_ID,
            "RequestId" => $request_id,
            "RetryIndicator" => 0
        ),
        "TerminalId" => SAFERPAY_API_TERMINAL_ID,
        "Payment" => array(
            "Amount" => array(
                "Value" =>  $amount,
                "CurrencyCode" => "CHF"
            ),
        ),
        "Payer" => array(
            "LanguageCode" => "en"
        ),
        "ReturnUrls" => array(
            "Success" => site_url() . "/?payment_id=12345&successUrl",
            "Fail" => site_url() . "/?payment_id=12345&errorUrl"
        )
    );
    $curl = new Curl\Curl();
    $curl->setHeader('Authorization', "Basic " . SAFERPAY_AUTH_TOKEN);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post($url, json_encode($data));
    if ($curl->error) {
        return array("error" => $curl->response);
    } else {
        $response = json_decode($curl->response);
        $response->RedirectUrl  = $response->Redirect->RedirectUrl;
        return $response;
    }
}

function generate_saferpay_payment_page($type, $amount, $description, $redirect_base, $object_id) {

    if ($type == 'giftcard') {
        $order_id = $object_id + 1000;
    } else if ($type == 'donation') {
        $order_id = $object_id + 100000;
    } else {
        $order_id = $object_id + 1000000;
    }

    $url = saferpay_api_url() . '/Payment/v1/PaymentPage/Initialize';
    $request_id = 'transaction_' . getRandomHex(8);
    $data = array(
        "RequestHeader" => array(
            "SpecVersion" => saferpay_spec_version(),
            "CustomerId" => SAFERPAY_CUSTOMER_ID,
            "RequestId" => $request_id,
            "RetryIndicator" => 0
        ),
        "TerminalId" => SAFERPAY_API_TERMINAL_ID,
        "Payment" => array(
            "Amount" => array(
                "Value" =>  $amount,
                "CurrencyCode" => "CHF"
            ),
            "OrderId" => $order_id,
            "Description" => $description

        ),
        "Payer" => array(
            "LanguageCode" => "fr"
        ),
        "ReturnUrls" => array(
            "Success" => $redirect_base . "&success=true",
            "Fail" => $redirect_base . "&error=true"
        )
    );
    $curl = new Curl\Curl();
    $curl->setHeader('Authorization', "Basic " . SAFERPAY_AUTH_TOKEN);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post($url, json_encode($data));
    if ($curl->error) {
        var_dump($curl->response);
        return array("error" => $curl->response);
    } else {
        $response = json_decode($curl->response);
        return $response;
    }
}

function saferpay_assert_payment($token) {
    $url = saferpay_api_url() . '/Payment/v1/PaymentPage/Assert';
    $request_id =  'assert_' . getRandomHex(8);
    $data = array(
        "RequestHeader" => array(
            "SpecVersion" => saferpay_spec_version(),
            "CustomerId" => SAFERPAY_CUSTOMER_ID,
            "RequestId" =>  $request_id,
            "RetryIndicator" => 0
        ),
        "Token" => $token
    );
    $curl = new Curl\Curl();
    $curl->setHeader('Authorization', "Basic " . SAFERPAY_AUTH_TOKEN);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post($url, json_encode($data));
    if ($curl->error) {
        return array("error" => $curl->error_code);
    } else {
        $response = json_decode($curl->response);
        return $response;
    }
}


function saferpay_capture_transaction($transaction_id) {
    $url = saferpay_api_url() . '/Payment/v1/Transaction/Capture';
    $request_id =  'assert_' . getRandomHex(8);
    $data = array(
        "RequestHeader" => array(
            "SpecVersion" => saferpay_spec_version(),
            "CustomerId" => SAFERPAY_CUSTOMER_ID,
            "RequestId" =>  $request_id,
            "RetryIndicator" => 0
        ),
        "TransactionReference" =>  array(
            "TransactionId" => $transaction_id
        )
    );
    $curl = new Curl\Curl();
    $curl->setHeader('Authorization', "Basic " . SAFERPAY_AUTH_TOKEN);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post($url, json_encode($data));
    if ($curl->error) {
        return array("error" => $curl->error_code);
    } else {
        $response = json_decode($curl->response);
        return $response;
    }
}




// function generate_datatrans_transaction_id($refno, $amount) {
//     // $merchant_id = '';
//     // $password = '';
//     // $token =  base64_encode($merchant_id . ":" .  $password);
//     $logo_url = 'https://website.com/logo.jpg';
//     $token = "MTEwMDAzMjU3OTpRVll0WUpIMTQzOXhiWEtk";
//     $data = array(
//         'amount' => $amount,
//         "currency" => "CHF",
//         "autoSettle" => true,
//         "paymentMethods" => array("VIS", "ECA", "PAP", "TWI"),
//         "refno" => $refno,
//         "redirect" =>  array(
//             "successUrl" => "http://localhost/transcontinental_list/?successUrl",
//             "cancelUrl" => "http://localhost/transcontinental_list/?cancelUrl",
//             "errorUrl" => "http://localhost/transcontinental_list/?errorUrl"
//         ),
//         "theme" => array(
//             "name" => "DT2015",
//             "configuration" => array(
//                 "brandColor" => "#FFFFFF",
//                 "logoBorderColor" => "#A1A1A1",
//                 "brandButton" => "#A1A1A1",
//                 "payButtonTextColor" => "white",
//                 "logoSrc" => $logo_url,
//                 "logoType" => "circle",
//                 "initialView" => "list",
//             )
//         ),
//         "option" =>  array(
//             "createAlias" => true
//         )
//     );


//     $curl = new Curl\Curl();
//     $curl->setHeader('Authorization', "Basic " . $token);
//     $curl->setHeader('Content-Type', 'application/json');
//     $curl->post('https://api.sandbox.datatrans.com/v1/transactions', json_encode($data));
//     if ($curl->error) {
//         // var_dump($curl->error_code);
//         return array("error" => $curl->error_code);
//     } else {
//         $response =    json_decode($curl->response);
//         return $response;
//         // var_dump($response->transactionId);
//     }

//     // var_dump($curl->request_headers);
//     // var_dump($curl->response_headers);
// }



function current_version() {
    echo '0.1.8';
}



function site_theme() {
    if (defined('SITE_THEME')) {
        return SITE_THEME;
    } else {
        return 'transcontinental';
    }
}

function zenith_site() {
    return (site_theme() == 'zenith');
}



function site_url() {

    if (defined('WEBSITE_URL')) {
        return WEBSITE_URL;
    } else {
        return 'http://localhost/transcontinental_list';
    }
}


function site_homepage() {
    if (zenith_site()) {
        echo 'https://zenithvoyages.ch/';
    } else {
        echo 'https://transcontinental.ch/';
    }
}

function get_site_url() {
    echo site_url();
}



function chilly_list_site_logo() {

    if (zenith_site()) {
        echo '<img src="' .  THEME_DIRECTORY . '/img/zenith.svg" alt="Zenith Voyages" />';
    } else {
        echo '<img src="' .  THEME_DIRECTORY . '/img/logo.png" alt="Transcontinental" />';
    }
}


function redirect_old_pages($p) {
    if ($p == 'giftcard') {
        return 'boncadeau';
    } else if ($p == 'list') {
        return 'mariage';
    } else {
        return $p;
    }
}

function current_page() {
    if (isset($_GET['page'])) {

        $p = redirect_old_pages($_GET['page']);
        $page = '/pages/' . $p . '.php';
    } else {
        $page = '/pages/home.php';
    }
    return $page;
}

function current_page_exists() {
    if (isset($_GET['page'])) {
        $page =   redirect_old_pages($_GET['page']);
        if (strpos(WEBSITE_URL, 'locasdflhost') > -1) {
            $file = '/Applications/MAMP/htdocs/transcontinental_list/pages/' . $page . '.php';
        } else {
            $path = realpath(dirname(__FILE__));
            $file = $path . '/../pages/' . $page . '.php';
        }

        return (file_exists($file));
    } else {
        return true; // home page does exist
    }
}



function current_subpage_is($slug) {
    if (isset($_GET['subpage'])) {
        return ($_GET['subpage'] == $slug);
    } else {
        return false;
    }
}


function current_page_is($slug) {

    if (isset($_GET['page'])) {
        return ($_GET['page'] == $slug);
    } else {
        return false;
    }
}

function page_link($slug, $text, $classes = '') {

    echo '<a href="' . site_url() . '/'  .  $slug   . '" class="' . $classes . '">' . ($text) . '</a>';
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
    if (has_error()) {
        $e = $_GET['error'];

        if (has_translation($e)) {
            $message = return_t($e);
        } else {
            $message = return_t('unspecified');
        }
        echo '<p class="error_message">' . $message . '</p>';;
    }
}


function encrypt_password($password) {
    $salt = PW_SALT;
    $encrypted_password =  crypt($password, $salt);
    return $encrypted_password;
}


function get_var($str) {
    if (isset($_GET[$str])) {
        return $_GET[$str];
    } else {
        return false;
    }
}

function valid_giftcard_statuses() {
    // return array('créé', 'annulé', 'payé', 'utilisé');
    return array('actif', 'non payé', 'annulé', 'utilisé');
}


function get_donation($donation_id = null) {


    if ($donation_id == null) {
        $donation_id =  (isset($_GET['id']))  ? intval($_GET['id']) : null;
    }

    global $conn;
    if ($donation_id > 0) {



        try {
            $query = "SELECT *FROM tcg_donations WHERE tcg_donations.id = :id LIMIT 1";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':id', $donation_id);
            $donation_query->setFetchMode(PDO::FETCH_OBJ);
            $donation_query->execute();

            $donation_count = $donation_query->rowCount();

            if ($donation_count == 1) {
                $donation =  $donation_query->fetch();
                return $donation;
            } else {
                return null;
            }
            unset($conn);
        } catch (PDOException $err) {
            return null;
        };
    } else { // if donation id is not greated than 0
        return null;
    }
}



function get_giftcard($giftcard_id = null) {


    if ($giftcard_id == null) {
        $giftcard_id =  (isset($_GET['id']))  ? intval($_GET['id']) : null;
    }

    global $conn;
    if ($giftcard_id > 0) {


        try {
            $query = "SELECT * FROM tcg_giftcards WHERE tcg_giftcards.id = :id LIMIT 1";
            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':id', $giftcard_id);
            $giftcard_query->setFetchMode(PDO::FETCH_OBJ);
            $giftcard_query->execute();

            $giftcard_count = $giftcard_query->rowCount();

            if ($giftcard_count == 1) {
                $giftcard =  $giftcard_query->fetch();
                return  process_giftcard($giftcard);
            } else {
                return null;
            }
            unset($conn);
        } catch (PDOException $err) {
            return null;
        };
    } else { // if giftcard id is not greated than 0
        return null;
    }
}


function giftcardArchiveSelected($type) {
    global $archive;
    if ($archive == $type) {
        echo ' style="font-weight: bold" ';
    }
}


function get_giftcards($archive = "actif") {
    global $conn;

    if ($archive == 'nonpaye') $archive = 'non payé';
    if ($archive == 'annule') $archive = 'annulé';
    if ($archive == 'actif') $archive = 'actif';
    if ($archive == 'utilise') $archive = 'utilisé';


    if (get_var('s')) {
        $s = get_var('s');

        if (intval($s) > 0) {

            $search = "WHERE `id` = " . $s;
        } else {
            $search = "WHERE (`sender_first_name` LIKE '%" . $s . "%' OR `sender_last_name` LIKE '%" . $s . "%' OR `receiver_first_name` LIKE '%" . $s . "%' OR `receiver_last_name` LIKE '%" . $s . "%' OR `receiver_email` LIKE '%" . $s . "%' OR `sender_email` LIKE '%" . $s . "%')";
        }
    } else {
        $search = ' WHERE  status = "' . $archive . '"  ';
    }

    $posts_per_page = posts_per_page();
    if (get_var('p')) {
        $page = intval(get_var('p'));
        $page_query = 'OFFSET ' . (($page - 1) * $posts_per_page);
    } else {
        $page_query = '';
    }

    try {
        $query = "SELECT * FROM tcg_giftcards $search   ORDER BY created_at DESC LIMIT $posts_per_page $page_query";
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
    } catch (PDOException $err) {
        return [];
    };
}



function delete_giftcard($giftcard) {

    global $conn;
    if ($giftcard->id > 0) {

        try {
            $query = "DELETE FROM tcg_giftcards  WHERE id = :id    ";
            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':id', $giftcard->id);
            $giftcard_query->setFetchMode(PDO::FETCH_OBJ);
            $giftcard_query->execute();

            return true;

            unset($conn);
        } catch (PDOException $err) {
            return false;
        };
    } else {
        return false;
    }
}



function delete_user($user) {

    global $conn;
    if ($user->id > 0) {

        try {
            $query = "DELETE FROM tcg_users  WHERE id = :id    ";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':id', $user->id);
            $user_query->setFetchMode(PDO::FETCH_OBJ);
            $user_query->execute();

            return true;

            unset($conn);
        } catch (PDOException $err) {
            return false;
        };
    } else {
        return false;
    }
}


function delete_list($list) {

    global $conn;
    if ($list->id > 0) {

        try {
            $query = "DELETE FROM tcg_lists  WHERE id = :id    ";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':id', $list->id);
            $list_query->setFetchMode(PDO::FETCH_OBJ);
            $list_query->execute();

            return true;

            unset($conn);
        } catch (PDOException $err) {
            return false;
        };
    } else {
        return false;
    }
}


function posts_per_page() {
    return 10;
}



function get_users($options = null) {
    global $conn;

    if (get_var('s')) {
        $s = get_var('s');
        $search = "WHERE `first_name` LIKE '%" . $s . "%' OR `last_name` LIKE '%" . $s . "%'";
    } else {
        $search = '';
    }

    $posts_per_page = posts_per_page();
    if (get_var('p')) {
        $page = intval(get_var('p'));
        $page_query = "LIMIT $posts_per_page  OFFSET " . (($page - 1) * $posts_per_page);
    } else {
        $page_query = "LIMIT $posts_per_page ";
    }

    if (is_array($options)) {
        if (isset($options['posts_per_page'])) {
            $page_query = "";
        }
    }



    try {
        $query = "SELECT * FROM tcg_users $search ORDER BY last_name ASC $page_query";
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
    } catch (PDOException $err) {
        return [];
    };
}

function count_users() {
    global $conn;

    if (get_var('s')) {
        $s = get_var('s');
        $search = "WHERE `first_name` LIKE '%" . $s . "%' OR `last_name` LIKE '%" . $s . "%'";
    } else {
        $search = '';
    }

    try {
        $query = "SELECT id FROM tcg_users $search";
        $users_query = $conn->prepare($query);
        $users_query->setFetchMode(PDO::FETCH_OBJ);
        $users_query->execute();
        $users_count = $users_query->rowCount();

        return   $users_count;


        unset($conn);
    } catch (PDOException $err) {
        return 0;
    };
}



function count_giftcards($archive = "créé") {
    global $conn;

    if (get_var('s')) {
        $s = get_var('s');
        $search = "WHERE `sender_first_name` LIKE '%" . $s . "%' OR `sender_last_name` LIKE '%" . $s . "%' OR `receiver_first_name` LIKE '%" . $s . "%' OR `receiver_last_name` LIKE '%" . $s . "%' OR `receiver_email` LIKE '%" . $s . "%' OR `sender_email` LIKE '%" . $s . "%'";
    } else {

        $search = ' WHERE  status = "' . $archive . '"  ';
    }

    try {
        $query = "SELECT id FROM tcg_giftcards $search";
        $giftcards_query = $conn->prepare($query);
        $giftcards_query->setFetchMode(PDO::FETCH_OBJ);
        $giftcards_query->execute();
        $giftcards_count = $giftcards_query->rowCount();

        return   $giftcards_count;


        unset($conn);
    } catch (PDOException $err) {
        return 0;
    };
}



function count_lists($archive) {
    global $conn;

    $archive_int = ($archive == 'active') ? 1 : 0;
    $search = ' active = ' . $archive_int;


    try {
        $query = "SELECT id FROM tcg_lists WHERE $search ";
        $lists_query = $conn->prepare($query);
        $lists_query->setFetchMode(PDO::FETCH_OBJ);
        $lists_query->execute();
        $lists_count = $lists_query->rowCount();

        return  $lists_count;
        unset($conn);
    } catch (PDOException $err) {
        return 0;
    };
}


function get_lists($archive) {
    global $conn;

    $posts_per_page = posts_per_page();
    if (get_var('p')) {
        $page = intval(get_var('p'));
        $page_query = 'OFFSET ' . (($page - 1) * $posts_per_page);
    } else {
        $page_query = '';
    }

    if ($archive == 'expired') {
        $now = date("Y-m-d", time());
        $search =  ' tcg_lists.active =  1 AND deadline < "' . $now . '"';
    } else {
        $archive_int = ($archive == 'active') ? 1 : 0;
        $search = ' tcg_lists.active = ' . $archive_int;
    }



    try {
        $query = "SELECT *, tcg_lists.id as id, tcg_lists.created_at as created_at FROM tcg_lists
        LEFT JOIN tcg_users ON tcg_users.id = tcg_lists.user_id
        WHERE  $search AND tcg_users.id IS NOT NULL
        ORDER BY  tcg_lists.active DESC,  tcg_lists.created_at DESC
        LIMIT $posts_per_page $page_query ";
        $lists_query = $conn->prepare($query);
        $lists_query->setFetchMode(PDO::FETCH_OBJ);
        $lists_query->execute();

        $lists_count = $lists_query->rowCount();

        if ($lists_count > 0) {
            $lists =  $lists_query->fetchAll();
            // process every list to add extra properties
            foreach ($lists as $list) {
                $list = process_list($list);
            }
            return $lists;
        } else {
            return [];
        }

        unset($conn);
    } catch (PDOException $err) {
        return [];
    };
}


// return all the lists that belong to the current user
function user_lists($user_id = null) {
    global $conn;


    if ($user_id == null) {
        if (has_valid_user_cookie()) {
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
                foreach ($lists as $list) {
                    $list = process_list($list);
                }
                return $lists;
            } else {
                return [];
            }

            unset($conn);
        } catch (PDOException $err) {
            return [];
        };
    } else {
        return [];
    }
}


function get_donations($list_id, $status = false) {
    if ($list_id) {
        global $conn;


        $status_sql =  ($status) ? '  AND STATUS =  "' . $status . '"' :  '';


        try {
            $query = "SELECT * FROM tcg_donations WHERE list_id = :id $status_sql  ORDER BY created_at DESC ";
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
        } catch (PDOException $err) {
            return [];
        };
    } else {
        return [];
    }
}


function donation_is_paid($donation) {
    return ($donation->status == 'payé');
}


function sum_donations($donations) {
    $total = 0;
    foreach ($donations as $donation) {
        if (donation_is_paid($donation)) {
            $total = $total + $donation->amount;
        }
    }
    return convert_cents_to_currency($total);
}


function get_withdrawals($giftcard_id) {
    global $conn;

    try {
        $query = "SELECT * FROM tcg_withdrawals WHERE giftcard_id = :giftcard_id   ORDER BY created_at DESC ";
        $withdrawals_query = $conn->prepare($query);
        $withdrawals_query->bindParam(':giftcard_id', $giftcard_id);
        $withdrawals_query->setFetchMode(PDO::FETCH_OBJ);
        $withdrawals_query->execute();

        $withdrawals_count = $withdrawals_query->rowCount();

        if ($withdrawals_count > 0) {
            $withdrawals =  $withdrawals_query->fetchAll();
            return $withdrawals;
        } else {
            return [];
        }

        unset($conn);
    } catch (PDOException $err) {
        return [];
    };
}


function total_of_withdrawals($withdrawals) {
    if (sizeof($withdrawals) > 0) {

        $total = 0;
        foreach ($withdrawals as $withdrawal) :
            $total = $total + $withdrawal->amount;
        endforeach;
        return $total;
    } else {
        return 0;
    }
}



function get_user($user_id = null) {

    if ($user_id == null) {
        if (current_subpage_is('user') || current_subpage_is('useredit')) {
            $user_id = intval($_GET['id']);
        } else {
            $user_id =  $_GET['subpage'];
        }
    }
    if ($user_id == null) {
        $user_id = intval($_GET['id']);
    }

    global $conn;
    if ($user_id > 0) {

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
        } catch (PDOException $err) {
            return null;
        };
    } else { // if user id is not greater than 0
        return null;
    }
}




function get_user_from_email($email = null) {

    global $conn;
    if ($email != null) {

        try {
            $query = "SELECT * FROM tcg_users WHERE email = :email LIMIT 1";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':email', $email);
            $user_query->setFetchMode(PDO::FETCH_OBJ);
            $user_query->execute();

            $user_count = $user_query->rowCount();


            if ($user_count == 1) {
                $user =  $user_query->fetch();
                return $user;
            } else {
                return false;
            }

            unset($conn);
        } catch (PDOException $err) {
            return false;
        };
    } else { //  if no token sent
        return false;
    }
}




function get_user_from_reset_code($reset_password_token = null) {

    global $conn;
    if ($reset_password_token != null) {

        try {
            $query = "SELECT * FROM tcg_users WHERE reset_password_token = :reset_password_token LIMIT 1";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':reset_password_token', $reset_password_token);
            $user_query->setFetchMode(PDO::FETCH_OBJ);
            $user_query->execute();

            $user_count = $user_query->rowCount();


            if ($user_count == 1) {
                $user =  $user_query->fetch();
                return $user;
            } else {
                return false;
            }

            unset($conn);
        } catch (PDOException $err) {
            return false;
        };
    } else { //  if no token sent
        return false;
    }
}



function get_list($list_id = null) {

    if ($list_id == null) {
        if (current_subpage_is('list')) {
            $list_id = (isset($_GET['id']))  ? intval($_GET['id']) : null;
        } else {
            $list_id =  $_GET['subpage'];
        }
    }
    if ($list_id == null) {
        $list_id =  (isset($_GET['id']))  ? intval($_GET['id']) : null;
    }

    global $conn;
    if ($list_id > 0) {

        try {
            $query = "SELECT *, tcg_lists.id as id,  tcg_lists.created_at as created_at FROM tcg_lists
            LEFT JOIN tcg_users ON tcg_users.id = tcg_lists.user_id
            WHERE tcg_users.id IS NOT NULL
            AND tcg_lists.id = :id
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
        } catch (PDOException $err) {
            return null;
        };
    } else { // if list id is not greated than 0
        return null;
    }
}


function process_list($list) {

    if (isset($list->first_name)) {
        $list->users_name = $list->first_name . ' ' .  $list->last_name;
    }
    $list->status  = ($list->active == 1) ? 'active' : 'inactive';
    return $list;
}


function process_giftcard($giftcard) {

    $created_at = date("Y-m-d", strtotime($giftcard->created_at));
    $expires_at = date("Y-m-d", strtotime($created_at  . " + 365 day"));
    $giftcard->expires_at  =  $expires_at;

    return $giftcard;
}



// // obfuscate the donation id a bit
// function convert_donation_id($donation_id) {
//     return intval($donation_id)  * 107  + 2089;
// }
// function deconvert_donation_id($donation_id) {
//     return ($donation_id - 2089) / 107;
// }
//
//
// // obfuscate the gift id a bit
// function convert_giftcard_id($giftcard_id) {
//     return intval($giftcard_id)  * 97  + 1789;
// }
// function deconvert_giftcard_id($giftcard_id) {
//     return ($giftcard_id - 1789) / 97;
// }
//
// // obfuscate the list id a bit
// function convert_list_id($list_id) {
//     return intval($list_id)  * 83  + 1777;
// }
// function deconvert_list_id($list_id) {
//     return ($list_id - 1777) / 83;
// }



function insert_new_withdrawal($withdrawal) {
    global $conn;
    if ($withdrawal->amount > 0 && $withdrawal->giftcard_id > 0) {

        try {
            $query = "INSERT INTO tcg_withdrawals (amount, giftcard_id, message) VALUES (:amount, :giftcard_id, :message)";
            $withdrawal_query = $conn->prepare($query);
            $withdrawal_query->bindParam(':amount', $withdrawal->amount);
            $withdrawal_query->bindParam(':giftcard_id', $withdrawal->giftcard_id);
            $withdrawal_query->bindParam(':message', $withdrawal->message);
            $withdrawal_query->execute();
            $withdrawal_id = $conn->lastInsertId();
            unset($conn);


            return ($withdrawal_id);
        } catch (PDOException $err) {

            return false;
        };
    } else { // withdrawal name was blank
        return false;
    }
}


function insert_new_list($list) {
    global $conn;
    if ($list->name != '' && $list->user_id > 0) {

        try {
            $query = "INSERT INTO tcg_lists (name, description, picture, user_id, active, category, deadline) VALUES (:name, :description, :picture, :user_id, :active, :category, :deadline)";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':name', $list->name);
            $list_query->bindParam(':description', $list->description);
            $list_query->bindParam(':picture', $list->picture);
            $list_query->bindParam(':user_id', $list->user_id);
            $list_query->bindParam(':active', $list->active);
            $list_query->bindParam(':category', $list->category);
            $list_query->bindParam(':deadline', $list->deadline);
            $list_query->execute();
            $list_id = $conn->lastInsertId();
            unset($conn);


            return ($list_id);
        } catch (PDOException $err) {

            return false;
        };
    } else { // list name was blank
        return false;
    }
}



function update_user($user) {
    global $conn;
    if ($user->id > 0) {
        try {

            $query = "UPDATE tcg_users SET `email` = :email, `first_name` = :first_name, `last_name` = :last_name, `address` = :address, `phone` = :phone WHERE id = :id";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':email', $user->email);
            $user_query->bindParam(':first_name', $user->first_name);
            $user_query->bindParam(':last_name', $user->last_name);
            $user_query->bindParam(':address', $user->address);
            $user_query->bindParam(':phone', $user->phone);
            $user_query->bindParam(':id', $user->id);
            $user_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // user name was blank
        return false;
    }
}


function update_user_password($user) {
    global $conn;
    if ($user && $user->reset_password_token != '') {

        # reset the password and update the token to be nil
        try {

            $query = "UPDATE tcg_users SET `password_digest` = :password_digest, reset_password_token = '' WHERE id = :id";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':password_digest', $user->password_digest);
            $user_query->bindParam(':id', $user->id);
            $user_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // user name was blank
        return false;
    }
}


function update_donation_validated($donation) {
    global $conn;
    if ($donation->id > 0) {
        try {

            $query = "UPDATE tcg_donations SET `validated` = :validated WHERE id = :id";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':validated', $donation->validated);
            $donation_query->bindParam(':id', $donation->id);
            $donation_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // donation id was less than 0
        return false;
    }
}


function update_donation_status($donation) {
    global $conn;
    if ($donation->id > 0) {
        try {

            $query = "UPDATE tcg_donations SET `status` = :status,
            `payment_id` = :payment_id,
            `payer_id` = :payer_id
            WHERE id = :id";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':status', $donation->status);
            $donation_query->bindParam(':payment_id', $donation->payment_id);
            $donation_query->bindParam(':payer_id', $donation->payer_id);
            $donation_query->bindParam(':id', $donation->id);
            $donation_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // donation id was less than 0
        return false;
    }
}


function update_donation_saferpay_token($donation) {
    global $conn;
    if ($donation->id > 0) {
        try {

            $query = "UPDATE tcg_donations SET `saferpay_token` = :saferpay_token
            WHERE id = :id";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':saferpay_token', $donation->saferpay_token);
            $donation_query->bindParam(':id', $donation->id);
            $donation_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            var_dump($err);
            return false;
        };
    } else { // donation id was less than 0
        return false;
    }
}




function update_giftcard_saferpay_token($giftcard) {
    global $conn;
    if ($giftcard->id > 0) {
        try {
            $query = "UPDATE tcg_giftcards SET `saferpay_token` = :saferpay_token WHERE id = :id";
            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':saferpay_token', $giftcard->saferpay_token);
            $giftcard_query->bindParam(':id', $giftcard->id);
            $giftcard_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            var_dump($err);
            return false;
        };
    } else { // donation id was less than 0
        return false;
    }
}

function update_giftcard_status($giftcard) {
    global $conn;
    if ($giftcard->id > 0) {
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
        } catch (PDOException $err) {
            return false;
        };
    } else { // giftcard name was blank
        return false;
    }
}


function update_giftcard($giftcard) {
    global $conn;
    if ($giftcard->id > 0) {
        try {

            $query = "UPDATE tcg_giftcards SET `status` = :status WHERE id = :id";
            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':status', $giftcard->status);
            $giftcard_query->bindParam(':id', $giftcard->id);
            $giftcard_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // giftcard name was blank
        return false;
    }
}




function list_has_expired($list) {
    $deadline =  strtotime("midnight", strtotime($list->deadline));
    $now = strtotime("midnight", time());
    return $now <= $deadline;
}


function update_list($list) {
    global $conn;
    if ($list->name != '' && $list->user_id > 0) {


        try {
            $query = "UPDATE tcg_lists
            SET `name` = :name,
            `description` = :description,
            `picture` = :picture,
            `user_id` = :user_id,
            `active` = :active,
            `category` = :category,
            `deadline` = :deadline
            WHERE id = :id";
            $list_query = $conn->prepare($query);
            $list_query->bindParam(':name', $list->name);
            $list_query->bindParam(':description', $list->description);
            $list_query->bindParam(':picture', $list->picture);
            $list_query->bindParam(':user_id', $list->user_id);
            $list_query->bindParam(':active', $list->active);
            $list_query->bindParam(':category', $list->category);
            $list_query->bindParam(':deadline', $list->deadline);
            $list_query->bindParam(':id', $list->id);
            $list_query->execute();
            unset($conn);

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // list name was blank
        return false;
    }
}



function insert_new_donation($donation) {
    global $conn;
    if ($donation->amount > 0 && $donation->list_id > 0) {

        try {
            $query = "INSERT INTO tcg_donations
            (first_name, last_name, address, post_code, town, country, phone, email, message, amount, list_id, status) VALUES
            (:first_name, :last_name, :address, :post_code, :town, :country, :phone,  :email, :message,  :amount, :list_id, :status)";
            $donation_query = $conn->prepare($query);
            $donation_query->bindParam(':first_name', $donation->first_name);
            $donation_query->bindParam(':last_name', $donation->last_name);
            $donation_query->bindParam(':address', $donation->address);
            $donation_query->bindParam(':post_code', $donation->post_code);
            $donation_query->bindParam(':town', $donation->town);
            $donation_query->bindParam(':country', $donation->country);
            $donation_query->bindParam(':phone', $donation->phone);
            $donation_query->bindParam(':email', $donation->email);
            $donation_query->bindParam(':message', $donation->message);
            $donation_query->bindParam(':amount', $donation->amount);
            $donation_query->bindParam(':list_id', $donation->list_id);
            $donation_query->bindParam(':status', $donation->status);
            $donation_query->execute();
            $donation_id = $conn->lastInsertId();
            unset($conn);
            return ($donation_id);
        } catch (PDOException $err) {

            return false;
        };
    } else { // donation name was blank
        return false;
    }
}



function insert_new_user($user) {
    global $conn;
    if ($user->email != '' && $user->password_digest != '') {
        try {
            $query = "INSERT INTO tcg_users (email, first_name, last_name, address, phone, password_digest) VALUES (:email, :first_name, :last_name, :address, :phone, :password_digest)";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':email', $user->email);
            $user_query->bindParam(':first_name', $user->first_name);
            $user_query->bindParam(':last_name', $user->last_name);
            $user_query->bindParam(':address', $user->address);
            $user_query->bindParam(':phone', $user->phone);
            $user_query->bindParam(':password_digest', $user->password_digest);
            $user_query->execute();
            $user_id = $conn->lastInsertId();
            unset($conn);

            return $user_id;
        } catch (PDOException $err) {

            return false;
        };
    } else {
        return false;
    }
}



function insert_new_giftcard($giftcard) {
    global $conn;

    if ($giftcard->receiver_email != '' && $giftcard->amount > 0) {


        try {
            $query = "INSERT INTO tcg_giftcards ( sender_first_name, sender_last_name, sender_email,  sender_phone, sender_address, sender_post_code,  sender_town, sender_country, receiver_first_name, receiver_last_name, receiver_email, message, picture, amount, status) VALUES (:sender_first_name, :sender_last_name, :sender_email, :sender_phone, :sender_address,  :sender_post_code,  :sender_town, :sender_country, :receiver_first_name, :receiver_last_name, :receiver_email, :message, :picture, :amount, :status)";

            $giftcard_query = $conn->prepare($query);
            $giftcard_query->bindParam(':sender_first_name', $giftcard->sender_first_name);
            $giftcard_query->bindParam(':sender_last_name', $giftcard->sender_last_name);
            $giftcard_query->bindParam(':sender_email', $giftcard->sender_email);
            $giftcard_query->bindParam(':sender_phone', $giftcard->sender_phone);
            $giftcard_query->bindParam(':sender_address', $giftcard->sender_address);
            $giftcard_query->bindParam(':sender_post_code', $giftcard->sender_post_code);
            $giftcard_query->bindParam(':sender_town', $giftcard->sender_town);
            $giftcard_query->bindParam(':sender_country', $giftcard->sender_country);
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
        } catch (PDOException $err) {

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
    return json_encode($cookie);
}

function get_giftcard_cookie() {
    $lgc = json_decode($_COOKIE['latest_giftcard']);
    return $lgc;
}

function  has_giftcard_cookie() {
    if (isset($_COOKIE['latest_giftcard'])) {
        $lgc = get_giftcard_cookie();
        return (isset($lgc->name)); // $cookie must have 3 items in array;
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


function date_for_input($date) {
    return  date('Y-m-d', strtotime($date));
}
function nice_date($date) {
    return  date('d/m/Y', strtotime($date));
}
function nice_datetime($date) {
    return  date('d/m/Y H:m', strtotime($date));
}



function convert_to_amount_in_cents($string) {
    return   round(floatval($string) * 100);
}

function convert_cents_to_currency($integer) {
    return   sprintf('%.2f', ($integer / 100)) . ' CHF'; //  money_format( '%i CHF', ($integer / 100)  );
}

function has_valid_user_cookie() {
    if (isset($_COOKIE['tcg_user'])) {
        $user_id = decrypt_id($_COOKIE['tcg_user']);
        if (is_numeric($user_id) && $user_id > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function has_valid_admin_cookie() {
    if (isset($_COOKIE['tcg_admin'])) {
        $admin_id = decrypt_id($_COOKIE['tcg_admin']);
        if (is_numeric($admin_id) && $admin_id > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function only_allow_users() {
    if (current_user() === null) {
        header('Location: ' .  site_url() . '?error=notallowedhere');
    } else {
        return true;
    }
}

function only_allow_admins() {
    if (current_admin() === null) {
        header('Location: ' .  site_url() . '?error=notallowedhereadmin');
    } else {
        return true;
    }
}



function current_admin() {

    global $conn;
    if (has_valid_admin_cookie()) {

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
                header('Location: ' .  site_url() . '/actions/user_logout.php');
            }

            unset($conn);
        } catch (PDOException $err) {

            header('Location: ' .  site_url() . '/actions/user_logout.php');
        };
    } else {
        return null;
    }
}




function current_user() {

    global $conn;
    if (has_valid_user_cookie()) {

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
                header('Location: ' .  site_url() . '/actions/user_logout.php');
            }

            unset($conn);
        } catch (PDOException $err) {

            header('Location: ' .  site_url() . '/actions/user_logout.php');
        };
    } else {
        return null;
    }
}




function log_in_admin($admin) {
    global $conn;
    if ($admin->email != '' && $admin->password_digest != '') {
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
        } catch (PDOException $err) {

            return false;
        };
    } else {
        return false;
    }
}



function log_in_user($user) {
    global $conn;
    if ($user->email != '' && $user->password_digest != '') {
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
        } catch (PDOException $err) {

            return false;
        };
    } else {
        return false;
    }
}


function simple_encrypt_id($string) {
    $id = intval($string);
    $multi = ($id + TLPRIME1) * TLPRIME2 * TLPRIME3;
    $encrypted = dechex($multi);
    return $encrypted;
}

function simple_decrypt_id($hex) {

    $dec = hexdec($hex);
    $decrypted = $dec / TLPRIME3 / TLPRIME2 - TLPRIME1;
    return $decrypted;
}



function encrypt_id($string) {


    // $encrypted_string = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SECRET_KEY , $string, MCRYPT_MODE_CBC,  INITIALIZATION_VECTOR );
    // $encrypted_string = bin2hex($encrypted_string);
    // return $encrypted_string;
    return simple_encrypt_id($string);
};

function decrypt_id($string) {

    // $encrypted_string = hex2bin($string);
    // $decrypted_string = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SECRET_KEY, $encrypted_string, MCRYPT_MODE_CBC, INITIALIZATION_VECTOR );
    // $decrypted = intval($decrypted_string);
    // return $decrypted;
    return simple_decrypt_id($string);
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



function find_pictures($type = 'lists') {
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

        if ($file->isDot()) continue;
        if ($file->isDir()) continue;
        if ($file->isFile()) {
            $extension = $file->getExtension();
            if ($extension == 'jpg' || $extension == 'jpeg') {
                $filename = $file->getFilename();
                $id = intval(explode('.', $filename)[0]);
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



function send_php_mail($to, $subject, $content, $image = null) {


    if (zenith_site()) {
        $no_reply_address = 'noreply@zenithvoyages.ch';
        $no_reply_name = 'Zenith Voyages';
        $email_footer = file_get_contents(dirname(__FILE__) . '/../emails/email_footer_zenith.html');
    } else {
        $no_reply_address = 'noreply@transcontinental.ch';
        $no_reply_name = 'Transcontinental';
        $email_footer = file_get_contents(dirname(__FILE__) . '/../emails/email_footer.html');
    }

    $email_header = file_get_contents(dirname(__FILE__) . '/../emails/email_header.html');
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);                 // Passing `true` enables exceptions

    try {
        //Server settings
        //$mail->SMTPDebug = 2;                   // Enable verbose debug output
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();                          // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                   // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;          // SMTP username
        $mail->Password = MAIL_PASSWORD;          // SMTP password
        $mail->SMTPSecure = 'tls';                // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        //Recipients
        $mail->setFrom($no_reply_address,  $no_reply_name);

        if (is_array($to)) {
            foreach ($to as $person) {
                $mail->addAddress($person);
            }
        } else {
            $mail->addAddress($to);     // Add a recipient
        }

        $mail->addReplyTo($no_reply_address, $no_reply_name);

        if (zenith_site()) {
            $logo_image = add_image_to_email(WEBSITE_URL . '/images/logo_email_zenith.jpg', false);
        } else {
            $logo_image = add_image_to_email(WEBSITE_URL . '/images/logo_email.jpg', false);
        }


        $top_image = add_image_to_email($image, true); // true means add spacing below the picture

        //Content
        $mail->isHTML(true);                      // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $email_header .  $logo_image .  $top_image . $content .  $email_footer;
        $mail->AltBody = $content;



        if (isset($_GET['preview_emails'])) {
            echo $mail->Body;
        } else {
            $mail->send();
        }

        return true;
    } catch (Exception $e) {
        return false;
    }
}



function add_image_to_email($image = null, $add_spacing = false) {
    if ($image == null) {
        $image = WEBSITE_URL . '/images/giftcard.jpg';
    }


    $str =  '<tr>
    <td bgcolor="#ffffff" align="center">
    <a style="color:white; text-decoration: none;" href="' .  WEBSITE_URL . '"><img src="' . $image . '" width="600" height="" alt="' . SITE_NAME . '" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; margin: auto;" class="g-img"></a>
    </td>
    </tr>
    <!-- Hero Image, Flush : END -->';

    if ($add_spacing) {
        $str .= '<!-- 1 Column Text + Button : BEGIN -->
        <tr>
        <td bgcolor="#ffffff">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
        <td style="padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">';
    }

    return $str;
}

function generate_email_button($link, $text) {
    return '<div style="padding: 0 40px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;"><table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
    <tr>
    <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
    <a href="' . $link . '" style="background: #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 110%; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
    <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;' . $text . '&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </a>
    </td>
    </tr>
    </table></div>';
}

function generate_email_title($str) {
    return '<h1 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 24px; line-height: 125%; color: #333333; font-weight: normal;">' . $str . '</h1>';
}



function send_list_created_email($list, $user) {

    global $current_language;
    if ($list && $user) {

        $receiver = $user->email;
        $link = WEBSITE_URL  . "/mariage/" . $list->id;
        $admin_link = WEBSITE_URL  . "/adminarea/list?id=" . $list->id;
        if ($current_language == 'en') {
            $receiver_subject = 'Your list with  ' . SITE_NAME . '.';
        } else {
            $receiver_subject = 'Votre liste  ' . SITE_NAME . '.';
        }
        $receiver_content = generate_email_title($receiver_subject);

        if ($current_language == 'en') {
            $receiver_content .=  "<p>Dear " .  $user->first_name . ' ' . $user->last_name  . ". </p><p>Votre liste <strong>" . $list->name . "</strong> sur " . SITE_NAME . " a bien été créée. </p><p> Le numéro de liste est " . $list->id . ". Elle est accessible directement depuis l'adresse <a href='" .  $link  . "'>" . $link . "</a>.</p><p>Vous pouvez partager ces informations à votre famille et vos amis pour qu'ils puissent contribuer à la liste.</p><p>Vous pouvez consulter l'état de votre liste en vous connectant à votre compte " . SITE_NAME . "receiver_content.  Nous vous tiendrons également informés par email au fur et à mesure des contributions.</p><p> Merci pour votre confiance et à bientôt! </p><p>L'équipe " . SITE_NAME . "</p>";
        } else {
            $receiver_content .=  "<p>Bonjour " .  $user->first_name . ' ' . $user->last_name  . ". </p><p>Votre liste <strong>" . $list->name . "</strong> sur " . SITE_NAME . " a bien été créée. </p><p> Le numéro de liste est " . $list->id . ". Elle est accessible directement depuis l'adresse <a href='" .  $link  . "'>" . $link . "</a>.</p><p>Vous pouvez partager ces informations à votre famille et vos amis pour qu'ils puissent contribuer à la liste.</p><p>Vous pouvez consulter l'état de votre liste en vous connectant à votre compte " . SITE_NAME . "receiver_content.  Nous vous tiendrons également informés par email au fur et à mesure des contributions.</p><p> Merci pour votre confiance et à bientôt! </p><p>L'équipe " . SITE_NAME . "</p>";
        }


        send_php_mail($receiver, $receiver_subject, $receiver_content);



        $admin = admin_emails();
        $admin_subject = 'ADMIN - Nouvelle liste  ' . SITE_NAME;
        $admin_content = generate_email_title($admin_subject);
        $admin_content .= "<p>Nouvelle liste " . SITE_NAME . " </p><p>
        <strong>Client: </strong>" . $user->first_name . ' ' . $user->last_name   . " <br />
        <strong>Liste: </strong><a href='" . $admin_link . "'>" . $list->name . "</a> <br />
        <strong>Numéro de liste : </strong>" . $list->id . " </p>";

        send_php_mail($admin, $admin_subject, $admin_content);
    }
}



function send_user_welcome_email($user) {
    global $current_language;

    if ($user) {
        $receiver = $user->email;
        if ($current_language == 'en') {
            $receiver_subject = 'Creation of your ' . SITE_NAME . ' account.';
        } else {
            $receiver_subject = 'Création de votre compte ' . SITE_NAME . '.';
        }
        $receiver_content = generate_email_title($receiver_subject);

        if ($current_language == 'en') {
            $receiver_content .=  "<p>Dear  " .  $user->first_name . ' ' . $user->last_name  . ". Votre compte " . SITE_NAME . " a bien été créé. </p><p>Vous pouvez à présent créer des listes de mariage, anniversaire ou pour toute occasion à l'adresse " .  '<a href="' . WEBSITE_URL . '/login">' . WEBSITE_URL . "</a></p><p>A bientôt! <br /> L'équipe " . SITE_NAME . '</p>';
        } else {
            $receiver_content .= "<p>Bonjour " .  $user->first_name . ' ' . $user->last_name  . ". Votre compte " . SITE_NAME . " a bien été créé. </p><p>Vous pouvez à présent créer des listes de mariage, anniversaire ou pour toute occasion à l'adresse " .  '<a href="' . WEBSITE_URL . '/login">' . WEBSITE_URL . "</a></p><p>A bientôt! <br /> L'équipe " . SITE_NAME . '</p>';
        }


        send_php_mail($receiver, $receiver_subject, $receiver_content);


        $admin = admin_emails();
        $admin_subject = 'ADMIN - Nouveau compte  ' . SITE_NAME;
        $admin_content = generate_email_title($admin_subject);
        $admin_content .= "<p>Nouvelle création de compte - Listes de Mariage et Anniversaire sur le site " . SITE_NAME . "</p><p>
        <strong>Prénom: </strong>" . $user->first_name . " <br />
        <strong>Nom: </strong>" . $user->last_name . " <br />
        <strong>Adresse: </strong>" . $user->address . " <br />
        <strong>Téléphone: </strong>" . $user->phone . " <br />
        <strong>Adresse email: </strong>" . $user->email . " </p>";

        send_php_mail($admin, $admin_subject, $admin_content);
    }
}

function send_user_reset_password_email($user) {
    global $current_language;
    if ($user) {
        $receiver = $user->email;
        if ($current_language == 'en') {
            $receiver_subject = 'Reset your password for ' . SITE_NAME . '.';
        } else {
            $receiver_subject = 'Réinitialiser votre mot de passe sur ' . SITE_NAME . '.';
        }
        $receiver_content = generate_email_title($receiver_subject);


        if ($current_language == 'en') {
            $receiver_content .= '<p>Vous avez demandé à réinitialiser votre mot de passe pour le site ' . SITE_NAME . '. Veuillez cliquer sur le bouton ci-dessous pour réinitialiser votre mot de passe. Si vous ne souhaitez pas réinitialiser votre mot de passe ignorez cet email.</p>';
            $link = WEBSITE_URL  . "/resetpassword/" . $user->reset_password_token;
            $receiver_content .= generate_email_button($link,  'Réinitialiser votre mot de passe');
            $receiver_content .= '<p>Meilleures Salutations, <br /> L\'équipe ' . SITE_NAME . '</p>';
        } else {
            $receiver_content .= '<p>Vous avez demandé à réinitialiser votre mot de passe pour le site ' . SITE_NAME . '. Veuillez cliquer sur le bouton ci-dessous pour réinitialiser votre mot de passe. Si vous ne souhaitez pas réinitialiser votre mot de passe ignorez cet email.</p>';
            $link = WEBSITE_URL  . "/resetpassword/" . $user->reset_password_token;
            $receiver_content .= generate_email_button($link,  'Réinitialiser votre mot de passe');
            $receiver_content .= '<p>Meilleures Salutations, <br /> L\'équipe ' . SITE_NAME . '</p>';
        }


        send_php_mail($receiver, $receiver_subject, $receiver_content);
    }
}




function giftcard_print_url($giftcard) {
    return   site_url() . '/actions/giftcardprint.php?id=' . $giftcard->id;
}


function send_giftcard_email($giftcard) {
    global $current_language;
    // Bon cadeau n°

    $image = WEBSITE_URL . '/images/giftcards/' . $giftcard->picture . '.jpg';
    $sender_name = $giftcard->sender_first_name . ' ' . $giftcard->sender_last_name;
    $receiver_name = $giftcard->receiver_first_name . ' ' . $giftcard->receiver_last_name;
    $amount =  convert_cents_to_currency($giftcard->amount);


    $sender = $giftcard->sender_email;
    if ($current_language == 'en') {
        $sender_subject = 'Merci d\'avoir envoyé un bon cadeau';
    } else {
        $sender_subject = 'Merci d\'avoir envoyé un bon cadeau';
    }
    $sender_content = generate_email_title($sender_subject);

    if ($current_language == 'en') {
        $sender_content .= '<p>Vous avez envoyé un bon cadeau d\'une valeur de ' . $amount . ' à ' .  $receiver_name  . '. Valide jusqu\'au : ' . nice_date($giftcard->expires_at)  . '</p>';
        $sender_content .= generate_email_button(giftcard_print_url($giftcard),  'Imprimer le bon cadeau');
        $sender_content .= '<p>Merci pour votre envoi! <br /><br /> Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p>';
    } else {
        $sender_content .= '<p>Vous avez envoyé un bon cadeau d\'une valeur de ' . $amount . ' à ' .  $receiver_name  . '. Valide jusqu\'au : ' . nice_date($giftcard->expires_at)  . '</p>';
        $sender_content .= generate_email_button(giftcard_print_url($giftcard),  'Imprimer le bon cadeau');
        $sender_content .= '<p>Merci pour votre envoi! <br /><br /> Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p>';
    }

    send_php_mail($sender, $sender_subject, $sender_content, $image);



    if ($current_language == 'en') {
        $receiver_subject = 'Vous avez reçu un bon cadeau ' . SITE_NAME;
    } else {
        $receiver_subject = 'Vous avez reçu un bon cadeau ' . SITE_NAME;
    }
    $receiver = $giftcard->receiver_email;
    $receiver_content = generate_email_title($receiver_subject);


    if ($current_language == 'en') {
        $receiver_content .= '<p>' . $sender_name . ' vous a envoyé un bon cadeau n° ' . $giftcard->id . ' d\'une valeur de ' .  $amount . ' pour acheter un voyage chez ' . SITE_NAME . ' . Valide jusqu\'au : ' . nice_date($giftcard->expires_at)  . '.';
        if ($giftcard->message != '') {
            $receiver_content .= '<br /><br /><p style="padding:0 0 0px;margin:0;font-weight:bold">Message:</p>';
            $receiver_content .= '<p style="font-style:italic; color: #888;">' . $giftcard->message . '</p><br />';
        }
        $receiver_content .= generate_email_button(giftcard_print_url($giftcard),  'Imprimer le bon cadeau');
        $receiver_content .= "<p>Nos conseillers en voyages d’agréments vous attendent à l’une de nos agences de voyages et se réjouissent déjà de vous aider à organiser vos prochaines vacances.</p>";
    } else {
        $receiver_content .= '<p>' . $sender_name . ' vous a envoyé un bon cadeau n° ' . $giftcard->id . ' d\'une valeur de ' .  $amount . ' pour acheter un voyage chez ' . SITE_NAME . ' . Valide jusqu\'au : ' . nice_date($giftcard->expires_at)  . '.';
        if ($giftcard->message != '') {
            $receiver_content .= '<br /><br /><p style="padding:0 0 0px;margin:0;font-weight:bold">Message:</p>';
            $receiver_content .= '<p style="font-style:italic; color: #888;">' . $giftcard->message . '</p><br />';
        }
        $receiver_content .= generate_email_button(giftcard_print_url($giftcard),  'Imprimer le bon cadeau');
        $receiver_content .= "<p>Nos conseillers en voyages d’agréments vous attendent à l’une de nos agences de voyages et se réjouissent déjà de vous aider à organiser vos prochaines vacances.</p>";
    }




    $receiver_content .= '<table cellspacing="0" cellpadding="0" border="0" align="left" width="100%"><tr>';

    if (zenith_site()) {

        $receiver_content .= '<td>
            <p> <b>Zénith Voyages Gland</b> <br />
            9, avenue du Mont-Blanc <br />
            1196 Gland<br />
            T +41 22 364 46 91</p>
        </td>';
    } else {
        $receiver_content .= '<td>
            <p> <b>Agence de Florissant</b> <br />
            66, route de Florissant <br />
            CH – 1206 Genève <br />
            T +41 22 347 27 27</p>
        </td>
        <td>
            <p> <b>Agence de Chêne</b> <br />
            48, rue de Genève <br />
            CH – 1225 Chêne-Bourg <br />
            T +41 22 869 18 18
            </p>
        </td>';
    }

    $receiver_content .= '</tr></table> <br /><br />';

    if ($current_language == 'en') {
        $receiver_content .= '<p>Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p><br />';
        $receiver_content .= generate_email_button(WEBSITE_URL,  'Aller sur le site ' .  SITE_NAME);
    } else {
        $receiver_content .= '<p>Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p><br />';
        $receiver_content .= generate_email_button(WEBSITE_URL,  'Aller sur le site ' .  SITE_NAME);
    }


    send_php_mail($receiver, $receiver_subject, $receiver_content, $image);


    //$admin = admin_email();
    $admin = admin_emails();
    $admin_subject = 'ADMIN - Nouveau bon cadeau ' . SITE_NAME;
    $admin_content = generate_email_title($admin_subject);
    $admin_content .= '<p> De la part de ' . $sender_name . ' - ' . $sender . '<br>Phone: ' . $giftcard->sender_phone . '<br>Adresse: ' . $giftcard->sender_address . '<br><br><br>Pour : ' . $receiver_name . ' - ' . $receiver . '<br> Montant : ' .  $amount;

    $admin_content .= generate_email_button(giftcard_print_url($giftcard),  'Imprimer le bon cadeau');
    $admin_content .= '<p>Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p>';
    send_php_mail($admin, $admin_subject, $admin_content, $image);
}

function admin_email() {
    // should return string
    if (zenith_site()) {
        return 'info@zenithvoyages.ch';
    } else {
        return 'claude.luterbacher@transcontinental.ch';
    }
}

function admin_emails() {

    if (zenith_site()) {
        return  array('harvey.charles@gmail.com', 'info@zenithvoyages.ch', 'sibylle.spahni@zenithvoyages.ch',  'gwenaelle.martini@zenithvoyages.ch');
    } else {
        return  array('harvey.charles@gmail.com', 'info@transcontinental.ch',  'silvana.jahiu@transcontinental.ch', 'claude.luterbacher@transcontinental.ch');
    }
}


function send_donation_email($donation, $list) {
    global $current_language;

    $user = get_user($list->user_id);
    if ($user) {

        $sender_name = $donation->first_name . ' ' . $donation->last_name;
        $receiver_name = $user->first_name . ' ' . $user->last_name;
        $amount =  convert_cents_to_currency($donation->amount);
        $listname = $list->name;

        $sender = $donation->email;
        if ($current_language == 'en') {
            $sender_subject = 'Thank you for your donation';
        } else {
            $sender_subject = 'Merci pour votre contribution';
        }
        $sender_content = generate_email_title($sender_subject);

        if ($current_language == 'en') {
            $sender_content .= '<p>Merci pour votre contribution d\'un montant de ' . $amount . ' à la liste : ' .  $listname  . "</p><p>Meilleures Salutations,<br>L'équipe " . SITE_NAME . "</p>";
        } else {
            $sender_content .= '<p>Merci pour votre contribution d\'un montant de ' . $amount . ' à la liste : ' .  $listname  . "</p><p>Meilleures Salutations,<br>L'équipe " . SITE_NAME . "</p>";
        }
        send_php_mail($sender, $sender_subject, $sender_content);



        $receiver = $user->email;
        if ($current_language == 'en') {
            $receiver_subject = 'Vous avez reçu une contribution à votre liste ' . SITE_NAME;
        } else {
            $receiver_subject = 'Vous avez reçu une contribution à votre liste ' . SITE_NAME;
        }
        $receiver_content = generate_email_title($receiver_subject);


        if ($current_language == 'en') {
            $receiver_content .= '<p>' . $sender_name . ' vient contribuer un montant de ' . $amount . ' sur votre liste ' . $listname . ' .</p>';
            if ($donation->message != '') {
                $receiver_content .= '<br /><br /><p style="padding:0 0 10px;margin:0;font-weight:bold">Message:</p>';
                $receiver_content .= '<p style="font-style:italic; color: #888;">' . $donation->message . '</p><br /><br />';
            };
            $receiver_content .= '<p>Vous pouvez accéder à votre compte pour consulter votre liste à l’adresse <a href="' . WEBSITE_URL . '/login">' . WEBSITE_URL . '</a></p>';
            $receiver_content .= generate_email_button(WEBSITE_URL,  'Aller sur le site ' .  SITE_NAME);
            $receiver_content .= '<p>Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p>';
        } else {
            $receiver_content .= '<p>' . $sender_name . ' vient contribuer un montant de ' . $amount . ' sur votre liste ' . $listname . ' .</p>';
            if ($donation->message != '') {
                $receiver_content .= '<br /><br /><p style="padding:0 0 10px;margin:0;font-weight:bold">Message:</p>';
                $receiver_content .= '<p style="font-style:italic; color: #888;">' . $donation->message . '</p><br /><br />';
            };
            $receiver_content .= '<p>Vous pouvez accéder à votre compte pour consulter votre liste à l’adresse <a href="' . WEBSITE_URL . '/login">' . WEBSITE_URL . '</a></p>';
            $receiver_content .= generate_email_button(WEBSITE_URL,  'Aller sur le site ' .  SITE_NAME);
            $receiver_content .= '<p>Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p>';
        }

        send_php_mail($receiver, $receiver_subject, $receiver_content);



        $admin =  admin_emails();
        $admin_subject = 'ADMIN - Nouvelle contribution - listes ' . SITE_NAME;
        $admin_content = generate_email_title($admin_subject);
        $admin_content .= '<p> De la part de ' . $sender_name . ' - ' . $sender . '<br>Pour : ' . $receiver_name . ' - ' . $receiver . '<br> Montant : ' .  $amount . '<br>Liste : ' . $listname;
        if ($donation->address) {
            $admin_content .= '<br /> Addresse: ' . $donation->address;
        }
        if ($donation->phone) {
            $admin_content .= '<br />Téléphone: ' . $donation->phone;
        }
        $admin_content .= '</p>';
        $admin_content .= '<p>Meilleures Salutations,<br>L\'équipe ' . SITE_NAME . '</p>';

        send_php_mail($admin, $admin_subject, $admin_content);
    }
}


function getRandomHex($num_bytes = 4) {
    return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}







function generate_password_token($email) {
    global $conn;

    if (is_valid_email($email)) {
        $reset_password_token = getRandomHex(8);
        try {
            $query = "UPDATE tcg_users SET `reset_password_token` = :reset_password_token,
            `reset_password_sent_at` = CURRENT_TIMESTAMP WHERE email = :email";
            $user_query = $conn->prepare($query);
            $user_query->bindParam(':reset_password_token', $reset_password_token);
            $user_query->bindParam(':email', $email);
            $user_query->execute();
            unset($conn);

            $count = $user_query->rowCount();

            if ($count > 0) {
                return true;
            } else {
                return false;
            }

            return true;
        } catch (PDOException $err) {
            return false;
        };
    } else { // giftcard name was blank
        return false;
    }
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

    $apiContext->setConfig(
        array(
            'log.LogEnabled' => true,
            'log.FileName' => 'payPal.log',
            'log.LogLevel' => 'INFO',
            'mode' => PAYPAL_MODE
        )
    );

    return $apiContext;
}



function getPaypalGiftCardPaymentLink($giftcard_id, $amount_in_cents) {

    $amountInCHF = money_format('%i', ($amount_in_cents / 100));
    $apiContext = get_paypal_api_context();
    $baseURL = site_url() . '/actions/giftcard_payment_finish.php';
    $returnURL = $baseURL . '?return=true&giftcard_id=' . $giftcard_id;
    $cancelURL = $baseURL . '?cancel=true&giftcard_id=' . $giftcard_id;



    $item1 = new \PayPal\Api\Item();
    $item1->setName('Giftcard')->setCurrency('CHF')->setQuantity(1)->setPrice($amountInCHF);

    $itemList = new \PayPal\Api\ItemList();
    $itemList->setItems(array($item1));

    $payer = new \PayPal\Api\Payer();
    $payer->setPaymentMethod('paypal');

    $amount = new \PayPal\Api\Amount();
    $amount->setTotal($amountInCHF);
    $amount->setCurrency('CHF');

    $transaction = new \PayPal\Api\Transaction();
    $transaction->setAmount($amount);
    $transaction->setItemList($itemList);
    $transaction->setDescription("Buying a giftcard");


    $redirectUrls = new \PayPal\Api\RedirectUrls();
    $redirectUrls->setReturnUrl($returnURL)->setCancelUrl($cancelURL);

    $payment = new \PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);


    try {
        $payment->create($apiContext);
        // echo $payment;
        return  $payment->getApprovalLink();
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        // This will print the detailed information on the exception.
        //REALLY HELPFUL FOR DEBUGGING
        // var_dump( $ex->getData() );
        return false;
    }
}


function getPaypalDonationPaymentLink($donation_id, $amount_in_cents) {

    $amountInCHF = money_format('%i', ($amount_in_cents / 100));
    $apiContext = get_paypal_api_context();
    $baseURL = site_url() . '/actions/donation_payment_finish.php';
    $returnURL = $baseURL . '?return=true&donation_id=' . $donation_id;
    $cancelURL = $baseURL . '?cancel=true&donation_id=' . $donation_id;


    $item1 = new \PayPal\Api\Item();
    $item1->setName('Donation')->setCurrency('CHF')->setQuantity(1)->setPrice($amountInCHF);

    $itemList = new \PayPal\Api\ItemList();
    $itemList->setItems(array($item1));

    $payer = new \PayPal\Api\Payer();
    $payer->setPaymentMethod('paypal');

    $amount = new \PayPal\Api\Amount();
    $amount->setTotal($amountInCHF);
    $amount->setCurrency('CHF');

    $transaction = new \PayPal\Api\Transaction();
    $transaction->setAmount($amount);
    $transaction->setItemList($itemList);
    $transaction->setDescription("Donation");

    $redirectUrls = new \PayPal\Api\RedirectUrls();
    $redirectUrls->setReturnUrl($returnURL)->setCancelUrl($cancelURL);

    $payment = new \PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);


    try {
        $payment->create($apiContext);
        // echo $payment;
        return  $payment->getApprovalLink();
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        // This will print the detailed information on the exception.
        //REALLY HELPFUL FOR DEBUGGING
        // var_dump($ex->getData());
        return false;
    }
}



// return boolean if ok
function executePayment($payment_id, $payer_id) {


    $apiContext = get_paypal_api_context();
    $payment = \PayPal\Api\Payment::get($payment_id, $apiContext);
    $execution = new \PayPal\Api\PaymentExecution();
    $execution->setPayerId($payer_id);

    try {

        $result = $payment->execute($execution, $apiContext);
        $return = true;
    } catch (Exception $ex) {
        var_dump(" Payment didnt execute");
        $return = false;
    }



    return $return;
}


    // END OF PAYPAL AND PAYMENTS
