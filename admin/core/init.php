<?php

session_start();

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
    )
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/apac/admin/functions/functions.php';

spl_autoload_register(function($class) {
  require_once $_SERVER['DOCUMENT_ROOT'] . '/apac/admin/classes/' . $class . '.php';
});

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
$activeEventId  = 7;