<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$GLOBALS['config'] = array(
        'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800 //seconden +- een maand
    ),
        'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

include_once "./classes/config.php";
include_once "./classes/cookie.php";
include_once "./classes/database.php";
include_once "./classes/hash.php";
include_once "./classes/input.php";
include_once "./classes/redirect.php";
include_once "./classes/session.php";
include_once "./classes/token.php";
include_once "./classes/user.php";
include_once "./classes/validation.php";

require_once './functions/sanitize.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()) {
        $user = new User($hashCheck->First()->user_id);
        $user->Login();
    }
}
