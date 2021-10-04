<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$_SESSION['user'] = 16;

function def(){
    define("DN", Config::get('server/name'));
    define("_","/");
    define("P",".php");
    define("PL",".php");
    define("CNS",".php");
    define("CT","Controller");
    define("CTRL",'./app'._.'controller'.PL);
    define("ROUTES",'./views'._.'routes'.PL);
    define("DNSIGNIN",DN._.'login');
    define("view_session_off_","views/app_session_off/");
    define("view_session_off","views/app_session_off");
    define("_PATH_","/");
    define("_VIEWS_","views/");
    define("_PATH_VIEWS_","./views/");
    define('Controller_NS','app\Http\Controllers\\');  // NS => Namespace
    define('Url_NS','app\Http\Url\\');
    define("DNADMIN",DN._.Config::get('server/name')._.'admin');
    define("DN_IMG_CARDS", DN._.'img/cards');
    define("DN_IMG_ID_DOC", DN._.'img/id_document/');
}


$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'future_summit_db'
    ),

    // 'mysql' => array(
    //     'host' => 'localhost',
    //     'username' => 'cubedigital',
    //     'password' => 'cubedigital@torus',
    //     'db' => 'future_summit_db'
    // ),
    
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    'server' => array(
        'name' => 'http://127.0.0.1/apac/'
        // 'name' => 'http://torusguru.com/thefuture/'
    ),

    'url' => array(
        
		'mail_smtp' => "http://{$_SERVER['HTTP_HOST']}/apac/mail_smtp", // Local

		'mail_smtp_noreply' => "http://{$_SERVER['HTTP_HOST']}/apac/mail_smtp_noreply", // Local
    )
    
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/apac/admin/functions/functions.php';

spl_autoload_register(function($class) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/apac/admin/classes/' . $class . '.php';
});


/** Initialize Define */
def();

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
} else {
    $user = new User();
}

$errmsg         = $succmsg = $page = $link = $sublink = "";
$controller     =  new Controller();
$encodedEventId = Input::get('eventId');
$progDay        = Input::get('day');
$activeEventId  = 8;